<?php

namespace App\Repository;

use App\Entity\Acceso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AccesoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Acceso::class);
    }

    public function accesoHost()
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder()->from(Acceso::class, 'a')
            ->select('a.host')
            ->addSelect('COUNT(a.id) as total')
            ->groupBy('a.host')
            ->orderBy('total', 'DESC');
        $arAccesoHost = $queryBuilder->getQuery()->getResult();
        return $arAccesoHost;
    }
}