<?php
namespace Bijou;

class Response
    extends \Symfony\Component\HttpFoundation\Response
{
    public function __construct()
    {
        $this->setContent('Hello World');
        // the headers public attribute is a ResponseHeaderBag

        dd($this);

        $this->headers->set('Content-Type', 'text/plain');
        //$this->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}

