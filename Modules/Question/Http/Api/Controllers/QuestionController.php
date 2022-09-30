<?php

namespace Modules\Question\Http\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Common\Http\Api\Controllers\BaseController;
use Modules\Question\Http\Api\Services\QuestionService;
use Modules\Question\Http\Requests\CreateQuestionRequest;
use Modules\Question\Transformers\QuestionResource;
use Throwable;

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

    /**
     * @return JsonResponse
     */
    public function getAllQuestions(): JsonResponse
    {
        $success = auth()->user()->question;

        return $this->sendResponse('All questions', $success);
    }

    /**
     * @param CreateQuestionRequest $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function addQuestion(CreateQuestionRequest $request): JsonResponse
    {
        $question = $this->service->addQuestion($request->dto());

        $success['question'] = (new QuestionResource($question))->toArray($request);

        return $this->sendResponse('Question was added', $success);
    }
}
