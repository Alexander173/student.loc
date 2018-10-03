<?php

namespace App\Http\Controllers;
Use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use App\Group;
use App\Subject;
class StudentsController extends Controller
{
    public function show()
    {
        $list_stud = Student::all();
        $group=Group::all();
        $subject= Subject::all();

        foreach($list_stud as $stud){
            foreach($stud->assessment->groupBy('student_id') as $assessment){
            $student_avg[$stud->id]=$assessment->avg('assess');
                foreach($assessment->groupBy('subject_id') as $avg_cur_assess)
                {
    $subject_avg[$stud->id][$avg_cur_assess->first()->subject->subject_name]=$avg_cur_assess->avg('assess');
                }
            }
        }
        return view('MainView.student',['list_stud'=>$list_stud,'group'=>$group,'student_avg'=>$student_avg,'subject'=>$subject,'subject_avg'=>$subject_avg]);
    }
    public function create(StudentRequest $request)
    {
        Student::create($request->all());
        $string='Student '.($request->first_name).' was added in the list';
        return redirect('student/show')->with('string',$string);
    }
    public function delete($id)
    {
        $student=Student::find($id);

        $string='Student '.($student->first_name).' '.($student->middle_name).' '.($student->last_name).
                                                                                          PHP_EOL.
                                                                                 'has been deleted';
        $student->delete();

        return redirect('student/show')->with('string',$string);
    }
     public function update(StudentRequest $request, $id)
    {
        $student=Student::find($id);
        $student->update($request->all());
        $string='Student № '.($id).' '.($student->first_name).' '.($student->middle_name).' has been Updated at now';
        return redirect('student/show')->with('string',$string);
    }
}
