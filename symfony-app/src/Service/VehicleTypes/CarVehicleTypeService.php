<?php
namespace App\Service\VehicleTypes;

use App\Entity\CarVehicleType;
use App\Enum\CarCategory;

class CarVehicleTypeService
{
    public function createNewInstance($params) :CarVehicleType {
        $car = new CarVehicleType();
        $car->setBrand($params['brand']);
        $car->setModel($params['model']);
        $car->setEngineCapacity((int)$params['engine_capacity']);
        $car->setColour($params['colour']);
        $car->setNumberOfDoors($params['number_of_doors']);
        $car->setCarCategory(CarCategory::tryFrom($params['car_category']));
        $car->setPrice($params['price']);
        $car->setQuantity($params['quantity']);

        return $car;
    }
}
