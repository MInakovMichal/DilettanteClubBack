<?php

namespace Modules\Room\Http\Api\Controllers;

use Modules\Common\Http\Api\Controllers\BaseController;
use Modules\Room\Http\Api\Services\RoomService;
use Modules\Room\Http\Requests\CreateRoomRequest;
use Modules\Room\Transformers\RoomResource;

class RoomController extends BaseController
{
    /**
     * @var RoomService
     */
    private $service;

    public function __construct(RoomService $roomService)
    {
        $this->service = $roomService;
    }

    /**
     * @throws \Throwable
     */
    public function createRoom(CreateRoomRequest $request): \Illuminate\Http\JsonResponse
    {
        $room = $this->service->createRoom($request->dto());

        $success['question'] = (new RoomResource($room))->toArray($request);

        return $this->sendResponse('Room was added', $success);
    }
}
