<?php

namespace csi0n\Laravel\Request\Request;

use CRule;
use Illuminate\Foundation\Http\FormRequest;

abstract class CLaravelRequest extends FormRequest
{
    abstract public function setCRule();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->setCRule();
        return CRule::getCurrentRule();
    }
}
