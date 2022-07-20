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

    public function getBlockChildren(int $blockId): ?BlockChildren
    {
        return $this->createQueryBuilder('bc')
            ->addSelect('bl')//block
            ->addSelect('pb')//page
            ->leftJoin('bc.block', 'bl')
            ->leftJoin('bc.pageBlock', 'pb')
            ->andWhere('bl.id = :val')
            ->setParameter('val', $blockId)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function getBlocksChildrenByBlockId(int $blockId): ?array
    {
        return $this->createQueryBuilder('bc')
            ->addSelect('bl')//block
            ->addSelect('pb')//page
            ->leftJoin('bc.block', 'bl')
            ->leftJoin('bc.pageBlock', 'pb')
            ->andWhere('bl.id = :val')
            ->setParameter('val', $blockId)
            ->getQuery()
            ->getResult()
            ;
    }
}
