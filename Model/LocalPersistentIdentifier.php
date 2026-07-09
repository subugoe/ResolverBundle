<?php

namespace Subugoe\ResolverBundle\Model;

use JMS\Serializer\Annotation as Serializer;

/**
 * Identifier used for the resolver.
 */
class LocalPersistentIdentifier
{
    #[Serializer\XmlElement(cdata: false)]
    private string $access = 'free';

    private array $identifier;

    #[Serializer\XmlElement(cdata: false)]
    private string $mine;

    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SerializedName('requestedLPI')]
    private string $requestedLocalPersistentIdentifier;

    #[Serializer\XmlElement(cdata: false)]
    private string $service;

    #[Serializer\XmlElement(cdata: false)]
    private string $servicehome;

    #[Serializer\XmlElement(cdata: false)]
    #[Serializer\SerializedName('URL')]
    private $url;

    #[Serializer\XmlElement(cdata: false)]
    private string $version = '1.0';

    public function addIdentifier(Identifier $identifier): void
    {
        $this->identifier[] = $identifier;
    }

    public function getAccess(): string
    {
        return $this->access;
    }

    public function getIdentifier(): array
    {
        return $this->identifier;
    }

    public function getMine(): string
    {
        return $this->mine;
    }

    public function getRequestedLocalPersistentIdentifier(): string
    {
        return $this->requestedLocalPersistentIdentifier;
    }

    public function getService(): string
    {
        return $this->service;
    }

    public function getServicehome(): string
    {
        return $this->servicehome;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setAccess(string $access): self
    {
        $this->access = $access;

        return $this;
    }

    public function setIdentifier(array $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function setMine(string $mine): self
    {
        $this->mine = $mine;

        return $this;
    }

    public function setRequestedLocalPersistentIdentifier(string $requestedLocalPersistentIdentifier,
    ): self {
        $this->requestedLocalPersistentIdentifier = $requestedLocalPersistentIdentifier;

        return $this;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function setServicehome(string $servicehome): self
    {
        $this->servicehome = $servicehome;

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
