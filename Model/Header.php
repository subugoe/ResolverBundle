<?php

namespace Subugoe\ResolverBundle\Model;

/**
 * Header section for resolver.
 */
class Header
{
    /**
     * @var string
     */
    private $version = '0.1';

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return Header
     */
    public function setVersion(string $version): Header
    {
        $this->version = $version;

        return $this;
    }
}
