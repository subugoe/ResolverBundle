<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Header section for resolver.
 */
class Header
{
    /**
     * @var string
     * @Serializer\XmlElement(cdata=false)
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
