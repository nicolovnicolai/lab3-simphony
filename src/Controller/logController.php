<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\GreetingGenerator;

class logController extends AbstractController
{
    /**
     * @Route("/logger/{name}", methods={"GET"}, name="task_crte")
     * 
     */
    public function index($name, LoggerInterface $logger, GreetingGenerator $generator)
    {
        $greeting = $generator->getRandomGreeting();
        $logger->info("Saying $greeting to $name!");
        return new Response($greeting.', '.$name, 200);
    }
}
