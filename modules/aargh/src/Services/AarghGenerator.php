<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 14:39
 */

namespace Drupal\aargh\Services;


use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

class AarghGenerator    {

    private $keyValueFactory;

    public function __construct(KeyValueFactoryInterface $keyValueFactory)   {
        $this->keyValueFactory = $keyValueFactory;
    }

    public function getAargh($num) {
        $key = 'aargh_'.$num;
        $store = $this->keyValueFactory->get('aargh');

        if ($store->has($key)) {
            return $store->get($key);
        }

        // some long processing task
        sleep(2);

        // cache the long processed value
        $string = 'A'.str_repeat('a', $num).'gh';
        $store->set($key, $string);

        return $string;
    }
}
