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

use App\Transformers\UserSimpleTransformer;
use League\Fractal;
use Plugins\Vehicles\Model\VehicleCompany;

/**
 * Class VehicleCompanyTransformer
 */
class VehicleCompanyTransformer extends Fractal\TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = [
        'User',
    ];

    /**
     * @param  VehicleCompany  $vehicle_company
     * @return array
     */
    public function transform(VehicleCompany $vehicle_company)
    {
        $output = array_only($vehicle_company->toArray(), ['id', 'user_id', 'name', 'address', 'latitude', 'longitude', 'phone', 'mobile', 'fax', 'email', 'vehicle_count', 'is_active']);

        return $output;
    }

    /**
     * @param  VehicleCompany  $vehicle_company
     * @return Fractal\Resource\Item|null
     */
    public function includeUser(VehicleCompany $vehicle_company)
    {
        if ($vehicle_company->user) {
            return $this->item($vehicle_company->user, new UserSimpleTransformer());
        } else {
            return null;
        }
    }
}
