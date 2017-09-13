<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * LPI.
 */
class ResolvedLocalPersistentIdentifier
{
    /**
     * @var array<LocalPersistentIdentifier>
     * @Serializer\SerializedName("LPI")
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
