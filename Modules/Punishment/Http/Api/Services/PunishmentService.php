<?php

namespace Modules\Punishment\Http\Api\Services;

use Illuminate\Support\Facades\DB;
use Modules\Punishment\Dtos\PunishmentDto;
use Modules\Punishment\Entities\Punishment;
use Throwable;

class PunishmentService
{
    /**
     * @param PunishmentDto $dto
     * @return Punishment
     * @throws Throwable
     */
    public function addPunishment(PunishmentDto $dto): Punishment
    {
        $punishment = new Punishment();

        DB::beginTransaction();

        try {

            $punishment->punishment = $dto->getPunishment();
            $punishment->user_id = $dto->getUserId();

            $punishment->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $punishment;
    }
}
