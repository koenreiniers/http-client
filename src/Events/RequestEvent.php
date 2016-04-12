<?php
namespace Kr\HttpClient\Events;

use Psr\Http\Message\RequestInterface;
use Symfony\Component\EventDispatcher\Event;

class RequestEvent extends Event
{
    /** @var RequestInterface */
    protected $request;

    /**
     * RequestEvent constructor.
     * @param RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param RequestInterface $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

}