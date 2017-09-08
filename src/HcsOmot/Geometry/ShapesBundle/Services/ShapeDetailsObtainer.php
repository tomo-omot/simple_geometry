<?php

namespace HcsOmot\Geometry\ShapesBundle\Services;

use HcsOmot\Geometry\ShapesBundle\Entity\ShapeInterface;

class ShapeDetailsObtainer
{
    public function getShapeDetails(ShapeInterface $shape): array
    {
        $type      = get_class($shape);
        $perimeter = $shape->getPerimeter();
        $area      = $shape->getArea();

        return [
            'type'      => $type,
            'area'      => $area,
            'perimeter' => $perimeter,
        ];
    }
}
