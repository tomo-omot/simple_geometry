<?php

namespace Tests\HcsOmotGeometryShapesBundle\Entity;

use HcsOmot\Geometry\ShapesBundle\Entity\Triangle;
use InvalidArgumentException;

class TriangleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideValuesToCreateATriangle
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     * @param bool  $isTriangleValid
     */
    public function testCanAValidTriangleBeInstatiated(float $sideA, float $sideB, float $sideC, bool $isTriangleValid)
    {
        if (false === $isTriangleValid) {
            $this->expectException(InvalidArgumentException::class);
        }

        new Triangle($sideA, $sideB, $sideC);
    }

    public function provideValuesToCreateATriangle()
    {
        return [
            [1, 1, 1, true],
            [2, 8, 9, true],
            [11.5, 4.9, 13.22, true],
            [1, 1, 2, false],
            [1, 1, 3, false],
        ];
    }
}
