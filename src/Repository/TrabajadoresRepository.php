<?php

namespace App\Repository;

use App\Entity\Trabajadores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Trabajadores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trabajadores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trabajadores[]    findAll()
 * @method Trabajadores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrabajadoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trabajadores::class);
    }

    // /**
    //  * @return Trabajadores[] Returns an array of Trabajadores objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trabajadores
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
