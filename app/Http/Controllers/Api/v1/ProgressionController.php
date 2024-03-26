<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\ProgressionRequest;
use App\Http\Requests\UpdateProgressionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\BaseController as BaseController;
use App\Models\Progression;
use Validator;
use App\Http\Resources\ProgressResource;
use Illuminate\Http\JsonResponse;


class ProgressionController extends BaseController
{

    public function index(): JsonResponse
    {
        $progression = Progression::all();

        return $this->sendResponse(ProgressResource::collection($progression), 'progression retrieved successfully.');
    }

    public function store(ProgressionRequest $request): JsonResponse
    {
        try {
            $validatedData = $request->validated();
            $progression = Progression::create($validatedData);
            return $this->sendResponse(new ProgressResource($progression), 'Progression created successfully.');
        } catch (\Exception $e) {
            return $this->sendError('Failed to create progression.', [$e->getMessage()]);
        }
    }


    public function show(Progression $progression): JsonResponse
    {
        try {
            return $this->sendResponse(new ProgressResource($progression), 'Progression retrieved successfully.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Progression not found.'], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    public function update(UpdateProgressionRequest $request, Progression $progression): JsonResponse
    {
        try {
            if ($progression->status != 'terminer') {
                $validatedData = $request->validated();
                $progression->update($validatedData);
                return $this->sendResponse(new ProgressResource($progression), 'Progression updated successfully.');
            } else {
                return $this->sendError('Progression status is "terminer", cannot update.');
            }
        } catch (\Exception $e) {
            return $this->sendError('Failed to update progression.', [$e->getMessage()]);
        }
    }

    public function toggleStatus(Progression $progression): JsonResponse
    {
        try {
            $progression->status = "terminer";
            $progression->save();

            return $this->sendResponse(new ProgressResource($progression), 'Progression status toggled successfully.');
        } catch (\Exception $e) {
            return $this->sendError('Failed to toggle progression status.', [$e->getMessage()]);
        }
    }


    public function destroy(Progression $progression): JsonResponse
    {
        $progression->delete();

        return $this->sendResponse([], 'Progression deleted successfully.');
    }
}
