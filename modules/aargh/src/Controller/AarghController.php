<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 13:34
 */

namespace Drupal\aargh\Controller;

use Symfony\Component\HttpFoundation\Response;

class AarghController {
    public function aargh($num) {
        $aargh = 'A'.str_repeat('a', $num);
        return new Response($aargh);
    }
}
