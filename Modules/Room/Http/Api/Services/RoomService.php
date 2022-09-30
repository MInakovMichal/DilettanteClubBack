<?php

namespace Modules\Room\Http\Api\Services;

use Illuminate\Support\Facades\DB;
use Modules\Room\Dtos\CreateRoomDto;
use Modules\Room\Entities\Room;
use Throwable;

class RoomService
{
    /**
     * @param CreateRoomDto $dto
     * @return Room
     * @throws Throwable
     */
    public function createRoom(CreateRoomDto $dto): Room
    {
        $room = new Room();

        DB::beginTransaction();

        try {

            $room->name = $dto->getName();
            $room->password = $dto->getPassword();
            $room->author_user_id = $dto->getUserId();

            $room->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $room;
    }
}
