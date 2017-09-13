<?php

namespace Subugoe\ResolverBundle\Model;

/**
 * Response section for resolver response.
 */
class Response
{
    /**
     * @var Header
     */
    private $header;

    /**
     * @var ResolvedLocalPersistentIdentifier
     */
    private $resolvedLocalPersistentIdentifier;

    /**
     * @return Header
     */
    public function getHeader(): Header
    {
        return $this->header;
    }

    /**
     * @param Header $header
     *
     * @return Response
     */
    public function setHeader(Header $header): Response
    {
        $this->header = $header;

        return $this;
    }

    /**
     * @return ResolvedLocalPersistentIdentifier
     */
    public function getResolvedLocalPersistentIdentifier(): ResolvedLocalPersistentIdentifier
    {
        return $this->resolvedLocalPersistentIdentifier;
    }

    /**
     * @param ResolvedLocalPersistentIdentifier $resolvedLocalPersistentIdentifier
     *
     * @return Response
     */
    public function setResolvedLocalPersistentIdentifier(
        ResolvedLocalPersistentIdentifier $resolvedLocalPersistentIdentifier
    ): Response {
        $this->resolvedLocalPersistentIdentifier = $resolvedLocalPersistentIdentifier;

        return $this;
    }
}
