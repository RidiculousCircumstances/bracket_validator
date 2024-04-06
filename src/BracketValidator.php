<?php

declare(strict_types=1);

namespace App;

use SplStack;

class BracketValidator
{
    private SplStack $stack;

    public function __construct(
    ) {
        $this->stack = new SplStack();
    }

    public function validate(string $braces): bool {

        $braceItems = str_split($braces);

        while ($braceItems !== []) {
            $newBrace = array_pop($braceItems);

            if ($this->stack->count() === 0) {
                $this->stack->push($newBrace);
                continue;
            }

            $oppositeBrace = BracketDictionary::getOppositeBrace($newBrace);

            if ($oppositeBrace === null) {
                continue;
            }

            $stackBrace = $this->stack->pop();

            if ($stackBrace === $oppositeBrace) {
                continue;
            }

            $this->stack->push($stackBrace);

            $this->stack->push($newBrace);
        }

        return $this->stack->count() === 0;
    }
}
