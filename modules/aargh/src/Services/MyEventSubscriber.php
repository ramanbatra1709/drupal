<?php
/**
 * Created by PhpStorm.
 * User: raman
 * Date: 21-10-2018
 * Time: 20:09
 */

namespace Drupal\aargh\Services;

use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MyEventSubscriber implements EventSubscriberInterface {

    private $loggerChannelFactory;

    public function __construct(LoggerChannelFactoryInterface $loggerChannelFactory)   {
        $this->loggerChannelFactory = $loggerChannelFactory;
    }

    public function onKernelRequest(GetResponseEvent $event)   {
        // Symfony's request object
        // can be used to access request parameters or session variables
        $request = $event->getRequest();
        if ($request->query->get('aargh')) {
            $this->loggerChannelFactory->get('default')
                ->debug('Aargh!');
        }
    }

    public static function getSubscribedEvents()    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest'
        ];
    }

}