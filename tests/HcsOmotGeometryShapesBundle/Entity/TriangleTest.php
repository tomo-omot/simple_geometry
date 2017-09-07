<?php

namespace Tests\HcsOmotGeometryShapesBundle\Entity;

use HcsOmot\Geometry\ShapesBundle\Entity\Triangle;
use InvalidArgumentException;
use PhpSpec\Formatter\Presenter\Value\TruncatingStringTypePresenter;

class TriangleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideValuesToCreateATriangle
     *
     * @param int $sideA
     * @param int $sideB
     * @param int $sideC
     * @param bool $isTriangleValid
     */
    public function testCanAValidTriangleBeInstatiated(float $sideA, float $sideB, float $sideC, bool $isTriangleValid)
    {
        if (false === $isTriangleValid) {
            $this->expectException(InvalidArgumentException::class);
        }

        $triangle = new Triangle($sideA, $sideB, $sideC);
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

    /**
     * @dataProvider provideValidTriangleValuesAndTheirPerimeterSizes
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     * @param float $expectedPerimeterSize
     */
    public function testItCanCalculateTheTrianglePerimeterSize(float $sideA, float $sideB, float $sideC, float
    $expectedPerimeterSize)
    {
        $triangle = new Triangle($sideA, $sideB, $sideC);

        $this->assertEquals($expectedPerimeterSize, $triangle->getPerimeter());
    }

    public function provideValidTriangleValuesAndTheirPerimeterSizes()
    {
        return [
            [1, 1, 1, 3.0],
            [2, 8, 9, 19.0],
            [11.5, 4.9, 13.22, 29.62],
        ];
    }

    /**
     * @dataProvider provideValidTriangleValuesAndTheirAreaSizes
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     * @param float $expectedAreaSize
     */
    public function testItCanCalculateTheTriangleAreaSize(float $sideA, float $sideB, float $sideC, float
    $expectedAreaSize)
    {
        $triangle = new Triangle($sideA, $sideB, $sideC);

        $this->assertEquals($expectedAreaSize, $triangle->getArea());
    }

    public function provideValidTriangleValuesAndTheirAreaSizes()
    {
        return [
            [1, 1, 1, 0.43301270189222],
            [2, 8, 9, 7.3100957586067],
            [11.5, 4.9, 13.22, 27.792455281785],
        ];
    }
}
