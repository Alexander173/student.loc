@extends('layouts.app')

@section('content')
    @include('layouts.add_assessment_table')
    @include('layouts.add_assessment')
     <div class="d-flex justify-content-between flex-wrap">
    @if(!$list_subject->isEmpty())
    @foreach($list_subject as $subject)
        <div class="col-md-4">
    <form method="post" action="{{route('editAssessment',$subject->id)}}">
        {{method_field('PUT')}}
     <div class="col-md-4">
                <input type="hidden" name="student_id" value="{{$name_temp[0]->id}}">                               
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

    @endsection
