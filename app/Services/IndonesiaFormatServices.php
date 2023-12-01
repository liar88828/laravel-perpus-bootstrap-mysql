<?php

namespace App\Services;

interface IndonesiaFormatServices
{
    public function formatPhoneNumber(string $phoneNumber): string;
}
