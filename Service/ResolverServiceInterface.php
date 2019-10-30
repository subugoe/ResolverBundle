<?php
declare(strict_types=1);

namespace Subugoe\ResolverBundle\Service;

interface ResolverServiceInterface
{
    public function setParameters(string $service, string $serviceHome): void;

    public function getResolverResponse(string $id, bool $isValid, string $uri): \Subugoe\ResolverBundle\Model\Response;
}
