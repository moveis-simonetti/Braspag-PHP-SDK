<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Braspag\Lib;

class Hydrator
{
    
    /**
     * @param $object
     * @param $data
     * @return mixed
     */
    static function hydrate(&$object, $data)
    {

        if (!\is_object($object)) {
            throw new \InvalidArgumentException('$object is not a valid PHP Object.');
        }

        if (!\is_array($data)) {
            throw new \InvalidArgumentException('$array is not a valid PHP Array.');
        }

        foreach ($data as $key => $value) {
            $method = 'set' . \ucfirst($key);
            if (\method_exists($object, $method)) {
                $object->$method($value);
            }
        }

        return $object;

    }
}