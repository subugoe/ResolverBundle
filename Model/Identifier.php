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
     * @Serializer\XmlAttribute()
     */
    private $scheme;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * @param string $scheme
     *
     * @return Identifier
     */
    public function setScheme(string $scheme): self
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * @param string $identifier
     *
     * @return Identifier
     */
    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }
}
