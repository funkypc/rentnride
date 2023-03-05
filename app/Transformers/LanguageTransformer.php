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

use App\Language;
use League\Fractal;

/**
 * Class LanguageTransformer
 */
class LanguageTransformer extends Fractal\TransformerAbstract
{
    /**
     * @param  Language  $language
     * @return array
     */
    public function transform(Language $language)
    {
        $output = array_only($language->toArray(), ['id', 'name', 'iso2', 'iso3', 'is_active']);
        $output['is_active'] = ($output['is_active'] == 1) ? true : false;

        return $output;
    }
}
