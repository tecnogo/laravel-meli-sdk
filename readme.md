<p align="center">
<img src="https://avatars1.githubusercontent.com/u/49149236"/>
</p>

## MeliSdk: El API de Mercadolibre, facil.  

[![License](https://poser.pugx.org/tecnogo/laravel-meli-sdk/license)](https://packagist.org/packages/phpunit/phpunit)

Integración de [MeliSdk](https://github.com/tecnogo/meli-sdk) para Laravel.

### Requerimientos

 * PHP 7.2
 * ext-curl
 * ext-json
 * Laravel 5.8

### Instalación

> `composer require tecnogo/laravel-meli-sdk`

Opcional, publicar la configuración:

> `php artisan vendor:publish --provider=Tecnogo\LaravelMeliSdk\ServiceProvider`

### Configuración

Si bien ninguna opción es obligatoria, el acceso a ciertas APIs puede requerir ciertos parametros (app_id, app_secret
y/o access_token).

Para generar una aplicación de Mercadolibre ingresa a: [Crear nueva aplicación](https://developers.mercadolibre.com.ar/apps/create-app)

La configuración puede realizarse en el archivo `.env` o en el archivo de configuración de este paquete (`config/laravel_meli_sdk.php`)

| Opción | Descripción |
| --- | --- |
| MELI_SITE_ID | Id de sitio de Mercadolibre, por defecto MLA |
| MELI_APP_ID | App id de la aplicación de Mercadolibre |
| MELI_APP_SECRET | App secret de la aplicación de Mercadolibre |
| MELI_REDIRECT_URL | Url de redirección de autorización de usuario, debe coincidir con la url definida en la aplicación de Mercadolibre. Por defecto es la ruta `/meli_auth` |

### Uso

```php

// Obtener categorias (acceso publico)

$categories = \MeliSdk::categories();

$categories->each(function (\Tecnogo\MeliSdk\Entity\Category\Category $category) {
    echo $category->name() . "\n";
    echo json_encode($item->attributes());
});

// Obtener bookmarks (requiere access token)

$bookmarks = \MeliSdk::withToken($mercadolibreAccessToken)->bookmarks();

$bookmarkPrices = $bookmarks
    ->map(function (Tecnogo\MeliSdk\Entity\LoggedUser\Bookmark $bookmark) {
        return $bookmark->item()->price();
    })
    ->toArray();
```