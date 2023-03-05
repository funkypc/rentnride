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
 * Class AdminVehicleCompanyTransformer
 */
class AdminVehicleCompanyTransformer extends Fractal\TransformerAbstract
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
        $output = array_only($vehicle_company->toArray(), ['id', 'created_at', 'user_id', 'name', 'address', 'latitude', 'longitude', 'phone', 'mobile', 'fax', 'email', 'vehicle_count', 'is_active']);
        $output['user_id'] = (int) $output['user_id'];
        if ($output['is_active'] == 1) {
            $output['status'] = 'Active';
        } elseif ($output['is_active'] == 0) {
            $output['status'] = 'Deactive';
        } elseif ($output['is_active'] == 2) {
            $output['status'] = 'Rejected';
        }

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
