<?php

namespace Subugoe\ResolverBundle\Model;

/**
 *<?xml version="1.0" encoding="UTF-8"?>.
 */
class Resolver
{
    /**
     * @var Resolver
     */
    private $response;

    public function getResponse(): self
    {
        return $this->response;
    }

    public function setResponse(self $response): self
    {
        $this->response = $response;

        return $this;
    }
}
