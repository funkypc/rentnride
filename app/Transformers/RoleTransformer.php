<?php
/**
 * Rent & Ride
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

namespace App\Transformers;

use App\Role;
use League\Fractal;

class RoleTransformer extends Fractal\TransformerAbstract
{
    public function transform(Role $role)
    {
        $output = array_only($role->toArray(), ['id', 'created_at', 'name']);

        return $output;
    }
}
