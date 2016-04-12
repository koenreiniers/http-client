<?php
namespace Kr\HttpClient\Events;

use Psr\Http\Message\ResponseInterface;
use Symfony\Component\EventDispatcher\Event;

class ResponseEvent extends Event
{
    /** @var ResponseInterface */
    protected $response;

    /**
     * ResponseEvent constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }


}