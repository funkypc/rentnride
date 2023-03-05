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

namespace Plugins\Vehicles\Transformers;

use League\Fractal;
use Plugins\Vehicles\Model\VehicleModel;

/**
 * Class VehicleModelTransformer
 */
class VehicleModelTransformer extends Fractal\TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'VehicleMake',
    ];

    /**
     * @param  VehicleModel  $vehicle_model
     * @return array
     */
    public function transform(VehicleModel $vehicle_model)
    {
        $output = array_only($vehicle_model->toArray(), ['id', 'name']);

        return $output;
    }

    /**
     * @param  VehicleModel  $vehicle_model
     * @return Fractal\Resource\Item|null
     */
    public function includeVehicleMake(VehicleModel $vehicle_model)
    {
        if ($vehicle_model->vehicle_make) {
            return $this->item($vehicle_model->vehicle_make, new AdminVehicleMakeTransformer());
        } else {
            return null;
        }
    }
}
