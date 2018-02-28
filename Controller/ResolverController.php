<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Solarium\Core\Client\ClientInterface;
use Subugoe\ResolverBundle\Service\ResolverService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolverController extends Controller
{
    /**
     * @var ResolverService
     */
    private $resolverService;

    /**
     * @var ClientInterface
     */
    private $client;

    public function setResolverService(ResolverService $resolverService)
    {
        $this->resolverService = $resolverService;
    }

    public function setSolariumClient(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @Route("/resolve", name="_resolve", methods={"GET","POST"})
     */
    public function indexAction(Request $request)
    {
        if (strpos($request->get('PID'), '|')) {
            $id = explode('|', $request->get('PID'))[0];
        } else {
            $id = $request->get('PID');
        }

        $id = explode('/', $id)[0];

        $resolvedId = $this->getResolvedId($id);

        if (!$request->get('PID') || 0 === strlen($resolvedId)) {
            $isValid = false;
        } else {
            $isValid = true;
        }

        $response = new Response();

        $resolverResponse = $this->resolverService->getResolverResponse($resolvedId, $isValid, $request->getUri());

        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
        $response->setContent($this->get('jms_serializer')->serialize($resolverResponse, 'xml'));

        return $response;
    }

    private function getResolvedId(string $id): string
    {
        $query = $this->client->createSelect();
        $query->setQuery(sprintf('identifier:%s', $id));
        $resultset = $this->client->select($query)->getDocuments()[0]['work_id'] ?? '';

        return $resultset;
    }
}
