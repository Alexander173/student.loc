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
        factory(App\Assessment::class,'assessment',2)->create()->each(function ($assessment){
            $assessment->student()->save(factory(App\Student::class,'assessment')->make());
            $assessment->subject()->save(factory(App\Subject::class,'assessment')->make());
        });

    }
}
