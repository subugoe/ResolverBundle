<?php

namespace Subugoe\ResolverBundle\Service;

use JMS\Serializer\SerializerInterface;
use Subugoe\FindBundle\Service\SearchService;
use Subugoe\ResolverBundle\Model\Header;
use Subugoe\ResolverBundle\Model\LocalPersistentIdentifier;
use Subugoe\ResolverBundle\Model\ResolvedLocalPersistentIdentifier;
use Symfony\Component\Routing\RouterInterface;

class ResolverService
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * @var string
     */
    private $service;

    /**
     * @var string
     */
    private $serviceHome;

    /**
     * @var RouterInterface
     */
    private $router;

    public function __construct(SerializerInterface $serializer, SearchService $searchService, RouterInterface $router)
    {
        $this->serializer = $serializer;
        $this->searchService = $searchService;
        $this->router = $router;
    }

    public function setParameters(string $service, string $serviceHome)
    {
        $this->service = $service;
        $this->serviceHome = $serviceHome;
    }

    public function getResolverResponse(string $id, bool $isValid, string $uri): \Subugoe\ResolverBundle\Model\Response
    {
        $response = new \Subugoe\ResolverBundle\Model\Response();
        $response->setHeader(new Header());

        $resolvedLpi = new ResolvedLocalPersistentIdentifier();
        if ($isValid) {
            $localPersistentIdentifier = new LocalPersistentIdentifier();
            $localPersistentIdentifier
                ->setRequestedLocalPersistentIdentifier($uri)
                ->setService($this->service)
                ->setServicehome($this->serviceHome)
                ->setUrl($this->router->generate('_detail', ['id' => $id], RouterInterface::ABSOLUTE_URL));

            $resolvedLpi->setLocalPersistentIdentifier([$localPersistentIdentifier]);
        }
        $response->setResolvedLocalPersistentIdentifier($resolvedLpi);

        return $response;
    }
}
