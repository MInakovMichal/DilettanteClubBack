<?php

namespace Modules\Question\Dtos;

class QuestionDto
{

    /**
     * @var
     */
    private $question;

    /**
     * @var
     */
    private $answer;

    /**
     * @var
     */
    private $unit;

    /**
     * @var
     */
    private $user_id;

    /**
     * @param $question
     * @param $answer
     * @param $unit
     * @param $user_id
     */
    public function __construct($question, $answer, $unit, $user_id)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->unit = $unit;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question): void
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer): void
    {
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit): void
    {
        $this->unit = $unit;
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
