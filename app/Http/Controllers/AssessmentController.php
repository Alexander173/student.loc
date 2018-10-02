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
        $assessment=Assessment::where('student_id',$id)->orderBy('subject_id')->get();

        //Получаем предметы у которых нет оценок
        $u=array();
        foreach($assessment as $student_subject){
                    $u[]=$student_subject->subject_id;
            }
            $list_subject=Subject::whereNotIn('id', $u)->get();
            //helper для возможности, к примеру, добавления оценок у студентов,
            //которые не имеют ни одной,т.к. assessment будет пустой, а id студента где-то хранить нужно для view
            $name_temp=Group::with(['student'=>function($qs) use($id){
                $qs->where('id',$id);
            }])->first();
             //
            $studentAvg=$assessment->avg('assess');
            return view('MainView.addAssessment',['assessment'=>$assessment,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg,'list_subject'=>$list_subject]);
    }
    public function editAssessment(Request $request, $id){
                try
                {
            if(is_integer($request->Add_mark+1)){

                $assessment_add= new Assessment;
                $assessment_add->student_id=$request->student_id;
                $assessment_add->subject_id=$id;
                $assessment_add->assess=$request->assess;
                $assessment_add->save();
                //Обновим существующие(creatorUpdate)
                if(isset($request->Update)){
                    foreach($request->Update as $key=>$value){
                        $assessment=Assessment::find($key);
                        $assessment->assess=$value;
                        $assessment->save();
                        }
                    }
                $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
                $name_temp=Student::where('id',$request->student_id)->get();
                $studentAvg=$student->avg('assess');
         return   redirect('assessment/student/'.($request->student_id))->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
            }
        }
        catch(\Exception $ex){
            if(isset($request->Update)){
             foreach($request->Update as $key=>$value){
                        $assessment=Assessment::find($key);
                        $assessment->assess=$value;
                        $assessment->save();
                         }
                    }
                    $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
                    $name_temp=Student::where('id',$request->student_id)->get();
                    $studentAvg=$student->avg('assess');
            return redirect('assessment/student/'.($request->student_id))->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
            }
        }
    public function deleteAssessment($id){
        $assessment=Assessment::find($id);
       $temp=$assessment->student_id;
        $assessment->delete();
            $student=Assessment::where('student_id',$temp)->orderBy('subject_id')->get();
            $name_temp=Student::where('id',$temp)->get();
            $studentAvg=$student->avg('assess');
            return redirect('assessment/student/'.$temp)->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
    }
}
