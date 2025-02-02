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
 
namespace Plugins\VehicleExtraAccessories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Plugins\VehicleExtraAccessories\Model\VehicleTypeExtraAccessory;
use Illuminate\Support\Facades\Auth;
use Validator;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;
use Plugins\VehicleExtraAccessories\Transformers\VehicleTypeExtraAccessoryTransformer;

/**
 * VehicleExtraAccessories resource representation.
 * @Resource("VehicleExtraAccessories")
 */
class VehicleTypeExtraAccessoriesController extends Controller
{
    /**
     * VehicleExtraAccessoriesController constructor.
     */
    public function __construct()
    {
        // check whether the user is logged in or not.
        $this->middleware('auth:api');
    }

    /**
     * Show all extra_accessories
     * Get a JSON representation of all the extra_accessories.
     *
     * @Get("/extra_accessories?sort={sort}&sortby={sortby}&page={page}&q={q}")
     * @Parameters({
     *      @Parameter("sort", type="string", required=false, description="Sort the extra_accessories list by sort ley.", default=null),
     *      @Parameter("sortby", type="string", required=false, description="Sort extra_accessories by Ascending / Descending Order.", default=null),
     *      @Parameter("q", type="string", required=false, description="Search VehicleExtraAccessories.", default=null),
     *      @Parameter("page", type="integer", required=false, description="The page of results to view.", default=1)
     * })
     */
    public function index(Request $request)
    {
        $enabled_includes = array('vehicle_extra_accessory', 'discount_type', 'duration_type', 'vehicle_type');
        $vehicle_type_extra_accessories = VehicleTypeExtraAccessory::with($enabled_includes)->filterByRequest($request)->paginate(config('constants.ConstPageLimit'));
        return $this->response->paginator($vehicle_type_extra_accessories, (new VehicleTypeExtraAccessoryTransformer)->setDefaultIncludes($enabled_includes));
    }
}
