<?php

namespace PHPHos\Laravel\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use PHPHos\Laravel\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response as Http;

class Request extends FormRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $message = reset($errors);

        Exception::fail(
            $message,
            Http::HTTP_UNPROCESSABLE_ENTITY,
            Http::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
