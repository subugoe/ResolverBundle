<?php

namespace Subugoe\ResolverBundle\Model;

/**
 * Identifier section for LPI node.
 */
class Identifier
{
    /**
     * @var string
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
    public function setScheme(string $scheme): Identifier
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
    public function setIdentifier(string $identifier): Identifier
    {
        $this->identifier = $identifier;

        return $this;
    }
}
