<?php

namespace Modules\Punishment\Dtos;

class PunishmentDto
{

    /**
     * @var
     */
    private $punishment;

    /**
     * @var
     */
    private $user_id;

    /**
     * @param $punishment
     * @param $user_id
     */
    public function __construct($punishment, $user_id)
    {
        $this->punishment = $punishment;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getPunishment()
    {
        return $this->punishment;
    }

    /**
     * @param mixed $punishment
     */
    public function setPunishment($punishment): void
    {
        $this->punishment = $punishment;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }
}
