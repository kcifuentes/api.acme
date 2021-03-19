<?php

namespace Acme\Infrastructure\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RoutesController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $routeCollection = Route::getRoutes();
        $routes = [];
        foreach ($routeCollection as $item) {
            if ($item->getName() !== null && !Str::contains($item->getName(), ['log-viewer', 'ignition', 'initial'])) {
                array_push($routes, [
                    'name' => $item->getName(),
                    'uri'  => $item->uri,
                ]);
            }
        }

        return response()->json($routes);
    }
}
