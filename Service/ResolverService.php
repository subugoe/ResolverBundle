<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Service;

use JMS\Serializer\SerializerInterface;
use Subugoe\ResolverBundle\Model\Header;
use Subugoe\ResolverBundle\Model\LocalPersistentIdentifier;
use Subugoe\ResolverBundle\Model\ResolvedLocalPersistentIdentifier;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class ResolverService implements ResolverServiceInterface
{
    private string $service;

    private string $serviceHome;

    public function __construct(private readonly SerializerInterface $serializer, private readonly RouterInterface $router)
    {
    }

    public function getResolverResponse(string $id, bool $isValid, string $uri): \Subugoe\ResolverBundle\Model\Response
    {
        $response = new \Subugoe\ResolverBundle\Model\Response();
        $response->setHeader(new Header());

        $identifier = substr($uri, strpos($uri, '=') + 1);

        $resolvedLpi = new ResolvedLocalPersistentIdentifier();
        if ($isValid) {
            $localPersistentIdentifier = new LocalPersistentIdentifier();
            $localPersistentIdentifier
                ->setRequestedLocalPersistentIdentifier($identifier)
                ->setService($this->service)
                ->setServicehome($this->serviceHome)
                ->setUrl(urldecode($this->router->generate('_detail', ['id' => $id], UrlGeneratorInterface::ABSOLUTE_URL)));

            $resolvedLpi->setLocalPersistentIdentifier([$localPersistentIdentifier]);
        }
        $response->setResolvedLocalPersistentIdentifier($resolvedLpi);

        return $response;
    }

    public function setParameters(string $service, string $serviceHome): void
    {
        $this->service = $service;
        $this->serviceHome = $serviceHome;
    }
}
