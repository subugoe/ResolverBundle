<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Service;

use Subugoe\ResolverBundle\Model\Response;

interface ResolverServiceInterface
{
    public function getResolverResponse(string $id, bool $isValid, string $uri): Response;

    public function setParameters(string $service, string $serviceHome): void;
}
