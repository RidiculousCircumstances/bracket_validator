<?php

declare(strict_types=1);

namespace App;

class BracketDictionary
{
    private static array $braceMap = [
        '/\(|\)/' => '()',
        '/\{|\}/' => '{}',
        '/\[|\]/' => '[]'
    ];

    public static function getOppositeBrace(string $brace): string|null {
        foreach (self::$braceMap as $pattern => $bracePare) {
            if (preg_match($pattern, $brace)) {
                return str_replace($brace, '', $bracePare);
            }
        }

        return null;
    }
}
