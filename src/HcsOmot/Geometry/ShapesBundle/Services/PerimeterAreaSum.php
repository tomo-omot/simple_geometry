<?php

namespace HcsOmot\Geometry\ShapesBundle\Services;

use HcsOmot\Geometry\ShapesBundle\Entity\Circle;
use HcsOmot\Geometry\ShapesBundle\Entity\Triangle;

class PerimeterAreaSum
{
    /**
     * @var \HcsOmot\Geometry\ShapesBundle\Entity\Triangle
     */
    private $triangle;
    /**
     * @var \HcsOmot\Geometry\ShapesBundle\Entity\Circle
     */
    private $circle;

    private $perimeterSum;

    private $areaSum;

    public function __construct(Triangle $triangle, Circle $circle)
    {
        $this->triangle = $triangle;
        $this->circle   = $circle;

        $this->calculatePerimeterSum();
        $this->calculateAreaSum();
    }

    public function getPerimeterSum()
    {
        return $this->perimeterSum;
    }

    public function getAreaSum()
    {
        return $this->areaSum;
    }

    private function calculatePerimeterSum()
    {
        $trianglePerimeter = $this->triangle->getPerimeter();
        $circlePerimeter   = $this->circle->getPerimeter();

        $this->perimeterSum = $trianglePerimeter + $circlePerimeter;
    }

    private function calculateAreaSum()
    {
        $triangleArea = $this->triangle->getArea();
        $circleArea   = $this->circle->getArea();

        $this->areaSum = $triangleArea + $circleArea;
    }
}
