<?php

namespace App\Repository;

use App\Entity\DonHang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DonHang|null find($id, $lockMode = null, $lockVersion = null)
 * @method DonHang|null findOneBy(array $criteria, array $orderBy = null)
 * @method DonHang[]    findAll()
 * @method DonHang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonHangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DonHang::class);
    }

    // /**
    //  * @return DonHang[] Returns an array of DonHang objects
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
    public function findOneBySomeField($value): ?DonHang
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
