<?php

namespace Modules\Punishment\Http\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Common\Http\Api\Controllers\BaseController;
use Modules\Punishment\Http\Api\Services\PunishmentService;
use Modules\Punishment\Http\Requests\CreatePunishmentRequest;
use Modules\Punishment\Transformers\PunishmentResource;
use Throwable;

class PunishmentController extends BaseController
{

    /**
     * @var PunishmentService
     */
    private $service;

    /**
     * @param PunishmentService $service
     */
    public function __construct(PunishmentService $service)
    {
        $this->service = $service;
    }

    public function getAllPunishments(): JsonResponse
    {
        $success = auth()->user()->punishment;

        return $this->sendResponse('All punishments', $success);
    }

    /**
     * @throws Throwable
     */
    public function addPunishment(CreatePunishmentRequest $request): JsonResponse
    {
        $punishment = $this->service->addPunishment($request->dto());

        $success['punishment'] = (new PunishmentResource($punishment))->toArray($request);

        return $this->sendResponse('Punishment was added', $success);
    }
}
