<?php

namespace Tests\HcsOmotGeometryShapesBundle\Entity;

use HcsOmot\Geometry\ShapesBundle\Entity\Circle;
use InvalidArgumentException;

class CircleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideCircleRadiusData
     * @param float $radius
     * @param bool $isCircleValid
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
            [-2, false]
        ];
    }

    /**
     * @dataProvider provideCircleRadiusAndPerimeterSize
     * @param float $radius
     * @param float $expectedPerimeterSize
     */
    public function testItCanCalculateTheCirclePerimeterSize(float $radius, float $expectedPerimeterSize)
    {
        $circle = new Circle($radius);

        $this->assertEquals($expectedPerimeterSize, $circle->getPerimeter(), '', 0.0000001);

    }

    public function provideCircleRadiusAndPerimeterSize()
    {
        return [
            [1, 6.2831853],
            [1.0, 6.2831853],
            [20, 125.6637061],
            [20.7, 130.0619358],
            [0.5, 3.1415926],
            [0.1, 0.6283185],
            [0.001, 0.0062831],
        ];
    }

    /**
     * @dataProvider provideCircleRadiusAndAreaSize
     * @param float $radius
     * @param float $expectedAreaSize
     */
    public function testItCanCalculateTheCircleAreaSize(float $radius, float $expectedAreaSize)
    {
        $circle = new Circle($radius);

        $this->assertEquals($expectedAreaSize, $circle->getArea(), '', 0.0000001);
    }

    public function provideCircleRadiusAndAreaSize()
    {
        return [
            [1, 3.1415926],
            [1.0, 3.1415926],
            [20, 1256.6370614],
            [20.7, 1346.1410361],
            [0.5, 0.7853981],
            [0.1, 0.0314159],
            [0.001, 3.1415926535898E-6],
        ];
    }
}
