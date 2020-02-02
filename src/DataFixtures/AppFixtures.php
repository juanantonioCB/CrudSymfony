<?php

namespace App\DataFixtures;

use App\Entity\Empleados;
use App\Entity\Empresas;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $empresa1=new Empresas();
        $empresa1->setNombre("Vodafone");
        $empresa1->setDireccion('C/La piruleta 34');
        $empresa1->setFechaRegistro(new \DateTime('2019-05-04'));
        $manager->persist($empresa1);

        $empresa2=new Empresas();
        $empresa2->setNombre("Apple");
        $empresa2->setDireccion('C/Inventada 24');
        $empresa2->setFechaRegistro(new \DateTime('1980-03-10'));
        $manager->persist($empresa2);

        $empresa3=new Empresas();
        $empresa3->setNombre("Xiaomi");
        $empresa3->setDireccion('C/Inexistente 1');
        $empresa3->setFechaRegistro(new \DateTime('2010-06-12'));
        $manager->persist($empresa3);

        $empresa4=new Empresas();
        $empresa4->setNombre("Acer");
        $empresa4->setDireccion('Avda. El Brillante 9');
        $empresa4->setFechaRegistro(new \DateTime('2004-08-22'));
        $manager->persist($empresa4);

        $empresa5=new Empresas();
        $empresa5->setNombre("Philips");
        $empresa5->setDireccion('C/No se 7');
        $empresa5->setFechaRegistro(new \DateTime('1995-06-02'));
        $manager->persist($empresa5);


        $empleado1=new Empleados();
        $empleado1->setNombre('Manuel');
        $empleado1->setApellidos('Jimenez Rodriguez');
        $empleado1->setEstadoCivil('soltero');
        $empleado1->setActivo(true);
        $empleado1->setImagen(null);
        $empleado1->setEmpresa($empresa1);
        $empleado1->setNumeroHijos(0);
        $empleado1->setFechaNacimiento(new \DateTime('2020-01-01'));
        $manager->persist($empleado1);

        $empleado2=new Empleados();
        $empleado2->setNombre('Gonzalo');
        $empleado2->setApellidos('Sanchez Lopez');
        $empleado2->setEstadoCivil('divorciado');
        $empleado2->setActivo(true);
        $empleado2->setImagen(null);
        $empleado2->setEmpresa($empresa1);
        $empleado2->setNumeroHijos(1);
        $empleado2->setFechaNacimiento(new \DateTime('1940-05-10'));
        $manager->persist($empleado2);

        $empleado3=new Empleados();
        $empleado3->setNombre('Maria');
        $empleado3->setApellidos('Fernandez Alamo');
        $empleado3->setEstadoCivil('casado');
        $empleado3->setActivo(true);
        $empleado3->setImagen(null);
        $empleado3->setEmpresa($empresa1);
        $empleado3->setNumeroHijos(3);
        $empleado3->setFechaNacimiento(new \DateTime('1990-01-01'));
        $manager->persist($empleado3);

        $empleado4=new Empleados();
        $empleado4->setNombre('Ana');
        $empleado4->setApellidos('Cabezas Rodriguez');
        $empleado4->setEstadoCivil('viudo');
        $empleado4->setActivo(true);
        $empleado4->setImagen(null);
        $empleado4->setEmpresa($empresa2);
        $empleado4->setNumeroHijos(0);
        $empleado4->setFechaNacimiento(new \DateTime('1993-04-10'));
        $manager->persist($empleado4);

        $empleado5=new Empleados();
        $empleado5->setNombre('Raul');
        $empleado5->setApellidos('Prieto Martinez');
        $empleado5->setEstadoCivil('soltero');
        $empleado5->setActivo(true);
        $empleado5->setImagen(null);
        $empleado5->setEmpresa($empresa3);
        $empleado5->setNumeroHijos(0);
        $empleado5->setFechaNacimiento(new \DateTime('2001-05-12'));
        $manager->persist($empleado5);


        $manager->flush();
    }
}
