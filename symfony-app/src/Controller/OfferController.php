<?php

namespace App\Controller;

use App\Service\OfferService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    #[Route('/api/offer/create', name: 'offer_create', methods: ['POST'])]
    public function create(Request $request, OfferService $offerService): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        try {
            $response = $offerService->createOffer($data, $this->getUser());
            return new JsonResponse($response, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Offer creation failed! ' . $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

}