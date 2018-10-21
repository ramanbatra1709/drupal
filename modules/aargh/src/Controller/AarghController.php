<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 13:34
 */

namespace Drupal\aargh\Controller;

use Drupal\aargh\Services\AarghGenerator;
use Symfony\Component\HttpFoundation\Response;

class AarghController {
    public function aargh($num) {
        $aarghGenerator = new AarghGenerator();
        $aargh = $aarghGenerator->getAargh($num);
        return new Response($aargh);
    }
}
