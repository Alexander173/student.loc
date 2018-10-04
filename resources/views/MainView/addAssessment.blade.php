@extends('layouts.app')

@section('content')

<div class="text-center"><span>{{$name_temp->first_name.' '. $name_temp->middle_name.' '.$name_temp->last_name}}</span>
</div>
<div class="d-sm-flex " style="margin:15px">
    <div >
    @include('layouts.image_out')
    <div><p>Дата рождения: {{$name_temp->date_of_birthday}}</p>
    <p>Группа: {{$name_temp->group->group_name}}</p>
    </div>
    </div>

<div class="flex-fill">
    @include('layouts.add_assessment_table')
    </div>
    </div>
    <div>
    @include('layouts.add_assessment')
    </div>

     <div class="d-flex justify-content-between flex-wrap">
    @if(!$list_subject->isEmpty())
    @foreach($list_subject as $subject)
        <div class="col-md-4">
    <form method="post" action="{{route('editAssessment',$subject->id)}}">
        {{method_field('PUT')}}
     <div class="col-md-4">
                <input type="hidden" name="student_id" value="{{$name_temp->id}}">
        <div class="">
                    <select class="custom-select custom-select-sm" name="assess" type="number">
                        <option selected value="Add_mark" type="text">Add mark</option>
                        <option value="2" type="number">2</option>
                        <option value="3" type="number">3</option>
                        <option value="4" type="number">4</option>
                        <option value="5" type="number">5</option>
                    </select>
        </div>
                    <div class="pb-4">
                    <label for="labelTag">{{$subject->subject_name}}</label>
                        <button type="submit" class="btn btn-default" href="" id="labelTag">Update</button>
                    </div>
    </div>
        {{csrf_field()}}
    </form>
        </div>
        @endforeach

        @endif
    </div>
    @include('layouts.button_update_students')

    @endsection
