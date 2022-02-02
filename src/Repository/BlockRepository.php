<?php

namespace App\Repository;

use App\Entity\Block;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Block|null find($id, $lockMode = null, $lockVersion = null)
 * @method Block|null findOneBy(array $criteria, array $orderBy = null)
 * @method Block[]    findAll()
 * @method Block[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Block::class);
    }

    // /**
    //  * @return Block[] Returns an array of Block objects
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
    public function findOneBySomeField($value): ?Block
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @param $value
     *
     * @return mixed
     */
    public function getByBlock($value)
    {
        return $this->createQueryBuilder('b')
            ->addSelect('bi')//page
            ->addSelect('i')
            ->leftJoin('b.blockItem', 'bi')
            ->leftJoin('bi.item', 'i')
            ->andWhere('b.id = :val')
            ->setParameter('val', $value)
            ->orderBy('bi.item_order', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $name
     * @param $type
     *
     * @return mixed
     */
    public function findByPageAndType($name, $type)
    {
        return $this->createQueryBuilder('b')
            ->addSelect('bp')//block page
            ->addSelect('p')//page
            ->leftJoin('b.pageBlock', 'bp')
            ->leftJoin('bp.page', 'p')
            ->where('p.name = :name')
            ->andWhere('b.type = :type')
            ->setParameter('name', $name)
            ->setParameter('type', $type)
            ->getQuery()
            ->getResult();
    }
}
