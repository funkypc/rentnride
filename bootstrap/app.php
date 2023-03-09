<?php
/**
 * Rent & Ride
 *
 * PHP version 5
 *
 * @category   PHP
 * @package    RENT&RIDE
 * @subpackage Core
 * @author     Agriya <info@agriya.com>
 * @copyright  2018 Agriya Infoway Private Ltd
 * @license    http://www.agriya.com/ Agriya Infoway Licence
 * @link       http://www.agriya.com
 */
 
require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
        dirname(__DIR__)
    ))->bootstrap();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Laravel\Lumen\Application(
    realpath(__DIR__ . '/../')
);

$app->withFacades();

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Now we will register the "app" configuration file. If the file exists in
| your configuration directory it will be loaded; otherwise, we'll load
| the default version. You may register other files below as needed.
|
*/

$app->configure('app');
$app->configure('view'); 
$app->configure('cache');
$app->configure('api');
$app->configure('jwt');
$app->configure('auth');
$app->configure('session');
$app->configure('constants');
$app->configure('filesystems');
$app->configure('mail');
$app->configure('services');
$app->configure('paypal');
class_alias(Intervention\Image\Facades\Image::class, 'Image');
class_alias(Illuminate\Support\Facades\File::class, 'File');
class_alias(Carbon\Carbon::class, 'Carbon');
class_alias(EasySlug\EasySlug\EasySlugFacade::class, 'EasySlug');
class_alias(Netshell\Paypal\Facades\Paypal::class, 'Paypal');

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/* todo: */
$app->singleton(
    Illuminate\Contracts\Routing\ResponseFactory::class,
    Illuminate\Routing\ResponseFactory::class
);

$app->singleton(
    Illuminate\Auth\AuthManager::class,
    function ($app) {
        return $app->make('auth');
    }
);

$app->singleton(
    Illuminate\Cache\CacheManager::class,
    function ($app) {
        return $app->make('cache');
    }
);
/* todo: */


/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

/*$app->middleware([
    App\Http\Middleware\Tracking::class
 ]);*/

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'apitracking' => App\Http\Middleware\Tracking::class,
    'role' => App\Http\Middleware\AuthenticateRole::class
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
$app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);
$app->register(Illuminate\Database\Eloquent\LegacyFactoryServiceProvider::class);

/* todo: */
// JWTAuth Dependencies
$app->register(Illuminate\Session\SessionServiceProvider::class);
$app->register(Illuminate\Cookie\CookieServiceProvider::class);
$app->register(\PHPOpenSourceSaver\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(\Dingo\Api\Provider\LumenServiceProvider::class);
$app->register(\App\Providers\SettingsServiceProvider::class);
$app->register(\App\Providers\MessageServiceProvider::class);
$app->register(\App\Providers\TransactionServiceProvider::class);
$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Illuminate\Filesystem\FilesystemServiceProvider::class);
$app->register(Intervention\Image\ImageServiceProvider::class);
$app->register(Plugins\PluginServiceProvider::class);
$app->register(Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
$app->register(EasySlug\EasySlug\EasySlugServiceProvider::class);
$app->register(Netshell\Paypal\PaypalServiceProvider::class);

/* todo: */

$app['Dingo\Api\Transformer\Factory']->setAdapter(function ($app) {
    $fractal = new League\Fractal\Manager;
    $fractal->setSerializer(new League\Fractal\Serializer\ArraySerializer);
    return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
});

function getFolderList($dir)
{
    $subFolders = array();
    $paths = scandir($dir);
    foreach ($paths as $path) {
        if ($path != '.' && $path != '..') {
            if (is_dir($dir . '/' . $path)) {
                $subFolders[] = $path;
            }
            
        }
    }
    return $subFolders;
}

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group(['namespace' => 'App\Http\Controllers'], function ($router) {
    require __DIR__ . '/../routes/web.php';
});

return $app;

