<?php

namespace App\Util;

use ReflectionClass;
use ReflectionProperty;

class HelperUtility {
    public static function callAllGetters($object): array {
        $reflectionClass = new ReflectionClass(get_class($object));
        $properties = $reflectionClass->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED);

        $data = [];
        foreach ($properties as $property) {
            $getter = 'get' . ucfirst($property->getName());

            if ($reflectionClass->hasMethod($getter)) {
                $reflectionMethod = $reflectionClass->getMethod($getter);

                if ($reflectionMethod->getNumberOfRequiredParameters() == 0) {
                    $value = $reflectionMethod->invoke($object);

                    if (gettype($value) === 'object') {
                        $value = $value->getId();
                    }
                    $data[$property->getName()] = $value;
                }
            }
        }
        return $data;
    }
}