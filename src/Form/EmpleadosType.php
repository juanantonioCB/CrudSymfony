<?php

namespace App\Form;

use App\Entity\Empleados;
use Doctrine\DBAL\Types\TextType;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

class EmpleadosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Apellidos')
            ->add('NumeroHijos')
            ->add('FechaNacimiento')
            ->add('EstadoCivil', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    'choices'  => [
                        'Nashville' => 'nashville',
                        'Paris'     => 'paris',
                        'Berlin'    => 'berlin',
                        'London'    => 'london',
                    ],
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empleados::class,
        ]);
    }
}
