<?php

/**
 * Definitely prefer FooBar because it is using dependency injection instead of
 * creating it's dependencies on it's own. This leads to it being easier to test
 * and more flexible when used with a framework that can resolve that dependency
 * automatically.
 */
class FooBar
{
    protected $stringScrambler;
    /**
     * @param StringScrambler $stringScrambler
     */
    public function __construct(StringScrambler $stringScrambler)
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

class BarFoo
{
    protected $stringScrambler;

    public function __construct()
    {
        $this->stringScrambler = new StringScrambler();
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