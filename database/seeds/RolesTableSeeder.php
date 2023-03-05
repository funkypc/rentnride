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

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'user',
        ]);
    }
}
