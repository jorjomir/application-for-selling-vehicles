<?php
namespace App\Enum;

enum UserType: string {
    case Merchant = 'merchant';
    case Buyer = 'buyer';
}