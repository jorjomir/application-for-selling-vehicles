<?php
namespace App\Service;

use App\Entity\Offer;
use App\Enum\VehicleType;
use App\Util\HelperUtility;
use Doctrine\ORM\EntityManagerInterface;

class OfferService
{
    const VEHICLE_SERVICE_NAME = 'VehicleTypeService';

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createOffer(array $params, $user): array
    {
        $vehicleType = VehicleType::from($params['vehicle_type']);

        $this->entityManager->beginTransaction();

        try {
            $offer = new Offer();
            $offer->setUser($user);
            $offer->setVehicleType($vehicleType);
            $this->entityManager->persist($offer);

            $vehicleTypeClass = 'App\Service\VehicleTypes\\' . ucfirst($vehicleType->value) . self::VEHICLE_SERVICE_NAME;
            $instance = new $vehicleTypeClass();
            $vehicleInstance = $instance->createNewInstance($params['details']);
            $vehicleInstance->setOffer($offer);

            $this->entityManager->persist($vehicleInstance);
            $this->entityManager->flush();
            $this->entityManager->commit();

            return ['offer' => HelperUtility::callAllGetters($offer), 'vehicle' => HelperUtility::callAllGetters($vehicleInstance)];
        } catch (\Exception $e) {
            $this->entityManager->rollback();  // rollback transaction on error
            throw $e;
        }
    }

}
