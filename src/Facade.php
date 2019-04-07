<?php

namespace Tecnogo\LaravelMeliSdk;

/**
 * Class Facade
 *
 * @package Tecnogo\LaravelMeliSdk
 *
 * @method make
 * @method \Tecnogo\MeliSdk\Api\Facade api()
 * @method mixed exec()
 * @method \Tecnogo\MeliSdk\Entity\LoggedUser\User loggedUser()
 * @method \Tecnogo\MeliSdk\Entity\User\User user()
 * @method \Tecnogo\MeliSdk\Entity\Category\Collection categories()
 * @method \Tecnogo\MeliSdk\Entity\Category\Category category()
 * @method \Tecnogo\MeliSdk\Entity\Currency\Collection currencies()
 * @method \Tecnogo\MeliSdk\Entity\LoggedUser\NotificationCollection notifications()
 * @method \Tecnogo\MeliSdk\Entity\Category\CategoryPrediction predictCategory()
 * @method \Tecnogo\MeliSdk\Entity\Item\Item item()
 * @method string getAuthUrl()
 * @method \Tecnogo\MeliSdk\Config\AccessToken getAccessToken()
 * @method login()
 */
final class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return MeliSdk::class;
    }
}
