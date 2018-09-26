<?php

namespace App\Http\Controllers;

use App\Assessment;
use App\Student;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{

     public function showStudent($id)
    {

        $student=Assessment::where('student_id',$id)->orderBy('subject_id')->get();
        
            $name_temp=Student::where('id',$id)->get();          
            
    $studentAvg=$student->avg('assess');      
       
        return view('MainView.addAssessment',['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
    }
    
    public function editAssessment(Request $request, $id){        
                try{
            if(is_integer($request->Add_mark+1)){
                $assessment_add= new Assessment;
                $assessment_add->student_id=$request->student_id;
                $assessment_add->subject_id=$id;
                $assessment_add->assess=$request->Add_mark;
                $assessment_add->save();
             
                
                //Обновим существующие(creatorUpdate)
                    foreach($request->Update as $key=>$value){
                        $assessment=Assessment::find($key);
                        $assessment->assess=$value;
                        //dump($assessment);
                        $assessment->save();
                    }   
                    $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
           $name_temp=Student::where('id',$request->student_id)->get();
           $studentAvg=$student->avg('assess');    
                    return view('MainView.addAssessment',['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);         
            }
        }
        catch(\Exception $ex){  
             foreach($request->Update as $key=>$value){
                        $assessment=Assessment::find($key);
                        $assessment->assess=$value;
                        //dump($assessment);
                        $assessment->save();

                    }         
                    $student=Assessment::where('student_id',$request->student_id)->orderBy('subject_id')->get();
                    $name_temp=Student::where('id',$request->student_id)->get();
                    $studentAvg=$student->avg('assess');
                   return view('MainView.addAssessment',['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);
        }
    }
    public function deleteAssessment($id){
        $assessment=Assessment::find($id);
       $temp=$assessment->student_id;
        $assessment->delete();

            $student=Assessment::where('student_id',$temp)->orderBy('subject_id')->get();
            $name_temp=Student::where('id',$temp)->get();
            $studentAvg=$student->avg('assess');
            return redirect('assessments/student'.$temp)->with(['student'=>$student,'name_temp'=>$name_temp,'studentAvg'=>$studentAvg]);

    }
}
