<?php

namespace Tecnogo\LaravelMeliSdk\Http;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tecnogo\LaravelMeliSdk\Events\AccessTokenReceived;

/**
 * Class MeliSdkController
 *
 * @package Tecnogo\LaravelMeliSdk\Http
 */
final class MeliSdkController extends Controller
{
    public function handleMercadolibreAuthResponse(Request $request)
    {
        if ($request->code) {
            event(new AccessTokenReceived(\MeliSdk::login($request->code)->getAccessToken()));
        } else {
            // Something went wrong
        }

        return \Redirect::to('/');
    }
}