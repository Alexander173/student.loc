<?php

namespace App\Http\Controllers;
use App\Assessment;
use App\Http\Requests\GroupRequest;
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
    public function create(GroupRequest $request)
    {
        Group::create($request->all());

        $string='Group '.($request->group_name).' was added in the list';

        return redirect('group/show')->with('string',$string);
    }
     public function delete($id)
    {
        $group=Group::find($id);
        $string='Group '.($group->group_name).PHP_EOL.'has been deleted';      
        $group->delete();       
        return redirect('group/show')->with('string',$string);
    }
     public function update(Request $request, $id)
    {
       $group=Group::find($id);
        try 
        {
            $group->update($request->all());
            $string='Group '.($group->group_name).' was been Updated at now';

            return redirect('group/show')->with('string',$string);
            }
        catch(\Exception $ex)
            {
                      return redirect('group/show')->with('string',$ex->getMessage());
            }
    }

    public function showGroup($id)
    {
            $list_group=Group::with(['assessment'=>function($qs)
            {
                $qs->orderBy('subject_id');
            }])->where('id',$id)->get();
        $group_avg=array();
        $student_avg=array();
        foreach($list_group as $list) {
           $group_avg['Средний по группе']=($list->assessment->avg('assess'));
        foreach($list->assessment as $last) {
            $group_avg[$last->subject->subject_name] = $list->assessment->
            where('subject_id', $last->subject_id)->avg('assess');

           $student_avg[$last->student_id] = $list->assessment->
            where('student_id',$last->student_id)->avg('assess');
        }
        }
            return view('MainView.showGroup', ['list_group'=>$list_group,'arr'=>$group_avg,'studentAvg'=>$student_avg]);


    }
}
