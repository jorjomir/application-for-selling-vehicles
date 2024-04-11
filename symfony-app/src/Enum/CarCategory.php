<?php
namespace App\Enum;

enum CarCategory: string {
    case Sedan = 'sedan';
    case Hatchback = 'hatchback';
    case Suv = 'suv';
    case Coupe = 'coupe';
}