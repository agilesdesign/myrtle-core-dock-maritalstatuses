<?php

use Illuminate\Database\Seeder;
use Myrtle\Core\MaritalStatuses\Models\MaritalStatus;

class MaritalStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		 collect(static::statuses())->each(function($item, $key) {
			MaritalStatus::updateOrCreate(['name' => $item]);
		});
    }

    public static function statuses()
    {
        return ['Single', 'Married', 'Divorced'];
    }
}
