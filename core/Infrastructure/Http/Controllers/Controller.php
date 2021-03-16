<?php

namespace Acme\Infrastructure\Http\Controllers;

use Acme\Domain\BaseEntity;
use Acme\Infrastructure\Bus\Contracts\CommandBus;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(protected CommandBus $commandBus)
    {
    }

    protected function responseData(array|BaseEntity $data): JsonResponse
    {
        $statusCode = Response::HTTP_OK;
        if (is_array($data)) {
            $statusCode = isset($data['status_code']) ? $data['status_code'] : Response::HTTP_OK;
            unset($data['status_code']);
        }
        return $this->jsonResponse($data, (int)$statusCode);
    }

    protected function jsonResponse(array|BaseEntity $data, $code = 200): JsonResponse
    {
        return response()->json($this->serialization($data), $code, [
            'Content-Type' => app()->getLocale() == 'es' ? 'application/json;charset=UTF-8' : 'application/json',
            'Charset'      => 'utf-8',
        ], JSON_UNESCAPED_UNICODE);
    }

    protected function serialization(array|BaseEntity $data): array
    {
        $newData = [];
        if (is_array($data)) {
            $isObject = false;

            if (array_key_exists('data', $data)) {
                $arrayResponse = [];
                list($arrayResponse, $isObject) = $this->transformObjectToArray($data['data'], $arrayResponse, $isObject);
                $newData['data'] = $arrayResponse;
            } else {
                list($newData, $isObject) = $this->transformObjectToArray($data, $newData, $isObject);
            }

            if (!$isObject) {
                $newData = $data;
            }
        } elseif (is_object($data)) {
            $newData = $data->toArray();
        }

        return $newData;
    }

    protected function transformObjectToArray(BaseEntity|array $data, array $arrayResponse, bool $isObject): array
    {
        /** @var BaseEntity $datum */
        foreach ($data as $datum) {
            if (is_object($datum)) {
                array_push($arrayResponse, $datum->toArray());
                $isObject = true;
            }
        }

        return array($arrayResponse, $isObject);
    }
}
