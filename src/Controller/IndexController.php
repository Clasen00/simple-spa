<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Issues;

final class IndexController extends AbstractController
{
    /**
     * @Route("/{vueRouting}", name="index")
    *  @Route("/", name="index")
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig', []);
    }
}