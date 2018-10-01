<?php

namespace App\Http\Controllers;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
     public function show()
    {
         $list_subject=Subject::all();
         return view('MainView.subject', ['list_subject'=>$list_subject]);       
    }
    public function create(SubjectRequest $request)
    {
        Subject::create($request->all());

        $string='Subject '.($request->subject_name).' was added in the list';

        return redirect('subject/show')->with('string',$string);
    }
     public function delete($id)
    {
        $subject=Subject::find($id);

        $string='Subject '.($subject->subject_name).PHP_EOL.'has been deleted';
      
        $subject->delete();
       
        return redirect('subject/show')->with('string',$string);
    }
     public function update(Request $request, $id)
    {
       
        $subject=Subject::find($id);
       try {
            
            $subject->update($request->all());
           $string = 'Subject № ' . ($id) . ' was been Updated at now';


           return redirect('subject/show')->with('string', $string);
       }
       catch (\Exception $ex){

           return redirect('subject/show')->with('string', $ex->getMessage());
       }
       


    }
}
