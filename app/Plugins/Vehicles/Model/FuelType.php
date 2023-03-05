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

namespace Plugins\Vehicles\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FuelType
 */
class FuelType extends Model
{
    /**
     * @var string
     */
    protected $table = 'fuel_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
