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

use App\DurationType;
use Illuminate\Database\Seeder;

class DurationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DurationType::create([
            'id' => 1,
            'name' => 'Per day',
        ]);
        DurationType::create([
            'id' => 2,
            'name' => 'Per rental',
        ]);
    }
}
