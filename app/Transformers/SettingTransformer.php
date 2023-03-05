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

use App\Setting;
use League\Fractal;

/**
 * Class SettingTransformer
 */
class SettingTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'SettingCategory',
    ];

    /**
     * @param  Setting  $setting
     * @return array
     */
    public function transform(Setting $setting)
    {
        $output = array_only($setting->toArray(), ['id', 'name', 'setting_category_id', 'value', 'label', 'description']);

        return $output;
    }

    /**
     * @param  Setting  $setting
     * @return Fractal\Resource\Item
     */
    public function includeSettingCategory(Setting $setting)
    {
        if ($setting->setting_category) {
            return $this->item($setting->setting_category, new SettingCategoryTransformer());
        } else {
            return null;
        }
    }
}
