<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Services\LeadService;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class LeadController extends Controller
{
    public function __construct(private readonly LeadService $leadService) {}

    /**
     * Accepting an application from the landing page.
     */
    public function store(StoreLeadRequest $request): JsonResponse
    {
        // Getting an array of data that has been validated in StoreLeadRequest
        $validatedData = $request->safe()->except(['mid_name']);

        try {
            // Sending the data to the service for processing
            $lead = $this->leadService->createLead($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Спасибо! Заявка успешно принята. Мы свяжемся с вами в течение 15 минут.',
                'data' => $lead
            ], 201);

        } catch (Exception $e) {
            // Catching a deduplication error (or any other) and return a clear response to the client.
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }
}
