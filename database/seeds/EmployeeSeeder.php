<?php

use Illuminate\Database\Seeder;
use App\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//both Way are working fine
    	$count = 100;
        factory(Employee::class, $count)->create();
    	// for($i=1;$i<=10;$i++){
     //    Employee::create([
     //        'name' => 'Hardik',
     //        'city' => 'admin@gmail.com',
     //        'phone' => bcrypt('1234567896'),
     //    ]);
    	// }
//php artisan db:seed --class=EmployeeSeeder
    }
}
