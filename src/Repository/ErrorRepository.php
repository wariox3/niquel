<?php

namespace App\Repository;

use App\Entity\Error;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ErrorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Error::class);
    }

    public function lista($raw)
    {
        $em = $this->getEntityManager();
        $limiteRegistros = $raw['limiteRegistros']??100;
        $entorno = $raw['entorno']??null;
        $queryBuilder = $em->createQueryBuilder()->from(Error::class, 'e')
            ->select('e.id')
            ->addSelect('e.fecha')
            ->addSelect('e.archivo')
            ->addSelect('e.mensaje')
            ->addSelect('e.usuario')
            ->addSelect('e.ruta')
            ->addSelect('e.traza')
            ->addSelect('e.entorno')
            ->addSelect('e.contenedor')
            ->orderBy('e.fecha', 'DESC');
        if($entorno) {
            $queryBuilder->andWhere("e.entorno='{$entorno}'");
        }
        $queryBuilder->setMaxResults($limiteRegistros);
        return $queryBuilder->getQuery()->getResult();
    }

    public function detalle($errorId)
    {
        $em = $this->getEntityManager();
        $queryBuilder = $em->createQueryBuilder()->from(Error::class, 'e')
            ->select('e.id')
            ->addSelect('e.fecha')
            ->addSelect('e.archivo')
            ->addSelect('e.mensaje')
            ->addSelect('e.usuario')
            ->addSelect('e.ruta')
            ->addSelect('e.traza')
            ->addSelect('e.entorno')
            ->addSelect('e.contenedor')
            ->where("e.id = {$errorId}");
        $arError =$queryBuilder->getQuery()->getOneOrNullResult();
        return $arError;
    }
}