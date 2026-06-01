<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsappService
{
    public static function kirim($nomor, $pesan)
    {
        return Http::withOptions([

            'verify' => false

        ])->withHeaders([

            'Authorization' => env('FONNTE_TOKEN')

        ])->post('https://api.fonnte.com/send', [

            'target' => $nomor,
            'message' => $pesan,
            'countryCode' => '62',

        ]);
    }
}