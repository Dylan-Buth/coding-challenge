<?php

class FooBar
{
    protected $stringScrambler;

    /**
     * @param StringScramblerInterface $stringScrambler
     */
    public function __construct(StringScramblerInterface $stringScrambler)
    {
        $this->stringScrambler = $stringScrambler;
    }

    /**
     * @param string $text
     * @return string
     */
    public function getFoo($text)
    {
        $text = strrev($text);
        return $this->stringScrambler->scramble($text);
    }
}

// Without the use of PHPUnit, the test
// would probably look like this. Obviously with PHPUnit
// I would have access to assertion methods and real Mock
// Objects.
interface StringScramblerInterface
{
    public function scramble($text);
}

class FakeStringScrambler implements StringScramblerInterface
{
    public function scramble($text)
    {
        // The string is added to the end to
        // ensure the Scramble method was called.
        return $text .'test';
    }
}

class FooBarTest
{
    public function getFooReversesStringAndCallsScramble()
    {
        $fooBar = new FooBar(new FakeStringScrambler());
        if ($fooBar->getFoo('testing') == 'gnitsettest') {
            return true;
        }

        return false;
    }
}
