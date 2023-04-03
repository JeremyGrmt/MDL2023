<?php

namespace App\Repository;

use App\Entity\InscritionAtelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscritionAtelier>
 *
 * @method InscritionAtelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscritionAtelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscritionAtelier[]    findAll()
 * @method InscritionAtelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscritionAtelierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscritionAtelier::class);
    }

    public function save(InscritionAtelier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(InscritionAtelier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return InscritionAtelier[] Returns an array of InscritionAtelier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InscritionAtelier
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
