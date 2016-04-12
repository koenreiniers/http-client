<?php
namespace Kr\HttpClient;

use GuzzleHttp\ClientInterface;
use Kr\HttpClient\Events\RequestEvent;
use Kr\HttpClient\Events\ResponseEvent;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class HttpClient
 * @package Kr\HttpClient
 */
class HttpClient
{
    /**
     * The actual client that will send the request
     *
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * The event dispatcher
     *
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * HttpClient constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient, EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->httpClient = $httpClient;
    }

    /**
     * Sends a psr-7 request, while dispatching request + response events
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function send(RequestInterface $request)
    {
        /** @var RequestEvent $event */
        $event = new RequestEvent($request);
        $event = $this->eventDispatcher->dispatch(ClientEvents::REQUEST, $event);

        $request = $event->getRequest();

        $response = $this->httpClient->send($request);

        /** @var ResponseEvent $event */
        $event = new ResponseEvent($response);
        $event = $this->eventDispatcher->dispatch(ClientEvents::RESPONSE, $event);

        return $event->getResponse();
    }
}