<?php

namespace HcsOmot\Geometry\ShapesBundle\Entity;

use InvalidArgumentException;

class Circle implements ShapeInterface
{
    /**
     * @var float radius of the circle
     */
    protected $radius;

    /**
     * @var float area of the circle
     */
    protected $area;

    /**
     * @var float circumference of the circle
     */
    protected $perimeter;

    /**
     * Circle constructor.
     *
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        if ($this->isValid($radius)) {
            $this->radius = $radius;

            $this->calculateArea();
            $this->calculatePerimeter();
        }
    }

    /**
     * Check if a valid circle can be constructed.
     *
     * @param float $radius
     *
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    private function isValid(float $radius): bool
    {
        if ($radius > 0) {
            return true;
        }

        throw new InvalidArgumentException('Tried to instantiate a circle with radius length less than or equal to zero.');
    }

    /**
     * Calculate the area of the circle.
     */
    private function calculateArea()
    {
        $area = M_PI * ($this->radius ** 2);

        $this->area = $area;
    }

    /**
     * Calculate the perimeter (circumference) size of circle.
     */
    private function calculatePerimeter()
    {
        $circumference = 2 * $this->radius * M_PI;

        $this->perimeter = $circumference;
    }

    /**
     * Return the circle radius.
     *
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    /**
     * Return the perimeter size of circle.
     *
     * @return float
     */
    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    /**
     * Return the area size of circle.
     *
     * @return float
     */
    public function getArea(): float
    {
        return $this->area;
    }
}