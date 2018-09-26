<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
     public function show()
    {
         $list_subject=Subject::all();

        return view('MainView.subject', ['list_subject'=>$list_subject]);       
    }
    public function create(Request $request)
    {
        $subject=new Subject;

        $subject->subject_name=$request->subject_name;
        $subject->save();

        $string='Subject '.($subject->subject_name).' was added in the list';

        return redirect('subjects')->with('string',$string);
    }
     public function delete($id)
    {
        $subject=Subject::find($id);

        $string='Subject '.($subject->subject_name).PHP_EOL.'has been deleted';
      
        $subject->delete();
       
        return redirect('subjects')->with('string',$string);
    }
     public function update(Request $request, $id)
    {
       
        $subject=Subject::find($id);
       try {
           if (!empty($request->subject_name)) {
               $subject->subject_name = $request->subject_name;
           }
           else{
               throw new \Exception('Subject not been Updated: the text is null');
           }
           $subject->save();
           $string = 'Subject № ' . ($id) . ' was been Updated at now';


           return redirect('subjects')->with('string', $string);
       }
       catch (\Exception $ex){

           return redirect('subjects')->with('string', $ex->getMessage());
       }
       


    }
}
