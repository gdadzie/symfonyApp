<?php

namespace App\Repository;

use App\Entity\Apiinstallperm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Apiinstallperm>
 *
 * @method Apiinstallperm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apiinstallperm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apiinstallperm[]    findAll()
 * @method Apiinstallperm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiinstallpermRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apiinstallperm::class);
    }

    public function save(Apiinstallperm $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Apiinstallperm $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Apiinstallperm[] Returns an array of Apiinstallperm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Apiinstallperm
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
