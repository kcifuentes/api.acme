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
            if (!Str::contains($item->getName(), ['log-viewer', 'ignition', 'initial'])) {
                if (isset($item->getAction()['domain']) && ($item->getAction()['domain'] === env('APP_URL'))) {
                    array_push($routes, [
                        'name' => $item->getName(),
                        'uri'  => $item->uri,
                    ]);
                }
            }
        }

        return response()->json($routes);
    }
}
