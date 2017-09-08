<?php

namespace HcsOmot\Geometry\ShapesBundle\Entity;

use InvalidArgumentException;

/**
 * Class Triangle.
 */
class Triangle
{
    /**
     * @var float a triangle side
     */
    protected $sideA;
    /**
     * @var float a triangle side
     */
    protected $sideB;
    /**
     * @var float a triangle side
     */
    protected $sideC;

    /**
     * Triangle constructor.
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(float $sideA, float $sideB, float $sideC)
    {
        if ($this->isValid($sideA, $sideB, $sideC)) {
            $this->sideA = $sideA;
            $this->sideB = $sideB;
            $this->sideC = $sideC;
        }
    }

    /**
     * Check if a valid circle can be constructed.
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     *
     * @throws \InvalidArgumentException
     *
     * @return bool
     */
    private function isValid(float $sideA, float $sideB, float $sideC): bool
    {
        if (($sideA + $sideB > $sideC) && ($sideA + $sideC > $sideB) && ($sideB + $sideC > $sideA)) {
            return true;
        }

        throw new InvalidArgumentException('Tried to instantiate a triangle with improper length sides.');
    }

    /**
     * Get triangle side A.
     *
     * @return float
     */
    public function getSideA(): float
    {
        return $this->sideA;
    }

    /**
     * Get triangle side B.
     *
     * @return float
     */
    public function getSideB(): float
    {
        return $this->sideB;
    }

    /**
     * Get triangle side C.
     *
     * @return float
     */
    public function getSideC(): float
    {
        return $this->sideC;
    }
}
