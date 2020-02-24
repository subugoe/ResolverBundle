<?php
declare(strict_types=1);

namespace Subugoe\ResolverBundle\Service;

use JMS\Serializer\SerializerInterface;
use Subugoe\ResolverBundle\Model\Header;
use Subugoe\ResolverBundle\Model\LocalPersistentIdentifier;
use Subugoe\ResolverBundle\Model\ResolvedLocalPersistentIdentifier;
use Symfony\Component\Routing\RouterInterface;

class ResolverService implements ResolverServiceInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

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

    public function __construct(SerializerInterface $serializer, RouterInterface $router)
    {
        $this->serializer = $serializer;
        $this->router = $router;
    }

    public function setParameters(string $service, string $serviceHome): void
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
                ->setUrl(urldecode($this->router->generate('_detail', ['id' => $id], RouterInterface::ABSOLUTE_URL)));

            $resolvedLpi->setLocalPersistentIdentifier([$localPersistentIdentifier]);
        }
        $response->setResolvedLocalPersistentIdentifier($resolvedLpi);

        return $response;
    }
}
