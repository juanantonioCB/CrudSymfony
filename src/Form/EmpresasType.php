<?php

namespace App\Form;

use App\Entity\Empresas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class EmpresasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre', TextType::class)
            ->add('Direccion', TextType::class)
            ->add('FechaRegistro', DateType::Class, array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') - 100),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresas::class,
        ]);
    }
}
