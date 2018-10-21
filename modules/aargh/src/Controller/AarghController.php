<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 13:34
 */

namespace Drupal\aargh\Controller;

use Drupal\aargh\Services\AarghGenerator;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class AarghController extends ControllerBase {

    private $aarghGenerator;

    public function __construct(AarghGenerator $aarghGenerator) {
        $this->aarghGenerator = $aarghGenerator;
    }

    public function aargh($num) {
        $aargh = $this->aarghGenerator->getAargh($num);
        return new Response($aargh);
    }

    public static function create(ContainerInterface $container) {
        $aarghGenerator = $container->get('aargh.aargh_generator');
        return new static($aarghGenerator);
    }
}
