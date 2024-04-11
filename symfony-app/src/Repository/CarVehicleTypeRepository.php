<?php

namespace App\Repository;

use App\Entity\CarVehicleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarVehicleType>
 *
 * @method CarVehicleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarVehicleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarVehicleType[]    findAll()
 * @method CarVehicleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarVehicleTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarVehicleType::class);
    }
}
