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
     * @Serializer\SerializedName("LPI")
     * @Serializer\XmlList(inline = true, entry = "LPI"))
     */
    private $localPersistentIdentifier;

    /**
     * @return array
     */
    public function getLocalPersistentIdentifier(): array
    {
        return $this->localPersistentIdentifier;
    }

    /**
     * @param array $localPersistentIdentifier
     *
     * @return ResolvedLocalPersistentIdentifier
     */
    public function setLocalPersistentIdentifier(array $localPersistentIdentifier): ResolvedLocalPersistentIdentifier
    {
        $this->localPersistentIdentifier = $localPersistentIdentifier;

        return $this;
    }
}
