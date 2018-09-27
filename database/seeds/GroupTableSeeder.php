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
        
        // factory(App\Assessment::class,'assessment',4)->create()->each(function($assessment){
        //         $assessment->subject()->save(factory(App\Subject::class,'assessment')->make());
        //         // $assessment->student()->save(factory(App\Student::class,'assessment')->make()->each(function($student){
        //         // $student->group()->save(factory(App\Group::class,'assessment')->make());
        //         // }));
        //         $assessment->student()->save(factory(App\Subject::class,'assessment')->make());

        // });
        factory(App\Subject::class,'assessment',3)->create();
        factory(App\Group::class,'assessment',3)->create();
        factory(App\Student::class,'assessment',7)->create();       
        factory(App\Assessment::class,'assessment',20)->create();
    }
}