<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IssuesController extends AbstractController
{
    /**
     * @Route("/issues", name="issues")
     */
    public function index()
    {
        
        
        return $this->render('issues/index.html.twig', [
            'controller_name' => 'IssuesController',
        ]);
    }
}
