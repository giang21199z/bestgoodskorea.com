<?php

namespace App\Repository;

use App\Entity\SanPham;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SanPham|null find($id, $lockMode = null, $lockVersion = null)
 * @method SanPham|null findOneBy(array $criteria, array $orderBy = null)
 * @method SanPham[]    findAll()
 * @method SanPham[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SanPhamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SanPham::class);
    }

    // /**
    //  * @return SanPham[] Returns an array of SanPham objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SanPham
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function search($keyword): array {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT s
            FROM App\Entity\SanPham s
            WHERE s.ten LIKE :ten
            OR s.ten_kr LIKE :ten'
        )->setParameter('ten', "%$keyword%");

        return $query->getResult();
    }
}
