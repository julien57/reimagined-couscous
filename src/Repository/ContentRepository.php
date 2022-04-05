<?php

namespace App\Repository;

use App\Entity\Content;
use App\Entity\Page;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Content|null find($id, $lockMode = null, $lockVersion = null)
 * @method Content|null findOneBy(array $criteria, array $orderBy = null)
 * @method Content[]    findAll()
 * @method Content[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Content::class);
    }

    public function getLangExist(?int $langId, int $pageId)
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.blockChildren', 'blockChildren')
            ->leftJoin('c.pageBlock', 'pageblock')
            ->leftJoin('pageblock.page', 'page')
            ->where('page.id = :pageId')
            ->setParameter('pageId', $pageId)
            ->orWhere('page.id = :pageId')
            ->setParameter('pageId', $pageId);

        if ($langId) {
            $qb
                ->andWhere('pageblock.language = :lang')
                ->setParameter('lang', $langId);
        }

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getDailyMessage($langId)
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.pageBlock', 'pageBlock')
            ->leftJoin('pageBlock.block', 'block')
            ->leftJoin('pageBlock.page', 'page')
            ->leftJoin('c.blockChildren', 'blockChildren')
            ->leftJoin('blockChildren.pageBlock', 'pageBlockChildren')
            ->leftJoin('pageBlockChildren.page', 'pageChildren')
            ->where('c.language = :lang')
            ->setParameter('lang', $langId)
            ->andWhere('block.name = :name')
            ->setParameter('name', 'daily message')
            ->getQuery()
            ->getResult();
    }

    public function getContentsByLang(Page $page)
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.page', 'page')
            ->where('page.id = :pageId')
            ->setParameter('pageId', $page->getId())
            ->groupBy('c.language')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Content[] Returns an array of Content objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Content
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
