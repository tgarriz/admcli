<?php

namespace App\Form;

use App\Entity\Cliente;
use App\Entity\Factura;
use DateTime;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FacturacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaGenerada', DateTime::class)
            ->add('fechaVencimiento', DateTime::class)
            ->add('valor', Integer::class)
            ->add('pagada', Boolean::class)
            ->add('fechaDePago', DateTime::class)
            ->add('mp', String::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Factura::class,
        ]);
    }
}
