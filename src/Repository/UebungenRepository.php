<?php

namespace App\Repository;

use App\Entity\Uebungen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Uebungen>
 *
 * @method Uebungen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uebungen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uebungen[]    findAll()
 * @method Uebungen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UebungenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uebungen::class);
    }

    //    /**
    //     * @return Uebungen[] Returns an array of Uebungen objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Uebungen
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
