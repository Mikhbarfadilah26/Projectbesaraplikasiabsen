<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\WhatsappService;

use App\Models\ModelAbsensi;
use App\Models\ModelSiswa;
use App\Models\ModelKelas;
use App\Models\ModelJurusan;
use App\Models\ModelTahunAjaran;
use App\Models\ModelSemester;
use App\Models\ModelLibur;

use Carbon\Carbon;

class ControllerAbsensi extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX ABSENSI
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $jurusan = ModelJurusan::orderBy(
            'namajurusan',
            'asc'
        )->get();

        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        /*
        |--------------------------------------------------------------------------
        | QUERY SISWA
        |--------------------------------------------------------------------------
        */

        $query = ModelSiswa::with('kelas');

        /*
        |--------------------------------------------------------------------------
        | FILTER JURUSAN
        |--------------------------------------------------------------------------
        */

        if ($request->jurusanid) {

            $query->whereHas('kelas', function ($q) use ($request) {

                $q->where(
                    'jurusanid',
                    $request->jurusanid
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL SISWA
        |--------------------------------------------------------------------------
        */

        $siswa = $query

            ->orderBy(
                'nama',
                'asc'
            )

            ->get();

        /*
        |--------------------------------------------------------------------------
        | AMBIL ABSENSI
        |--------------------------------------------------------------------------
        */

        $absensi = collect();

        if ($request->tanggal && $request->kelasid) {

            $absensi = ModelAbsensi::with([

                'siswa',
                'kelas',
                'tahun',
                'semester'

            ])

                ->whereDate(
                    'tanggal',
                    $request->tanggal
                )

                ->where(
                    'kelasid',
                    $request->kelasid
                )

                ->get()

                ->keyBy('siswaid');
        }

        /*
        |--------------------------------------------------------------------------
        | CEK SUDAH ABSEN
        |--------------------------------------------------------------------------
        */

        $sudahDiabsen = false;

        /*
        |--------------------------------------------------------------------------
        | CEK HARI LIBUR
        |--------------------------------------------------------------------------
        */

        $hariLibur = false;

        $keteranganLibur = null;

        if ($request->tanggal) {

            $tanggal = Carbon::parse($request->tanggal);
            

            /*
            |--------------------------------------------------------------------------
            | CEK HARI MINGGU
            |--------------------------------------------------------------------------
            */

            if ($tanggal->dayOfWeek == Carbon::SUNDAY) {

                $hariLibur = true;

                $keteranganLibur = 'Hari Minggu';
            }

            /*
            |--------------------------------------------------------------------------
            | CEK TABEL LIBUR
            |--------------------------------------------------------------------------
            */

            $libur = ModelLibur::whereDate(
                'tanggal',
                $request->tanggal
            )

                ->where('aktif', true)

                ->first();

            if ($libur) {

                $hariLibur = true;

                $keteranganLibur = $libur->keterangan;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | CEK SUDAH ABSEN SEMUA
        |--------------------------------------------------------------------------
        */

        if ($siswa->count() > 0) {

            $jumlahSudahAbsen = 0;

            foreach ($siswa as $s) {

                if (isset($absensi[$s->id])) {

                    $jumlahSudahAbsen++;
                }
            }

            $sudahDiabsen =
                $jumlahSudahAbsen == $siswa->count();
        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.absensi.index',
            compact(
                'jurusan',
                'kelas',
                'siswa',
                'absensi',
                'sudahDiabsen',
                'hariLibur',
                'keteranganLibur'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM CREATE
    |--------------------------------------------------------------------------
    */

    public function create(Request $request)
    {
        $jurusan = ModelJurusan::orderBy(
            'namajurusan',
            'asc'
        )->get();

        $kelas = ModelKelas::orderBy(
            'namakelas',
            'asc'
        )->get();

        $tahun = ModelTahunAjaran::all();

        $semester = ModelSemester::all();

        /*
        |--------------------------------------------------------------------------
        | QUERY SISWA
        |--------------------------------------------------------------------------
        */

        $query = ModelSiswa::with('kelas');

        /*
        |--------------------------------------------------------------------------
        | FILTER JURUSAN
        |--------------------------------------------------------------------------
        */

        if ($request->jurusanid) {

            $query->whereHas('kelas', function ($q) use ($request) {

                $q->where(
                    'jurusanid',
                    $request->jurusanid
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL SISWA
        |--------------------------------------------------------------------------
        */

        $siswa = $query

            ->orderBy(
                'nama',
                'asc'
            )

            ->get();

        $absensi = collect();

        $sudahDiabsen = false;

        $hariLibur = false;

        $keteranganLibur = null;

        return view(
            'user.absensi.create',
            compact(
                'jurusan',
                'kelas',
                'siswa',
                'absensi',
                'sudahDiabsen',
                'hariLibur',
                'keteranganLibur'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN ABSENSI
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI INPUT DATA & LOKASI
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'siswaid'   => 'required|array',
            'tanggal'   => 'required|date',
            'kelasid'   => 'required',
            'status'    => 'required|array',
            'latitude'  => 'required', // Wajib dikirim dari blade via Geolocation API
            'longitude' => 'required', // Wajib dikirim dari blade via Geolocation API
        ]);

        /*
        |--------------------------------------------------------------------------
        | VALIDASI RADIUS LOKASI (MAKSIMAL 500 METER)
        |--------------------------------------------------------------------------
        */

        // Koordinat Sekolah (SMK Negeri 1 Karang Baru) yang kamu berikan
        $latitudeSekolah  = 4.2982975;
        $longitudeSekolah = 98.040155;

        // Koordinat Guru yang dikirim dari form blade
        $latitudeGuru  = $request->latitude;
        $longitudeGuru = $request->longitude;

        // Hitung jarak menggunakan formula Haversine
        $earthRadius = 6371000; // Jari-jari bumi dalam satuan METER

        $latDelta = deg2rad($latitudeGuru - $latitudeSekolah);
        $lonDelta = deg2rad($longitudeGuru - $longitudeSekolah);

        $a = sin($latDelta / 2) * sin($latDelta / 2) +
             cos(deg2rad($latitudeSekolah)) * cos(deg2rad($latitudeGuru)) *
             sin($lonDelta / 2) * sin($lonDelta / 2);
        
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $jarak = $earthRadius * $c; // Hasil akhir dalam meter

        // Jika jarak guru ke sekolah lebih dari 500 meter, batalkan absensi
        if ($jarak > 500) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal! Anda berada di luar radius sekolah (' . round($jarak) . ' meter dari sekolah). Absensi hanya dapat dilakukan di area sekolah.'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CEK ABSENSI
        |--------------------------------------------------------------------------
        */

        $cekAbsensi = ModelAbsensi::where(
            'kelasid',
            $request->kelasid
        )

            ->whereDate(
                'tanggal',
                $request->tanggal
            )

            ->exists();

        /*
        |--------------------------------------------------------------------------
        | JIKA SUDAH ABSEN
        |--------------------------------------------------------------------------
        */

        if ($cekAbsensi) {

            return redirect()

                ->back()

                ->with(
                    'error',
                    'Absensi kelas ini sudah dilakukan'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | TAHUN AJARAN AKTIF
        |--------------------------------------------------------------------------
        */

        $tahun = ModelTahunAjaran::where(
            'is_active',
            true
        )->first();

        /*
        |--------------------------------------------------------------------------
        | SEMESTER AKTIF
        |--------------------------------------------------------------------------
        */

        $semester = ModelSemester::where(
            'is_active',
            true
        )->first();

        /*
        |--------------------------------------------------------------------------
        | LOOP SIMPAN ABSENSI
        |--------------------------------------------------------------------------
        */

        foreach ($request->siswaid as $siswaid) {

            $datasiswa = ModelSiswa::with('kelas')
                ->find($siswaid);

            if (!$datasiswa) {

                continue;
            }

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            $status = $request->status[$siswaid]
                ?? 'hadir';

            /*
            |--------------------------------------------------------------------------
            | SIMPAN ABSENSI
            |--------------------------------------------------------------------------
            */

            ModelAbsensi::create([

                'siswaid' => $siswaid,

                'kelasid' => $datasiswa->kelasid,

                'guruid' => Auth::id(),

                'tahunid' => $tahun?->id,

                'semesterid' => $semester?->id,

                'tanggal' => $request->tanggal,

                'status' => $status,

            ]);

            /*
            |--------------------------------------------------------------------------
            | FORMAT TANGGAL
            |--------------------------------------------------------------------------
            */

            $tanggal = Carbon::parse(
                $request->tanggal
            )->translatedFormat('d F Y');

            /*
            |--------------------------------------------------------------------------
            | KIRIM WHATSAPP
            |--------------------------------------------------------------------------
            */

            if ($datasiswa->wa_ortu) {

                $pesan = "📢 *ABSENSI SISWA*\n\n";

                $pesan .= "Assalamu'alaikum Wr. Wb.\n\n";

                $pesan .= "Kami informasikan kehadiran siswa:\n\n";

                $pesan .= "👤 {$datasiswa->nama}\n";

                $pesan .= "🏫 {$datasiswa->kelas->namakelas}\n";

                $pesan .= "📅 {$tanggal}\n";

                $pesan .= "📌 Status : *" . strtoupper($status) . "*\n\n";

                $pesan .= "Terima kasih.\n";

                $pesan .= "SMK Negeri 1 Karang Baru";

                /*
                |--------------------------------------------------------------------------
                | KIRIM KE WHATSAPP
                |--------------------------------------------------------------------------
                */

                WhatsappService::kirim(

                    $datasiswa->wa_ortu,

                    $pesan

                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()

            ->route('absensi.index', [

                'jurusanid' => $request->jurusanid,

                'kelasid' => $request->kelasid,

                'tanggal' => $request->tanggal

            ])

            ->with(
                'success',
                'Absensi berhasil disimpan & WhatsApp terkirim'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | LAPORAN ABSENSI
    |--------------------------------------------------------------------------
    */

    public function laporan(Request $request)
    {
        $jurusan = ModelJurusan::all();

        $kelas = ModelKelas::all();

        /*
        |--------------------------------------------------------------------------
        | QUERY
        |--------------------------------------------------------------------------
        */

        $query = ModelAbsensi::with([

            'siswa',
            'kelas',
            'tahun',
            'semester'

        ]);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->tanggal) {

            $query->whereDate(
                'tanggal',
                $request->tanggal
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER JURUSAN
        |--------------------------------------------------------------------------
        */

        if ($request->jurusanid) {

            $query->whereHas('kelas', function ($q) use ($request) {

                $q->where(
                    'jurusanid',
                    $request->jurusanid
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $absensi = $query

            ->orderBy(
                'tanggal',
                'desc'
            )

            ->get();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'zonasiswa.laporan',
            compact(
                'absensi',
                'jurusan',
                'kelas'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CETAK LAPORAN
    |--------------------------------------------------------------------------
    */

    public function cetak(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | QUERY ABSENSI
        |--------------------------------------------------------------------------
        */

        $query = ModelAbsensi::with([

            'siswa',
            'kelas',
            'tahun',
            'semester'

        ]);

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($request->tanggal) {

            $query->whereDate(
                'tanggal',
                $request->tanggal
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KELAS
        |--------------------------------------------------------------------------
        */

        if ($request->kelasid) {

            $query->where(
                'kelasid',
                $request->kelasid
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER JURUSAN
        |--------------------------------------------------------------------------
        */

        if ($request->jurusanid) {

            $query->whereHas('kelas', function ($q) use ($request) {

                $q->where(
                    'jurusanid',
                    $request->jurusanid
                );
            });
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $absensi = $query

            ->orderBy(
                'tanggal',
                'desc'
            )

            ->get();

        /*
        |--------------------------------------------------------------------------
        | VIEW CETAK
        |--------------------------------------------------------------------------
        */

        return view(

            'zonasiswa.cetaklaporan',

            compact('absensi')

        );
    }
}