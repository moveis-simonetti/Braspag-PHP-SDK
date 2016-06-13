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

use GuzzleHttp\Client as HttpClient;
use Braspag\Model\Payment\Link;
use Braspag\Model\Sale\Message;

trait Util
{
    static protected function capitalizeRequestData($data)
    {
        foreach ($data as $key => &$value) {
            if (\is_array($value)) {
                $value = self::capitalizeRequestData($value);
            }
            $data[\ucfirst($key)] = $value;
            if (ctype_lower($key{0})) {
                unset($data[$key]);
            }
        }
        return $data;
    }

    public function addLink($data)
    {
        if (!$data) {
            return null;
        }
        return new Link((array)$data);
    }


    public function parseLinks($source)
    {
        $linkCollection = array();

        foreach ($source as $l) {
            $link = $this->addLink($l);
            \array_push($linkCollection, $link);
        }

        return $linkCollection;
    }

    /**
     * @param $data
     * @return Message|null
     */
    public function setMessage($data)
    {
        if (!$data) {
            return null;
        }
        return new Message((array)$data);
    }


    /**
     * @param $messages
     * @return $this
     */
    public function parseMessages($messages)
    {
        $messageCollection = array();

        foreach ($messages as $message) {
            \array_push($messageCollection, $this->setMessage((array)$message));
        }

        return $messageCollection;
    }

}