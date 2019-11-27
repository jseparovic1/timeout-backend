<?php

declare(strict_types=1);

namespace App\Shared\RequestGuard;

use function explode;
use function implode;
use function str_replace;

class PropertyPathConverter
{
    public function toDotNotation(string $accessor): string
    {
        // Each path part is surrounded with `[` and `]`
        $parts = explode('][', $accessor);

        foreach ($parts as &$part) {
            $part = str_replace(['[', ']'], '', $part);
        }

        return implode('.', $parts);
    }
}
