<?php

namespace Subugoe\ResolverBundle\Model;

/**
 * Identifier used for the resolver.
 */
class LocalPersistentIdentifier
{
    /**
     * @var string
     */
    private $requestedLocalPersistentIdentifier;

    /**
     * @var string
     */
    private $service;

    /**
     * @var string
     */
    private $servicehome;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $mine;

    /**
     * @var string
     */
    private $version = '1.0';

    /**
     * @var string
     */
    private $access = 'free';

    /**
     * @var array
     */
    private $identifier;

    /**
     * @return string
     */
    public function getRequestedLocalPersistentIdentifier(): string
    {
        return $this->requestedLocalPersistentIdentifier;
    }

    /**
     * @param string $requestedLocalPersistentIdentifier
     *
     * @return LocalPersistentIdentifier
     */
    public function setRequestedLocalPersistentIdentifier(string $requestedLocalPersistentIdentifier
    ): LocalPersistentIdentifier {
        $this->requestedLocalPersistentIdentifier = $requestedLocalPersistentIdentifier;

        return $this;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     *
     * @return LocalPersistentIdentifier
     */
    public function setService(string $service): LocalPersistentIdentifier
    {
        $this->service = $service;

        return $this;
    }

    /**
     * @return string
     */
    public function getServicehome(): string
    {
        return $this->servicehome;
    }

    /**
     * @param string $servicehome
     *
     * @return LocalPersistentIdentifier
     */
    public function setServicehome(string $servicehome): LocalPersistentIdentifier
    {
        $this->servicehome = $servicehome;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return LocalPersistentIdentifier
     */
    public function setUrl(string $url): LocalPersistentIdentifier
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getMine(): string
    {
        return $this->mine;
    }

    /**
     * @param string $mine
     *
     * @return LocalPersistentIdentifier
     */
    public function setMine(string $mine): LocalPersistentIdentifier
    {
        $this->mine = $mine;

        return $this;
    }

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
     * @return LocalPersistentIdentifier
     */
    public function setVersion(string $version): LocalPersistentIdentifier
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccess(): string
    {
        return $this->access;
    }

    /**
     * @param string $access
     *
     * @return LocalPersistentIdentifier
     */
    public function setAccess(string $access): LocalPersistentIdentifier
    {
        $this->access = $access;

        return $this;
    }

    /**
     * @return array
     */
    public function getIdentifier(): array
    {
        return $this->identifier;
    }

    /**
     * @param array $identifier
     *
     * @return LocalPersistentIdentifier
     */
    public function setIdentifier(array $identifier): LocalPersistentIdentifier
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @param Identifier $identifier
     */
    public function addIdentifier(Identifier $identifier)
    {
        $this->identifier[] = $identifier;
    }
}
