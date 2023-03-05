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

namespace Plugins\VehicleRentals\Services;

use Plugins\VehicleRentals\Model\VehicleRentalBookerDetail;
use Validator;

class VehicleRentalBookerDetailService
{
    /**
     * VehicleRentalService constructor.
     */
    public function __construct()
    {
    }

    public function addRentalBookerDetail($request)
    {
        $vehicle_rental_booker_data = $request->only('email', 'first_name', 'last_name', 'mobile', 'address');
        if ($request->has('id')) {
            $vehicle_rental_booker_data['item_user_id'] = $request->id;
        } else {
            return ['Error' => 'invalid request', 'type' => 'invalid'];
        }
        $validator = Validator::make($vehicle_rental_booker_data, VehicleRentalBookerDetail::GetValidationRule(), VehicleRentalBookerDetail::GetValidationMessage());
        if ($validator->passes()) {
            $booker_detail = VehicleRentalBookerDetail::where('item_user_id', '=', $request->id)->first();
            try {
                if (! empty($booker_detail)) {
                    $booker_detail->update($vehicle_rental_booker_data);
                } else {
                    VehicleRentalBookerDetail::create($vehicle_rental_booker_data);
                }

                return ['Success' => 'Booker details has been added successfully'];
            } catch (\Exception $e) {
                return ['Error' => [$e->getMessage()], 'type' => 'catch'];
            }
        } else {
            return ['Error' => $validator, 'type' => 'validate'];
        }
    }
}
