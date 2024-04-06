<?php

declare(strict_types=1);

namespace App\Tests;

use App\BracketDictionary;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BracketDictionaryTest extends TestCase
{
    public static function rowProvider(): iterable {
        yield 'case with ()' => ['(', ')'];
        yield 'case with []' => ['[', ']'];
        yield 'case with {}' => ['{', '}'];
    }

    #[DataProvider('rowProvider')]
    public function testOppositeBracket(string $inputBracket, string $expectedBracket): void {
        $this->assertSame($expectedBracket, BracketDictionary::getOppositeBrace($inputBracket));
    }
}
