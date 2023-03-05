<?php
/**
 * Plugin
 *
 * PHP version 5
 *
 * @category   PHP
 *
 * @author     Agriya <info@agriya.com>
 * @copyright  2018 Agriya Infoway Private Ltd
 * @license    http://www.agriya.com/ Agriya Infoway Licence
 *
 * @link       http://www.agriya.com
 */

namespace Plugins\VehicleFeedbacks\Providers;

use App\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class VehicleFeedbackServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/../routes.php';
        $this->app->make('Plugins\VehicleFeedbacks\Controllers\Admin\AdminVehicleFeedbacksController');
        $this->app->make('Plugins\VehicleFeedbacks\Controllers\VehicleFeedbacksController');
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $morphRelations = [];
        $morphRelations['MorphUser'] = User::class;
        if (isPluginEnabled('Vehicles')) {
            $morphRelations['MorphVehicle'] = \Plugins\Vehicles\Model\Vehicle::class;
        }
        if (! empty($morphRelations)) {
            Relation::morphMap($morphRelations);
        }
    }
}
