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

use Illuminate\Database\Seeder;
use Plugins\Vehicles\Model\FuelType;

class FuelTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelType::create([
            'id' => 1,
            'name' => 'Petrol',
        ]);
        FuelType::create([
            'id' => 2,
            'name' => 'Diesel',
        ]);
        FuelType::create([
            'id' => 3,
            'name' => 'CNG',
        ]);
        FuelType::create([
            'id' => 4,
            'name' => 'LPG',
        ]);
        FuelType::create([
            'id' => 5,
            'name' => 'Electric',
        ]);
    }
}
