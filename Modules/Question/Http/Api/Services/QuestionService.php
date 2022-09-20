<?php

namespace Modules\Question\Http\Api\Services;

use Illuminate\Support\Facades\DB;
use Modules\Question\Dtos\QuestionDto;
use Modules\Question\Entities\Question;
use Throwable;

class QuestionService
{
    /**
     * @param $data
     * @return Question
     * @throws Throwable
     */
    public function addQuestion(QuestionDto $dto): Question
    {
        $question = new Question();

        DB::beginTransaction();

        try {

            $question->question = $dto->getQuestion();
            $question->answer = $dto->getAnswer();
            $question->unit = $dto->getUnit();
            $question->user_id = $dto->getUserId();

            $question->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $question;
    }
}
