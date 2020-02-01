<?php

namespace App\DataFixtures;

use App\Entity\Producto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
class ProductoFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $product = new Producto();
        $product->setNombre('Keyboard');
        $product->setPrecio(12);
        $manager->persist($product);
        $manager->flush();
    }
}
