<?php

namespace App\Redactors;

use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\AttributeRedactor;

// Import Str class

class LimiterRedactor implements AttributeRedactor
{
    /**
     * Redact the attribute value.
     *
     * @param mixed $value
     * @return string
     */
    public static function redact($value): string
    {
        // Truncate the value to 250 characters

        if ($value === null) {
            return '';
        }
        return Str::limit($value, 250);
    }
}
