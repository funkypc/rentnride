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
use Plugins\Withdrawals\Model\WithdrawalStatus;

class WithdrawalStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WithdrawalStatus::create([
            'id' => 1,
            'name' => 'Pending',
        ]);
        WithdrawalStatus::create([
            'id' => 2,
            'name' => 'Rejected',
        ]);
        WithdrawalStatus::create([
            'id' => 3,
            'name' => 'Success',
        ]);
    }
}
