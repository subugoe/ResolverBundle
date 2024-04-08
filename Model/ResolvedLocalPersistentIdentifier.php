<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * LPI.
 *
 * @Serializer\XmlDiscriminator()
 */
class ResolvedLocalPersistentIdentifier
{
    /**
     * @var array<LocalPersistentIdentifier>
     *
     * @Serializer\SerializedName("LPI")
     *
     * @Serializer\XmlList(inline = true, entry = "LPI"))
     */
    private $localPersistentIdentifier;

    public function getLocalPersistentIdentifier(): array
    {
        return $this->localPersistentIdentifier;
    }

    public function setLocalPersistentIdentifier(array $localPersistentIdentifier): self
    {
        $this->localPersistentIdentifier = $localPersistentIdentifier;

        return $this;
    }
}
