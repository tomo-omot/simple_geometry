<?php

namespace HcsOmot\Geometry\ShapesBundle\Entity;

use InvalidArgumentException;

class Circle
{
    /**
     * @var float radius of the circle
     */
    protected $radius;

    /**
     * Circle constructor.
     *
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        if ($this->isValid($radius)) {
            $this->radius = $radius;
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
     * Get circle's radius.
     *
     * @return float
     */
    public function getRadius(): float
    {
        return $this->radius;
    }
}
