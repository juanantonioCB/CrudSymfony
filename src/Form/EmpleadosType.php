<?php

namespace App\Form;

use App\Entity\Empleados;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use App\Entity\Empresas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class EmpleadosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Apellidos')
            ->add('NumeroHijos')
            ->add('FechaNacimiento', DateType::Class, array(
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') - 100),
            ))
            ->add('EstadoCivil', ChoiceType::class, [
                'choices' => [
                    'Soltero' => 'Soltero',
                    'Casado' => 'Casado',
                    'Divorciado' => 'Divorciado',
                    'Viudo' => 'Viudo',
                ],
            ])
            ->add('Activo')
            ->add('Imagen', FileType::class, [
                'label' => 'Imagen',
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // everytime you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '3000k',
                        'mimeTypes' => [
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Por favor, sube una imagen válida',
                    ])
                ],
            ])
            ->add('Empresa', EntityType::class, array(
                // looks for choices from this entity
                'class' => Empresas::class,

                // uses the Product.Name property as the visible option string
                'choice_label' => 'Nombre',

                // used to render a select box, check boxes or radios
                'multiple' => false,

                // used to send propierties to HTML
                'attr' => array('class' => 'form-control')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empleados::class,
        ]);
    }
}
