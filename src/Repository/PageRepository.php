<?php

namespace App\Repository;

use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Page|null find($id, $lockMode = null, $lockVersion = null)
 * @method Page|null findOneBy(array $criteria, array $orderBy = null)
 * @method Page[]    findAll()
 * @method Page[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function getPageBySlug(string $slug)
    {
        return $this->createQueryBuilder('p')
            ->where('p.slugs LIKE :slug')
            ->setParameter('slug', '%"'.$slug.'"%')
            ->andWhere('p.active = 1')
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * Get one page in array.
     *
     * @return mixed
     */
    public function getOnePage(int $id)
    {
        return $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getArrayResult();
    }

    public function getCountPages()
    {
        return $this->createQueryBuilder('p')
            ->select('count(p.id)')
            ->where('p.type != :type')
            ->setParameter('type', 'post')
            ->orWhere('p.type IS NULL')
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    public function getPages()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('bp')//page
            ->addSelect('bl')//block
            ->leftJoin('p.pageBlocks', 'bp')
            ->leftJoin('bp.block', 'bl')
            ->where('p.name != :name')
            ->setParameter('name', 'site')
            ->orderBy('bp.itemOrder', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function getPagesDesc()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('bp')//page
            ->addSelect('bl')//block
            ->leftJoin('p.pageBlocks', 'bp')
            ->leftJoin('bp.block', 'bl')
            ->where('p.name != :name')
            ->setParameter('name', 'site')
            ->orderBy('p.name', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function getArticles()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('bp')//page
            ->addSelect('bl')//block
            ->leftJoin('p.pageBlocks', 'bp')
            ->leftJoin('bp.block', 'bl')
            ->where('p.name != :name')
            ->setParameter('name', 'site')
            ->andWhere('p.type = :type')
            ->setParameter('type', Page::PAGE_TYPE_POST)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
