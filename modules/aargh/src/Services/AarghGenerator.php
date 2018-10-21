<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 14:39
 */

namespace Drupal\aargh\Services;


class AarghGenerator    {
    public function getAargh($num) {
        return 'A'.str_repeat('a', $num).'gh';
    }
}
