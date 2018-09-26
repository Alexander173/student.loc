<?php

namespace App\Http\Controllers;
use App\Assessment;
use Illuminate\Http\Request;
use App\Group;
use PHPUnit\Exception;

class GroupController extends Controller
{
     public function show()
    {
        $list_group=Group::all();

        return view('MainView.group', ['list_group'=>$list_group]);
    }
    public function create(Request $request)
    {
        $group=new Group;
        $group->group_name=$request->group_name;
        $group->description=$request->description;

        $group->save();

        $string='Group '.($group->group_name).' was added in the list';

        return redirect('groups')->with('string',$string);
    }
     public function delete($id)
    {
        $group=Group::find($id);

        $string='Group '.($group->group_name).PHP_EOL.'has been deleted';
      
        $group->delete();
       
        return redirect('groups')->with('string',$string);
    }
     public function update(Request $request, $id)
    {
       $group=Group::find($id);
        try {
            if ((!empty($request->group_name)) && (!empty($request->description))) {
                $group->group_name = $request->group_name;
                $group->description = $request->description;

                $group->save();
            } elseif (!empty($request->group_name)) {
                $group->group_name = $request->group_name;

                $group->save();
            } else{
                $group->description = $request->description;

                $group->save();
            }

            $string='Group '.($group->group_name).' was been Updated at now';

            return redirect('groups')->with('string',$string);
        }catch(\Exception $ex){

            return redirect('groups')->with('string',$ex->getMessage());
        }
    }

    public function showGroup($id)
    {


            $list_group=Group::with(['assessment'=>function($qs)
            {
                $qs->orderBy('subject_id');
            }])->where('id',$id)->get();

        $arr=array();
        $studentAvg=array();
        foreach($list_group as $list) {

           $arr['Средний по группе']=($avg_all=$list->assessment->avg('assess'));

        foreach($list->assessment as $last) {
           //dd( $last->subject_id);
            $arr[$last->subject->subject_name] = $list->assessment->
            where('subject_id', $last->subject_id)->avg('assess');
           $studentAvg[$last->student_id] = $list->assessment->
            where('student_id',$last->student_id)->avg('assess');
        }



        }
        //dd($studentAvg);
        //dd($arr);
            return view('MainView.showGroup', ['list_group'=>$list_group,'arr'=>$arr,'studentAvg'=>$studentAvg]);


    }
}
