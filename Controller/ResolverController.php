<?php

declare(strict_types=1);

namespace Subugoe\ResolverBundle\Controller;

use AppBundle\Exception\ResolverException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;

class ResolverController extends Controller
{
    /**
     * @Route("/resolve", name="_resolve", methods={"GET","POST"})
     */
    public function indexAction(Request $request): Response
    {
        if (strpos($request->get('PID'), '|')) {
            $id = explode('|', $request->get('PID'))[0];
        } else {
            $id = $request->get('PID');
        }

        if (!$request->get('PID') || !$this->isValidId($id)) {
            throw new ResolverException('Page not found');
        }

        $response = new Response();

        $route = $this->get('router')->generate('_detail', ['id' => $id], RouterInterface::ABSOLUTE_URL);
        $response->headers->set('Content-Type', 'application/xml; charset=utf-8');

        return $this->render(
            'resolve/resolve.xml.twig', [
                'route' => $route,
            ],
            $response
        );
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
