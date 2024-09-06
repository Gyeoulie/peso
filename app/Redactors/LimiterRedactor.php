<?php

namespace App\Redactors;

use OwenIt\Auditing\Contracts\AttributeRedactor;
use Illuminate\Support\Str; // Import Str class

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
        return Str::limit($value, 250);
    }
}
