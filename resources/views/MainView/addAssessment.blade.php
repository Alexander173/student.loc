@extends('layouts.app')

@section('content')
    <div class="container1">
       @if(isset($student))
          <table class="table table-bordered table-hover table-sm">
               <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Студент</th>
                    <th scope="col">Предмет</th>
                    <th scope="col">Оценка </th>
                    <th scope='col'>Удалить оценку </th>

                </tr>
                </thead>
                <tbody>
            <tr>
             
    <td rowspan="{{$student->count()+3}}">{{$student->first()->student_id}}</td>
      
    <td rowspan="{{$student->count()+3}}" style="color: #000000">{{$name_temp[0]->first_name.' '. $name_temp[0]->middle_name}}</td>
    @foreach($student->groupBy('subject_id') as $list)
        
        <td rowspan="{{$list->count()+1}}">{{$list[0]->subject->subject_name}}</td>
        {{-- {{dd($list)}} --}}
                        @foreach($list as $last)                  
                 
                            <tr>
                                <td>{{$last->assess}}</td>
                               
                                    <td>
                                    <form method="post" action="{{route('deleteAssessment',$last->id)}}">                                
                         {{method_field('DELETE')}}
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-primary btn-sm" style="margin: 0 !important;padding: 0!important ">Delete Mark</button>
                            </form>
                                 </td>
</tr>

                    @endforeach
                    @endforeach
                    @if(!empty($studentAvg))
                        @if(($studentAvg>3) && ($studentAvg<4.5))
                            <td colspan="4">
                                <p class="text-sm-left font-weight-bold">
                                    Средний бал {{$name_temp[0]->first_name. ' '.$name_temp[0]->middle_name .' '. round($studentAvg,2)}}
                                </p>
                            </td>
                            @else
                            @include('layouts.colorStudentAvg',$name_temp)
                            @endif
                            @endif

                            </tr>
                        </tbody>               
            </table>
        @endif
    </div>
 @if(isset($student))
    <div class="d-flex justify-content-between">
    @foreach($student->groupBy('subject_id') as $list)
       <div class="col-md-4">
    <form method="post" action="{{route('editAssessment',$list[0]->subject_id)}}">
        {{method_field('PUT')}}
        {{-- @method('PUT') --}}
    <div class="col-md-4">
                <input type="hidden" name="student_id" value="{{$student->first()->student_id}}"> 
                
                @foreach($list as $last)
                        
                            <div class="">
                                <select class="custom-select custom-select-sm" name="Update[{{$last->id}}]">
                                    @for($i=2;$i<=5;++$i)
                                    @if($last->assess == $i)
                                       <option value="{{$i}}" type="text" selected>{{$i}}</option>
                                        @else
                                        <option value="{{$i}}" type="text">{{$i}}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                       @endforeach
            
        <div class="">
        
                    <select class="custom-select custom-select-sm" name="Add mark" type="number">
                        <option selected value="Add_mark" type="text">Add mark</option>
                        <option value="2" type="number">2</option>
                        <option value="3" type="number">3</option>
                        <option value="4" type="number">4</option>
                        <option value="5" type="number">5</option>
                    </select>
        </div>

                    <div class="pb-4">
                    <label for="labelTag">{{$list[0]->subject->subject_name}}</label>
                        <button type="submit" class="btn btn-default" href="" id="labelTag">Update</button>
                    </div>
    </div>

        {{csrf_field()}}
    </form>
        </div>
    @endforeach


    </div>
@endif
    @endsection
