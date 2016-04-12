<?php
namespace Kr\HttpClient;

final class ClientEvents
{
    /**
     * Dispatched just before the request is sent
     *
     * Listeners receive a Kr\HttpClient\Events\RequestEvent
     *
     * @Event
     */
    const REQUEST = "client.on_request";

    /**
     * Dispatched immediately after a response has been returned
     *
     * Listeners receive a Kr\HttpClient\Events\ResponseEvent
     *
     * @Event
     */
    const RESPONSE = "client.on_response";
}