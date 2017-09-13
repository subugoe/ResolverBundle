<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Response section for resolver response.
 *
 * @Serializer\XmlRoot("response")
 */
class Response
{
    /**
     * @var Header
     * @Serializer\XmlElement(cdata=false)
     */
    private $header;

    /**
     * @var ResolvedLocalPersistentIdentifier
     * @Serializer\SerializedName("resolvedLPIs")
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
