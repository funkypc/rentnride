<?php
/**
 * APP
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

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DurationType extends Model
{
    /**
     * @var string
     */
    protected $table = 'duration_types';

    public function scopeFilterByRequest($query, Request $request)
    {
        $query->orderBy($request->input('sort', 'id'), $request->input('sortby', 'desc'));

        return $query;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle_type_surcharge()
    {
        return $this->hasMany(\Plugins\VehicleSurcharges\Model\VehicleTypeSurcharge::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle_type()
    {
        return $this->hasMany(\Plugins\Vehicles\Model\VehicleType::class);
    }
}
