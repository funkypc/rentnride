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
 
namespace Plugins\VehicleFuelOptions\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plugins\VehicleFuelOptions\Model\VehicleTypeFuelOption;
use Illuminate\Support\Facades\Auth;
use Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Plugins\VehicleFuelOptions\Transformers\VehicleTypeFuelOptionTransformer;

/**
 * VehicleFuelOptions resource representation.
 * @Resource("VehicleFuelOptions")
 */
class VehicleTypeFuelOptionsController extends Controller
{
    /**
     * VehicleFuelOptionsController constructor.
     */
    public function __construct()
    {
        // check whether the user is logged in or not.
        $this->middleware('auth:api');
    }

    /**
     * Show all fuel_options
     * Get a JSON representation of all the fuel_options.
     *
     * @Get("/vehicle_fuel_options?sort={sort}&sortby={sortby}&page={page}&q={q}")
     * @Parameters({
     *      @Parameter("sort", type="string", required=false, description="Sort the fuel_options list by sort ley.", default=null),
     *      @Parameter("sortby", type="string", required=false, description="Sort fuel_options by Ascending / Descending Order.", default=null),
     *      @Parameter("q", type="string", required=false, description="Search VehicleFuelOptions.", default=null),
     *      @Parameter("page", type="integer", required=false, description="The page of results to view.", default=1)
     * })
     */
    public function index(Request $request)
    {
        $enabled_includes = array('vehicle_fuel_option', 'discount_type', 'duration_type', 'vehicle_type');
        $vehicle_type_fuel_options = VehicleTypeFuelOption::with($enabled_includes)->filterByRequest($request)->paginate(config('constants.ConstPageLimit'));
        return $this->response->paginator($vehicle_type_fuel_options, (new VehicleTypeFuelOptionTransformer)->setDefaultIncludes($enabled_includes));
    }
}
