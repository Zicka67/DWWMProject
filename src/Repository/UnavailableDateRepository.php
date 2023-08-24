<?php

namespace App\Repository;

use App\Entity\UnavailableDate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UnavailableDate>
 *
 * @method UnavailableDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnavailableDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnavailableDate[]    findAll()
 * @method UnavailableDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnavailableDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnavailableDate::class);
    }

    public function save(UnavailableDate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UnavailableDate $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UnavailableDate[] Returns an array of UnavailableDate objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UnavailableDate
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
