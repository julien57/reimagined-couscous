<?php

namespace App\Repository;

use App\Entity\Dayroom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dayroom|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dayroom|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dayroom[]    findAll()
 * @method Dayroom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DayroomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dayroom::class);
    }

    // /**
    //  * @return Dayroom[] Returns an array of Dayroom objects
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
    public function findOneBySomeField($value): ?Dayroom
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
