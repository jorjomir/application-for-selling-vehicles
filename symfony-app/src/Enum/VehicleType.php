<?php
namespace App\Enum;

enum VehicleType: string {
    case Motorcycle = 'motorcycle';
    case Car = 'car';
    case Truck = 'truck';
    case Trailer = 'trailer';
}