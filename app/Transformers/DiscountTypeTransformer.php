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

use App\DiscountType;
use League\Fractal;

class DiscountTypeTransformer extends Fractal\TransformerAbstract
{
    public function transform(DiscountType $discount_type)
    {
        $output = array_only($discount_type->toArray(), ['id', 'type']);

        return $output;
    }
}
