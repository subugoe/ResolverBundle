<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Header section for resolver.
 */
class Header
{
    #[Serializer\XmlElement(cdata: false)]
    private string $version = '0.1';

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
