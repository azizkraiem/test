<?php

namespace App\Repository;

use App\Entity\Author;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Author>
 *
 * @method Author|null find($id, $lockMode = null, $lockVersion = null)
 * @method Author|null findOneBy(array $criteria, array $orderBy = null)
 * @method Author[]    findAll()
 * @method Author[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuthorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

//    /**
//     * @return Author[] Returns an array of Author objects
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

//    public function findOneBySomeField($value): ?Author
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
public function showallauthorsByFirstalphabetL(){//shows all authors that their usernames starts with l
    return $this->createQueryBuilder(alias:'a')
    ->where(predicates:'a.username LIKE :username')
    ->setParameter(key:'username',value:'L%')
    ->getQuery()
    ->getResult();
}
public function OrderauthorsByFirstname(){//shows the usernames ordered by alphabets ABCDEFG
    return $this->createQueryBuilder(alias:'a')
    ->orderBy(sort:'a.username',order:'ASC')
    ->getQuery()
    ->getResult();
}
public function showallauthorsBylastalphabet()//shows the usernames that their last alphabets is i
{
return $this->createQueryBuilder(alias:'a')
->where(predicates:'a.username = :username')
->setParameter(key:'username',value:'%i')
->getQuery()
->getResult();
}
public function showalistauthors()
{
    return $this->createQueryBuilder(alias:'a')
    ->where(predicates:"a.email LIKE ?1")
     ->setParameter(key:'1',value:'%v%')
    ->getQuery()
    ->getResult();
    
}
/*
public function listByCandidat($id)
{
    $dql = "SELECT e FROM YourEntity e
            JOIN e.candidat c
            WHERE c.id = :id
            AND e.someValue > 0";

    $query = $this->_em->createQuery($dql);
    $query->setParameter('id', $id);

    return $query->getResult();






$joueurs = $joueurRepository-
>findBy(array(),array('nom'=>'ASC'));










*/



}
