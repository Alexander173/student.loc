<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class,'assessment',3)->create();
        factory(App\Group::class,'assessment',3)->create();
        factory(App\Student::class,'assessment',14)->create();
        factory(App\Assessment::class,'assessment',40)->create();
    }
}
