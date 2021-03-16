<?php

namespace Acme\Infrastructure\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator): void
    {
        $error = [
            "message" => trans('validation.message_error'),
            "errors"  => [],
        ];
        $errors = $validator->getMessageBag();

        foreach ($errors->getMessages() as $key => $value) {
            $err = [
                "type" => $key,
                "text" => $value[0],
            ];

            array_push($error['errors'], $err);
        }

        throw new HttpResponseException(response()->json($error, 422,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE));
    }
}
