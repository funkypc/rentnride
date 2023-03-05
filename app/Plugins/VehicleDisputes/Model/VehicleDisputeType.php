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

namespace Plugins\VehicleDisputes\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class VehicleDisputeType extends Model
{
    /**
     * @var string
     */
    protected $table = 'dispute_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_booker', 'is_active',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicle_dispute()
    {
        return $this->hasMany(\Plugins\VehicleDisputes\Model\VehicleDispute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicle_dispute_closed_type()
    {
        return $this->hasMany(\Plugins\VehicleDisputes\Model\VehicleDisputeClosedType::class);
    }

    /**
     * @param $query
     * @param  Request  $request
     * @return mixed
     */
    public function scopeFilterByRequest($query, Request $request)
    {
        $query->orderBy($request->input('sort', 'id'), $request->input('sortby', 'desc'));
        if ($request->input('filter') === 'active') {
            $query->where('is_active', '=', 1);
        } elseif ($request->input('filter') === 'inactive') {
            $query->where('is_active', '=', 0);
        }
        if ($request->has('q')) {
            $query->where('name', 'like', '%'.$request->q.'%');
        }

        return $query;
    }

    /**
     * @return array
     */
    public function scopeGetValidationRule()
    {
        return [
            'name' => 'required|min:5',
            'is_booker' => 'required|boolean',
            'is_active' => 'required|boolean',
        ];
    }

    /**
     * @return array
     */
    public function scopeGetValidationMessage()
    {
        return [
            'name.required' => 'Required',
            'name.min' => 'Name must be min 5 characters!',
            'is_booker.required' => 'Required',
            'is_booker.boolean' => 'Accepted input for Is Booker are 1, 0 !',
            'is_active.required' => 'Required',
            'is_active.boolean' => 'Accepted input for Is Activer are 1, 0 !',
        ];
    }
}
