<?php

namespace App\Repository;

use App\Entity\BlockChildren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BlockChildren|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlockChildren|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlockChildren[]    findAll()
 * @method BlockChildren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockChildrenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlockChildren::class);
    }

    // /**
    //  * @return BlockChildren[] Returns an array of BlockChildren objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlockChildren
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getBlockChildren($value): ?BlockChildren
    {
        return $this->createQueryBuilder('bc')
            ->addSelect('bl')//block
            ->addSelect('pb')//page
            ->addSelect('b_i')//blockitem
            ->addSelect('i')//item
            ->leftJoin('bc.children', 'bl')
            ->leftJoin('bc.pageBlock', 'pb')
            ->leftJoin('bl.blockItem', 'b_i')
            ->leftJoin('b_i.item', 'i')
            ->andWhere('bc.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
}
