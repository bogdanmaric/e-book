<?php

namespace App\Services;

class ImageUrlValidation
{

    public static function imageUrlValidation($url): bool {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $headers = get_headers($url, 1);
            if (str_contains($headers[0], 'OK')) {
                return true;
            }
        }
        return false;
    }
}
