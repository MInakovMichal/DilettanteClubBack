<?php

namespace Modules\Punishment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Punishment\Dtos\PunishmentDto;

class CreatePunishmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'punishment' => ['required', 'string'],
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

        return new PunishmentDto(
            $this->input('punishment'),
            $user->id
            );
    }
}
