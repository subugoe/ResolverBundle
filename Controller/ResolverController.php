<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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

    public function setResolverService(ResolverService $resolverService)
    {
        $this->resolverService = $resolverService;
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

        if (0 === strpos($id, 'GDZ')) {
            $id = explode('GDZ', $request->get('PID'))[1];
        }

        $id = explode('/', $id)[0];

        if (!$request->get('PID') || !$this->isValidId($id)) {
            $isValid = false;
        } else {
            $isValid = true;
        }

        $response = new Response();

        $resolverResponse = $this->resolverService->getResolverResponse($id, $isValid, $request->getUri());

        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
        $response->setContent($this->get('jms_serializer')->serialize($resolverResponse, 'xml'));

        return $response;
    }

    /**
     * @param string $id
     *
     * @return bool
     */
    private function isValidId($id): bool
    {
        try {
            $this->get('subugoe_find.search_service')->getDocumentById($id);
        } catch (\InvalidArgumentException $invalidArgumentException) {
            return false;
        }

        return true;
    }
}
