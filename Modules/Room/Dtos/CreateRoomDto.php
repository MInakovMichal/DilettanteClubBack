<?php

namespace Modules\Room\Dtos;

class CreateRoomDto
{

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $user_id;

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

    /**
     * @param $name
     * @param $password
     */
    public function __construct($name, $password, $user_id)
    {
        $this->name = $name;
        $this->password = $password;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
}
