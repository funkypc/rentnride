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

namespace Plugins\VehicleTaxes\Transformers;

use League\Fractal;
use Plugins\VehicleTaxes\Model\VehicleTax;

/**
 * Class VehicleTaxTransformer
 */
class VehicleTaxTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param  VehicleTax  $vehicle_tax
     * @return array
     */
    public function transform(VehicleTax $vehicle_tax)
    {
        $output = array_only($vehicle_tax->toArray(), ['id', 'name']);

        return $output;
    }
}
