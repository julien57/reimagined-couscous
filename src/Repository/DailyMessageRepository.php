<?php

namespace App\Repository;

use App\Entity\DailyMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DailyMessage|null find($id, $lockMode = null, $lockVersion = null)
 * @method DailyMessage|null findOneBy(array $criteria, array $orderBy = null)
 * @method DailyMessage[]    findAll()
 * @method DailyMessage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DailyMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DailyMessage::class);
    }

    // /**
    //  * @return DailyMessage[] Returns an array of DailyMessage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DailyMessage
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
