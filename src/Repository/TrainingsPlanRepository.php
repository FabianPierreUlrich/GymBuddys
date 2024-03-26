<?php

namespace App\Repository;

use App\Entity\TrainingsPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrainingsPlan>
 *
 * @method TrainingsPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainingsPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainingsPlan[]    findAll()
 * @method TrainingsPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingsPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainingsPlan::class);
    }

    //    /**
    //     * @return TrainingsPlan[] Returns an array of TrainingsPlan objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?TrainingsPlan
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
