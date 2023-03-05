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
use Plugins\VehicleDisputes\Model\VehicleDisputeStatus;

class DisputeStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VehicleDisputeStatus::create([
            'id' => 1,
            'name' => 'Open',
        ]);
        VehicleDisputeStatus::create([
            'id' => 2,
            'name' => 'Under Discussion',
        ]);
        VehicleDisputeStatus::create([
            'id' => 3,
            'name' => 'Waiting Administrator Decision',
        ]);
        VehicleDisputeStatus::create([
            'id' => 4,
            'name' => 'Closed',
        ]);
    }
}
