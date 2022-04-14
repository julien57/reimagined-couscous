<?php

namespace App\Repository;

use App\Entity\PageBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PageBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method PageBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method PageBlock[]    findAll()
 * @method PageBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PageBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PageBlock::class);
    }

    public function findByPage($value)
    {
        return $this->createQueryBuilder('bp')
            ->addSelect('bl')//block
            ->addSelect('p')//page
            ->addSelect('b_i')//blockitem
            ->addSelect('i')//item
            ->addSelect('bc')//block children
            ->addSelect('chi')//children
            ->leftJoin('bp.block', 'bl')
            ->leftJoin('bp.page', 'p')
            ->leftJoin('bl.blockItem', 'b_i')
            ->leftJoin('b_i.item', 'i')
            ->leftJoin('bp.pageBlock', 'bc')
            ->leftJoin('bc.children', 'chi')

            ->andWhere('bp.page = :val')
            ->setParameter('val', $value)
            ->orderBy('bp.itemOrder', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    public function findFromBlockPage()
    {
        return $this->createQueryBuilder('bp')
            ->addSelect('bl')//block
            ->addSelect('p')//page
            ->leftJoin('bp.block', 'bl')
            ->leftJoin('bp.page', 'p')
            ->orderBy('bp.itemOrder', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

    //for front
    public function getbyNameByBlockType(string $slug, string $locale)
    {
        return $this->createQueryBuilder('bp')
            ->addSelect('p')//page
            ->addSelect('bl')//block
            ->leftJoin('bp.page', 'p')
            ->leftJoin('bp.block', 'bl')
            ->where('p.slug = :slug')
            ->setParameter('slug', $slug)
            ->andWhere('bp.block IS NOT NULL')
            ->andWhere('p.type = :type')
            ->setParameter('type', $slug)
            ->andWhere('bp.jsonData LIKE :locale')
            ->setParameter('locale', '%"lang_block":"'.$locale.'"%')
            ->orderBy('bp.itemOrder', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getByPageNameBy($name, int $locale = null)
    {
        $qb = $this->createQueryBuilder('bp')
            ->addSelect('p')//page
            ->addSelect('bl')//block
            ->addSelect('c')//content
            ->leftJoin('bp.page', 'p')
            ->leftJoin('bp.block', 'bl')
            ->leftJoin('bp.contents', 'c')
            ->where('p.name = :name')
            ->setParameter('name', $name);

        if ($locale) {
            $qb
                ->andWhere('c.language = :lang')
                ->setParameter('lang', $locale);
        }

        return
            $qb
                ->getQuery()
                ->getResult()
            ;
    }
}
