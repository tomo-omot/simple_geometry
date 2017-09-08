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

    private $shapeDetailsObtainer;

    public function __construct(Triangle $triangle, Circle $circle)
    {
        $this->triangle = $triangle;
        $this->circle   = $circle;

        $this->shapeDetailsObtainer = new ShapeDetailsObtainer();

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
        $trianglePerimeter = $this->shapeDetailsObtainer->calculateTrianglePerimeter($this->triangle);
        $circlePerimeter   = $this->shapeDetailsObtainer->calculateCirclePerimeter($this->circle);

        $this->perimeterSum = $trianglePerimeter + $circlePerimeter;
    }

    private function calculateAreaSum()
    {
        $triangleArea = $this->shapeDetailsObtainer->calculateTriangleArea($this->triangle);
        $circleArea   = $this->shapeDetailsObtainer->calculateCircleArea($this->circle);

        $this->areaSum = $triangleArea + $circleArea;
    }
}
