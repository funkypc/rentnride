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

use App\DurationType;
use League\Fractal;

class DurationTypeTransformer extends Fractal\TransformerAbstract
{
    public function transform(DurationType $duration_type)
    {
        $output = array_only($duration_type->toArray(), ['id', 'name']);

        return $output;
    }
}
