<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Patisserie;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

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

    /**
    * @return Patisserie[] Returns an array of Patisserie objects
    */
    public function findAllPortfolio(Categorie $categorie): array
    {
        return $this->createQueryBuilder('p')
            ->where(':categorie MEMBER OF p.categorie')
            ->andWhere('p.portfolio = TRUE')
            ->setParameter('categorie', $categorie)
            ->getQuery()
            ->getResult()
        ;
    }

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
