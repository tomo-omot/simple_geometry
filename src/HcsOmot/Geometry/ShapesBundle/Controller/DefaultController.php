<?php

namespace HcsOmot\Geometry\ShapesBundle\Controller;

use HcsOmot\Geometry\ShapesBundle\Entity\Circle;
use HcsOmot\Geometry\ShapesBundle\Entity\Triangle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('HcsOmotGeometryShapesBundle:Default:index.html.twig');
    }

    /**
     * @Route("/triangle/{sideA}/{sideB}/{sideC}")
     * @Method("GET")
     *
     * @param float $sideA
     * @param float $sideB
     * @param float $sideC
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function triangle(float $sideA, float $sideB, float $sideC)
    {
        $triangle = new Triangle($sideA, $sideB, $sideC);

        $shapeProcessor = $this->get('hcs_omot_geometry_shapes.shape_details_obtainer');

        $shapeDetails = $shapeProcessor->getShapeDetails($triangle);

        $response = new JsonResponse($shapeDetails);

        return $response;
    }

    /**
     * @Route("/circle/{radius}")
     * @Method("GET")
     *
     * @param float $radius
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function circle(float $radius)
    {
        $circle = new Circle($radius);

        $shapeProcessor = $this->get('hcs_omot_geometry_shapes.shape_details_obtainer');

        $shapeDetails = $shapeProcessor->getShapeDetails($circle);

        $response = new JsonResponse($shapeDetails);

        return $response;
    }
}
