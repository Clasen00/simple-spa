<?php

namespace App\Controller;

use App\Service\IssuesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\SerializerInterface;

final class IssuesController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var IssuesService */
    private $issuesService;

    /**
     * IssuesController constructor.
     * @param SerializerInterface $serializer
     * @param IssuesService $issuesService
     */
    public function __construct(SerializerInterface $serializer, IssuesService $issuesService)
    {
        $this->serializer = $serializer;
        $this->issuesService = $issuesService;
    }

    /**
     * @Rest\Post("/api/issues/create", name="createIssue")
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {   //тут ломается на ошибке 500
        $message = $request->request->get('message');
        $issuesEntity = $this->issuesService->createIssue($message, $message, $message, $message, $message);
        $data = $this->serializer->serialize($issuesEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    protected function getJson() {

    }

    /**
     * @Rest\Get("/api/issues", name="getAllIssues")
     * @return JsonResponse
     */
    public function getAllActions(): JsonResponse
    {
        $issuesEntities = $this->issuesService->getAll();
        $data = $this->serializer->serialize($issuesEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}