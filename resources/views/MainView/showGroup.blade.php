@extends('layouts.app')
@section('content')
    <div class="container1">
        @if(isset($list_group))
            <table class="table table-bordered table-hover table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">group_name</th>
                    <th scope="col">description</th>
                    <th scope="col">Updates Subject </th>
                </tr>
                </thead>
                <tbody class="">
                @foreach($list_group as $list)
                    <tr>
                        <td>{{$list->group_name}}</td>
                        <td>{{$list->description}}</td>
                        <td>  @include('layouts.button_update_group') </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="container1">
@if(!empty($list_group))
            <table class="table table-bordered table-hover table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Студент</th>
                    <th scope="col">Предмет</th>
                    <th scope="col">Оценка </th>
                </tr>
                </thead>
            <tbody>
    @foreach($list_group as $list_temp)
        @foreach($list_temp->student as $list)
        <tr>
            <td rowspan="{{$list->assessment->count()+3}}">{{$list->id}}</td>
            <td rowspan="{{$list->assessment->count()+3}}"><a href="{{route('showStudent',$list->id)}}" style="color: #000000">{{$list->first_name .' '. $list->middle_name.' ' . $list->last_name}}</a></td>
            @foreach($list->assessment->groupBy('subject_id') as $list_as)
            <td rowspan="{{$list_as->count()+1}}">{{$list_as->first()->subject->subject_name}}</td>
                @foreach($list_as as $list_mark)                         
                    <tr>            
                        <td>{{$list_mark->assess}}</td>
                     </tr>                     
                @endforeach       
            @endforeach
                           @include('layouts.colorStudentAvg')
             </tr>
        @endforeach
    @endforeach
            </tbody>
                <caption>
                @if(isset($arr))
                    @foreach($arr as $key=>$value)
                    <p class="text-sm-left font-weight-bold">{{$key ." = ". round($value,2)}}</p>
                    @endforeach
                 @endif
                </caption>
            </table>
@endif
    </div>
    <p class="text-sm-center font-weight-bold">Студенты отличники</p>
    <div class="container justify-content-md-center" >
        <div class="col-md-auto">
        @if(!empty($list_group))
            <table class="table table-bordered table-hover table-sm ">
                <thead class="thead-dark">
                    <tr>
                    <th scope="">#</th>
                    <th scope="">Студент</th>
                    <th scope="">Средний бал</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($list_group as $list_temp)
                    @foreach($list_temp->student as $list)
                        @if(!empty($studentAvg[$list->id]))
                            @if(($studentAvg[$list->id]==5))
                    <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->first_name .' '. $list->middle_name.' ' . $list->last_name}}</td>
                        @include('layouts.colorStudentAvg')
                    </tr>
                           @endif
                        @endif
                    @endforeach
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
    </div>
    <p class="text-sm-center font-weight-bold">Студенты со средним балом выше 4.5</p>
    <div class="container justify-content-md-center" >
        <div class="col-md-auto">
            @if(!empty($list_group))
                <table class="table table-bordered table-hover table-sm ">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="">#</th>
                        <th scope="">Студент</th>
                        <th scope="">Средний бал</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list_group as $list_temp)
                        @foreach($list_temp->student as $list)
                            @if(!empty($studentAvg[$list->id]))
                                @if(($studentAvg[$list->id]>=4.5))
                                    <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->first_name .' '. $list->middle_name.' ' . $list->last_name}}</td>
                                        @include('layouts.colorStudentAvg')
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
