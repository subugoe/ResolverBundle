<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Identifier section for LPI node.
 */
class Identifier
{
    /**
     * @var string
     */
    private $identifier;
    /**
     * @var string
     *
     * @Serializer\XmlAttribute()
     */
    private $scheme;

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }
}
