<?php

namespace App\Repository;

use App\Entity\BlockItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Block2Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Block2Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Block2Item[]    findAll()
 * @method Block2Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlockItem::class);
    }

    // /**
    //  * @return Block2Item[] Returns an array of Block2Item objects
    //  */

    public function findByBlock($value)
    {
        return $this->createQueryBuilder('b')
            ->addSelect('bl')
            ->addSelect('it')
            ->leftJoin('b.block', 'bl')
            ->leftJoin('b.item', 'it')
            ->andWhere('b.block = :val')
            ->setParameter('val', $value)
            ->orderBy('b.item_order', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Block2Item
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findByBiId($value)
    {
        return $this->createQueryBuilder('bi')
            ->addSelect('i')//page
            ->addSelect('b')//block
            ->leftJoin('bi.block', 'b')
            ->leftJoin('bi.item', 'i')
            ->andWhere('bi.id = :val')
            ->setParameter('val', $value)
            ->orderBy('bi.item_order', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByBiBlock($value)
    {
        return $this->createQueryBuilder('bi')
            ->addSelect('i')//page
            ->addSelect('b')//block
            ->leftJoin('bi.block', 'b')
            ->leftJoin('bi.item', 'i')
            ->andWhere('bi.block = :val')
            ->setParameter('val', $value)
            ->orderBy('bi.item_order', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
