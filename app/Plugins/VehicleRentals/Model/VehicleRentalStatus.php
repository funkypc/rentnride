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

namespace Plugins\VehicleRentals\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VehicleRentalStatus extends Model
{
    /**
     * @var string
     */
    protected $table = 'item_user_statuses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicle_rental()
    {
        return $this->hasMany(VehicleRental::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message()
    {
        return $this->hasMany(\App\Message::class);
    }

    /**
     * @param    $query
     * @param  Request  $request
     * @return mixed
     */
    public function scopeFilterByRequest($query, Request $request)
    {
        $query->orderBy($request->input('sort', 'display_order'), $request->input('sortby', 'ASC'));

        return $query;
    }
}
