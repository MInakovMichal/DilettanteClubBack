<?php

namespace Modules\Room\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Room\Dtos\CreateRoomDto;

class CreateRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'password' => []
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

        return new CreateRoomDto(
            $this->input('name'),
            $this->input('password'),
            $user->id
        );
    }

}
