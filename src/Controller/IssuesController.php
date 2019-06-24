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
        $this->postService = $issuesService;
    }

    /**
     * @Rest\Post("/api/post/create", name="createPost")
     * @param Request $request
     * @return JsonResponse
     */
    public function createAction(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        $postEntity = $this->postService->createPost($message);
        $data = $this->serializer->serialize($postEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/issues", name="getAllPosts")
     * @return JsonResponse
     */
    public function getAllActions(): JsonResponse
    {
        $issuesEntities = $this->issuesService->getAll();
        $data = $this->serializer->serialize($issuesEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }
}