<?php

namespace App\Repository;

use App\Entity\Timeline;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Timeline|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timeline|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timeline[]    findAll()
 * @method Timeline[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimelineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Timeline::class);
    }

    public function getUpdatesPerDay()
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.user', 'user')
            ->leftJoin('t.pageBlock', 'pageBlock')
            ->leftJoin('pageBlock.page', 'page')
            ->select('t.updatedAt AS updatedAt, SUBSTRING(t.updatedAt, 9, 2) AS day, page.name AS pageName, pageBlock.jsonData AS jsonData')
            ->addSelect('user.email AS firstname, pageBlock.id AS id')
            ->groupBy('updatedAt')
            ->orderBy('updatedAt', 'DESC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return Timeline[] Returns an array of Timeline objects
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
    public function findOneBySomeField($value): ?Timeline
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
