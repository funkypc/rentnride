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

use App\Ip;
use Illuminate\Database\Seeder;

class IpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ip::create([
            'ip' => '127.0.0.1',
            'city_id' => 33,
            'state_id' => 8,
            'country_id' => 102,
            'host' => 'localhost',
        ]);

        Ip::create([
            'ip' => '::1',
            'city_id' => 33,
            'state_id' => 8,
            'country_id' => 102,
            'host' => 'localhost',
        ]);
    }
}
