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

namespace Plugins\VehicleDisputes\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Plugins\VehicleDisputes\Model\VehicleDisputeType;
use Plugins\VehicleDisputes\Transformers\VehicleDisputeTypeTransformer;

/**
 * Class VehicleDisputeTypesController
 */
class VehicleDisputeTypesController extends Controller
{
    /**
     * VehicleDisputeTypesController constructor.
     */
    public function __construct()
    {
        // check whether the user is logged in or not.
        $this->middleware('auth:api');
    }

    /**
     * Show all VehicleDisputeTypes
     * Get a JSON representation of all the VehicleDisputeTypes.
     *
     * @Get("/vehicle_dispute_types?sort={sort}&sortby={sortby}&page={page}&q={q}")
     * @Parameters({
     *      @Parameter("sort", type="string", required=false, description="Sort the disputes list by sort key.", default=null),
     *      @Parameter("sortby", type="string", required=false, description="Sort disputes by Ascending / Descending Order.", default=null)
     * })
     */
    public function index(Request $request)
    {
        $vehicle_dispute_types = VehicleDisputeType::filterByRequest($request)->paginate(config('constants.ConstPageLimit'));

        return $this->response->paginator($vehicle_dispute_types, (new VehicleDisputeTypeTransformer));
    }
}
