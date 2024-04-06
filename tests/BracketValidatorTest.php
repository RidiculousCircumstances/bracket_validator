<?php

declare(strict_types=1);

namespace App\Tests;

use App\BracketValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class BracketValidatorTest extends TestCase
{
    private static BracketValidator $validator;
    public static function setUpBeforeClass(): void
    {
        self::$validator = new BracketValidator();
    }

    public static function bracketRowDataProvider(): iterable
    {
        yield ['()', true];
        yield ['{}', true];
        yield ['[]', true];
        yield ['{[()]}', true];
        yield ['{[()[hi there]]}', true];
        yield ['(12345)', true];
        yield ['(()[{}]){(})', false];
        yield ['', false];
        yield ['123123', false];
        yield ['((){]', false];
    }

    #[DataProvider('bracketRowDataProvider')]
    public function testBracketValidator(string $row, bool $expectedValidationResult): void
    {
        $this->assertSame($expectedValidationResult, self::$validator->validate($row));
    }
}
