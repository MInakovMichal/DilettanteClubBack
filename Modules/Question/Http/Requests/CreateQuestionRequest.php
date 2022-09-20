<?php

namespace Modules\Question\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Question\Dtos\QuestionDto;

class CreateQuestionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'question' => ['required', 'string'],
            'answer' => ['required', 'numeric'],
            'unit' => ['required', 'string', 'max:50'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function dto()
    {
        $user = auth()->user();

        return new QuestionDto(
            $this->input('question'),
            $this->input('answer'),
            $this->input('unit'),
            $user->id
            );
    }
}
