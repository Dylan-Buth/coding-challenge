<?php

abstract class Shape
{
    abstract public function getName() : string;
    abstract public function getPerimeter() : float;
    abstract public function getArea() : float;
}

class Circle extends Shape
{
    /** @var int */
    private $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function getName() : string
    {
        return 'Circle';
    }

    public function getPerimeter() : float
    {
        return 2 * pi() * $this->radius;
    }

    public function getArea() : float
    {
        return pi() * pow($this->radius, 2);
    }
}

class Triangle extends Shape
{
    /** @var array */
    private $sides;

    public function __construct(int $side1, int $side2, int $side3)
    {
        $this->sides = [
            $side1,
            $side2,
            $side3,
        ];
    }

    public function getName(): string
    {
        switch (count(array_unique($this->sides))) {
            case 3:
                return 'Scalene Triangle';
            case 2:
                return 'Isosceles Triangle';
            case 1:
                return 'Equilateral Triangle';
        }
    }

    public function getPerimeter(): float
    {
        return array_sum($this->sides);
    }

    public function getArea(): float
    {
        $halfPerimeter = $this->getPerimeter() / 2;
        $area = [];
        foreach ($this->sides as $side) {
            $area[] = $halfPerimeter - $side;
        }
        return sqrt(($halfPerimeter * array_product($area)));
    }
}
