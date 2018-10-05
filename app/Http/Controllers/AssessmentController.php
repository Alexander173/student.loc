<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Student;
use App\Subject;
use App\Group;

use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function showStudent($id)
    {
        $student = Student::where('id', $id)->first();

        $assessments = Assessment::where('student_id', $id)->orderBy('subject_id')->get();

        $subjectIds = [];
        foreach ($assessment as $studentSubject) {
            $subjectIds[] = $studentSubject->subject_id;
        }

        $listSubject = Subject::whereNotIn('id', $subjectIds)->get();

        $studentAvg = $assessment->avg('assess');

        return view('main.assessment.add', [
            'assessment' => $assessment,
            'name_temp'  => $name_temp,
            'studentAvg' => $studentAvg,
            'listsubject'=> $list_subject
        ]);
    }

    public function add(Request $request, $id)
    {
        if ((int) $request->mark > 0)
        {
            $new = new Assessment;
            $new->student_id = $request->student_id;
            $new->subject_id = $id;
            $new->assess = $request->assess;
            $new->save();

            //Обновим существующие(creatorUpdate)
            if (isset($request->Update))
            {
                foreach ($request->Update as $key => $value) {
                    $assessment = Assessment::find($key);
                    $assessment->assess = $value;
                    $assessment->save();
                }
            }

            $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
            $name_temp=Student::where('id',$request->student_id)->get();
            $studentAvg=$student->avg('assess');

            return   redirect('students/'.($request->student_id))->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
        }
    }

    public function edit(Request $request, $id)
    {
/*        if(isset($request->Update)){
             foreach($request->Update as $key=>$value){
                        $assessment=Assessment::find($key);
                        $assessment->assess=$value;
                        $assessment->save();
                         }
                    }
                    $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
                    $name_temp=Student::where('id',$request->student_id)->get();
                    $studentAvg=$student->avg('assess');
            return redirect('students/'.($request->student_id))->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
        }*/
    }

    public function delete($id)
    {
        $assessment=Assessment::find($id);
        $temp=$assessment->student_id;
        $assessment->delete();
            $student=Assessment::where('student_id',$temp)->orderBy('subject_id')->get();
            $name_temp=Student::where('id',$temp)->get();
            $studentAvg=$student->avg('assess');
            return redirect('students/'.$temp)->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
    }
}
