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
    private $useCache;

    public function __construct(KeyValueFactoryInterface $keyValueFactory, $useCache)   {
        $this->keyValueFactory = $keyValueFactory;
        $this->useCache = $useCache;
    }

    public function getAargh($num) {
        $key = 'aargh_'.$num;
        $store = $this->keyValueFactory->get('aargh');

        if ($this->useCache && $store->has($key)) {
            return $store->get($key);
        }

        // some long processing task
        sleep(2);

        // cache the long processed value
        $string = 'A'.str_repeat('a', $num).'rgh';

        if ($this->useCache) {
            $store->set($key, $string);
        }

        return $string;
    }
}
