<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Subugoe\ResolverBundle\Model\Header;
use Subugoe\ResolverBundle\Model\LocalPersistentIdentifier;
use Subugoe\ResolverBundle\Model\ResolvedLocalPersistentIdentifier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class ResolverController extends Controller
{
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

        $resolverResponse = $this->getResolverResponse($id, $isValid, $request);

        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');
        $response->setContent($this->get('jms_serializer')->serialize($resolverResponse, 'xml'));

        return $response;
    }

    private function getResolverResponse(string $id, bool $isValid, Request $request): \Subugoe\ResolverBundle\Model\Response
    {
        $response = new \Subugoe\ResolverBundle\Model\Response();
        $response->setHeader(new Header());

        $resolvedLpi = new ResolvedLocalPersistentIdentifier();
        if ($isValid) {
            $localPersistentIdentifier = new LocalPersistentIdentifier();
            $localPersistentIdentifier
                ->setRequestedLocalPersistentIdentifier($request->getUri())
                ->setService($this->getParameter('service'))
                ->setServicehome($this->getParameter('servicehome'))
                ->setUrl($this->get('router')->generate('_detail', ['id' => $id], RouterInterface::ABSOLUTE_URL));

            $resolvedLpi->setLocalPersistentIdentifier([$localPersistentIdentifier]);
        }
        $response->setResolvedLocalPersistentIdentifier($resolvedLpi);

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
