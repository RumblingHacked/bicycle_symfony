<?php

namespace App\Controller;

use App\Bicycle\Bicycle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BicycleController extends AbstractController
{
    #[Route('/bicycle/ride', name: 'bicycle_ride', methods: ['GET', 'POST'])]
    public function rideBicycle(Request $request): Response
    {
        $bicycle = new Bicycle();

        $form = $this->createFormBuilder()
            ->add('start', SubmitType::class, ['attr' => ['class' => 'btn btn-success form-control']])
            ->add('stop', SubmitType::class, ['attr' => ['class' => 'btn btn-success form-control']])
            ->getForm();

        $form->handleRequest($request);
        
        $startMessage = '';
        $stopMessage = '';

        if ($form->isSubmitted() && $form->isValid()) {
            
            if ($form->get('start')->isClicked()) {
                $startMessage = $bicycle->start();
            } elseif ($form->get('stop')->isClicked()) {
                $stopMessage = $bicycle->stop();
            }
        }

        $isRunning = $bicycle->isRunning();

        return $this->render('bicycle/ride.html.twig', [
            'bicycleForm' => $form->createView(),
            'startMessage' => $startMessage,
            'isRunning' => $isRunning,
            'stopMessage' => $stopMessage,
        ]);
    }
}