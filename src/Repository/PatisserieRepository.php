<?php

namespace App\Repository;

use App\Entity\Patisserie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Patisserie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patisserie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patisserie[]    findAll()
 * @method Patisserie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatisserieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Patisserie::class);
    }

    /**
     * @return Patisserie[] Returns an array of Patisserie objects
    */
    public function lastFive()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Patisserie[] Returns an array of Patisserie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Patisserie
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
