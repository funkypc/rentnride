<?php
/**
 * Plugin
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
 
namespace Plugins\Vehicles\Transformers;

use League\Fractal;
use Plugins\Vehicles\Model\VehicleTypePrice;

/**
 * Class AdminVehicleTypePriceTransformer
 * @package Plugins\Vehicles\Transformers
 */
class AdminVehicleTypePriceTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        'VehicleType'
    ];

    /**
     * @param VehicleTypePrice $vehicle_type_price
     * @return array
     */
    public function transform(VehicleTypePrice $vehicle_type_price)
    {
        $output = array_only($vehicle_type_price->toArray(), ['id', 'created_at', 'vehicle_type_id', 'minimum_no_of_day', 'maximum_no_of_day', 'discount_percentage', 'is_active']);
        $output['is_active'] = ($output['is_active'] == 1) ? true : false;
        return $output;
    }


    /**
     * @param VehicleTypePrice $vehicle_type_price
     * @return Fractal\Resource\Item|null
     */
    public function includeVehicleType(VehicleTypePrice $vehicle_type_price)
    {
        if ($vehicle_type_price->vehicle_type) {
            return $this->item($vehicle_type_price->vehicle_type, new AdminVehicleTypeTransformer());
        } else {
            return null;
        }

    }
}