<?php

namespace App\Http\Controllers;
Use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Http\Request;
use App\Group;
class StudentsController extends Controller
{
    public function show()
    {
        $list_stud = Student::all();
       // dump($list_stud);
              $group=Group::all();
        return view('MainView.student',['list_stud'=>$list_stud,'group'=>$group]);
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
     public function update(Request $request, $id)
    {
       
        $student=Student::find($id);
        //dd($request);
        try {
            $bool=false;
            if (!empty($request->first_name)) {
                $student->first_name = $request->first_name;$bool=true;
            }
            if (!empty($request->middle_name)) {
                $student->middle_name = $request->middle_name;$bool=true;
            }
            if (!empty($request->last_name)) {
                $student->last_name = $request->last_name;$bool=true;
            }
            if (!empty($request->date_of_birth)) {
                $student->date_of_birthday = $request->date_of_birth;
                $bool=true;
            }
            if (!empty($request->group_id)) {
                $student->group_id = $request->group_id;
                $bool=true;
            }

            if(!$bool){
                throw new \Exception('Subject not been Updated: the text is null');
            }
            $student->save();
            $string='Student № '.($id).' '.($student->first_name).' '.($student->middle_name).' has been Updated at now';


            return redirect('student/show')->with('string',$string);
        }
        catch(\Exception $ex){



            return redirect('student/show')->with('string', $ex->getMessage());

        }

    }
}
