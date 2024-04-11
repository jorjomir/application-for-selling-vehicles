<?php

namespace App\Repository;

use App\Entity\MotorcycleVehicleType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MotorcycleVehicleType>
 *
 * @method MotorcycleVehicleType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MotorcycleVehicleType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MotorcycleVehicleType[]    findAll()
 * @method MotorcycleVehicleType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MotorcycleVehicleTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MotorcycleVehicleType::class);
    }
}
