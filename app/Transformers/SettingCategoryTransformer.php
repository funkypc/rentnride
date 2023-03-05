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

namespace app\Transformers;

use App\SettingCategory;
use League\Fractal;

/**
 * Class SettingCategoryTransformer
 */
class SettingCategoryTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param  SettingCategory  $setting_category
     * @return array
     */
    public function transform(SettingCategory $setting_category)
    {
        $output = array_only($setting_category->toArray(), ['id', 'name', 'description', 'display_order']);

        return $output;
    }
}
