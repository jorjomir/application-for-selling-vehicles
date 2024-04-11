<?php
namespace App\Service\VehicleTypes;

use App\Entity\MotorcycleVehicleType;

class MotorcycleVehicleTypeService
{
    public function createNewInstance($params) :MotorcycleVehicleType {
        $motorcycle = new MotorcycleVehicleType();
        $motorcycle->setBrand($params['brand']);
        $motorcycle->setModel($params['model']);
        $motorcycle->setEngineCapacity((int)$params['engine_capacity']);
        $motorcycle->setColour($params['colour']);
        $motorcycle->setPrice($params['price']);
        $motorcycle->setQuantity($params['quantity']);

        return $motorcycle;
    }
}
