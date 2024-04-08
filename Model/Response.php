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
     *
     * @Serializer\XmlElement(cdata=false)
     */
    private $header;

    /**
     * @var ResolvedLocalPersistentIdentifier
     *
     * @Serializer\SerializedName("resolvedLPIs")
     */
    private $resolvedLocalPersistentIdentifier;

    public function getHeader(): Header
    {
        return $this->header;
    }

    public function getResolvedLocalPersistentIdentifier(): ResolvedLocalPersistentIdentifier
    {
        return $this->resolvedLocalPersistentIdentifier;
    }

    public function setHeader(Header $header): self
    {
        $this->header = $header;

        return $this;
    }

    public function setResolvedLocalPersistentIdentifier(
        ResolvedLocalPersistentIdentifier $resolvedLocalPersistentIdentifier
    ): self {
        $this->resolvedLocalPersistentIdentifier = $resolvedLocalPersistentIdentifier;

        return $this;
    }
}
