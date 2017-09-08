<?php

namespace Tests\HcsOmotGeometryShapesBundle\Entity;

use HcsOmot\Geometry\ShapesBundle\Entity\Circle;
use InvalidArgumentException;

class CircleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideCircleRadiusData
     *
     * @param float $radius
     * @param bool  $isCircleValid
     */
    public function testCanAValidCircleBeInstantiated(float $radius, bool $isCircleValid)
    {
        if (false === $isCircleValid) {
            $this->expectException(InvalidArgumentException::class);
        }

        new Circle($radius);
    }

    public function provideCircleRadiusData()
    {
        return [
            [1, true],
            [1.0, true],
            [20, true],
            [20.7, true],
            [0.5, true],
            [0.1, true],
            [0, false],
            [0.0, false],
            [-0.1, false],
            [-2.0, false],
            [-2, false],
        ];
    }
}
