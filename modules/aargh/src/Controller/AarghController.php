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
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class AarghController extends ControllerBase {

    private $aarghGenerator;
    private $loggerFactoryService;

    public function __construct(AarghGenerator $aarghGenerator, LoggerChannelFactoryInterface $loggerFactoryService) {
        $this->aarghGenerator = $aarghGenerator;
        $this->loggerFactoryService = $loggerFactoryService;
    }

    public function aargh($num) {
        $keyValueStore = $this->keyValue('aargh');
        //$aargh = $this->aarghGenerator->getAargh($num);
        //$keyValueStore->set('aargh_string', $aargh);
        $aargh = $keyValueStore->get('aargh_string');
        $this->loggerFactoryService->get('default')
            ->debug($aargh);
        return new Response($aargh);
    }

    public static function create(ContainerInterface $container) {
        $aarghGenerator = $container->get('aargh.aargh_generator');
        $loggerFactoryService = $container->get('logger.factory');
        return new static($aarghGenerator, $loggerFactoryService);
    }
}
