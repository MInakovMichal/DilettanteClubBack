<?php

namespace Modules\Question\Http\Api\Controllers;

use Modules\Common\Http\Api\Controllers\BaseController;
use Modules\Question\Http\Api\Services\QuestionService;
use Modules\Question\Http\Requests\CreateQuestionRequest;
use Modules\Question\Transformers\QuestionResource;

class QuestionController extends BaseController
{

    /**
     * @var QuestionService
     */
    private $service;

    public function __construct(QuestionService $questionService)
    {
        $this->service = $questionService;
    }

    public function getAllQuestions(): \Illuminate\Http\JsonResponse
    {
        $success = auth()->user()->question;
        return $this->sendResponse('All questions', $success);

    }

    public function addQuestion(CreateQuestionRequest $request)
    {
        $question = $this->service->addQuestion($request->dto());

        $success['question'] = (new QuestionResource($question))->toArray($request);

        return $this->sendResponse('Question was added', $success);
    }
}
