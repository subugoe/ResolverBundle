<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Response section for resolver response.
 */
#[Serializer\XmlRoot('response')]
class Response
{
    #[Serializer\XmlElement(cdata: false)]
    private Header $header;

    #[Serializer\SerializedName('resolvedLPIs')]
    private ResolvedLocalPersistentIdentifier $resolvedLocalPersistentIdentifier;

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
        ResolvedLocalPersistentIdentifier $resolvedLocalPersistentIdentifier,
    ): self {
        $this->resolvedLocalPersistentIdentifier = $resolvedLocalPersistentIdentifier;

        return $this;
    }
}
