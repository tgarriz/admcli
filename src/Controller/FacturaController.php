<?php

namespace App\Controller;

use App\Entity\Cliente;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class FacturaController extends AbstractController
{
    /**
     * @Route("/facturacion", name="facturacion")
     */
    public function index()
    {
        $form = $this->createFormBuilder()
            ->add('fecha', DateType::class)
            ->add('Vencimiento', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Crear Facturacion'])
            ->getForm();
            $clientes = $this->getDoctrine()->getRepository(Cliente::class)->findAll();
            return $this->render('factura/facturacion.html.twig', [
                'controller_name' => 'FacturaController',
                'form' => $form->createView()
            ]);
      
    }
}
