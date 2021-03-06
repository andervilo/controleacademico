<?php

namespace App\Http\Requests\API;

use App\Models\Turmas;
use InfyOm\Generator\Request\APIRequest;

class UpdateTurmasAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Turmas::$rules;
    }
}
