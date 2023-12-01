<?php
namespace App\Services\implement;
use App\Services\IndonesiaFormatServices;

class ImplIndonesiaFormService implements IndonesiaFormatServices
{

    public function formatPhoneNumber( string $phoneNumber): string
    {
        // Remove any non-numeric characters from the phone number
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        // Format the number based on the Indonesian format
        return '+62 ' . substr($phoneNumber, 1, 3) . ' ' . substr($phoneNumber, 4, 4) . ' ' . substr($phoneNumber, 8);
    }
}
