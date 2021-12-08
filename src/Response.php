<?php
namespace Bijou;

class Response
    extends \Symfony\Component\HttpFoundation\Response
{
    public function __construct($responseText)
    {
        parent::__construct($responseText);
        $this->setContent($responseText);
        $this->headers->set('Content-Type', 'text/html');
        //$this->setStatusCode(Response::HTTP_NOT_FOUND);
    }
}

