@extends('layouts.app')
@section('content')
    <div class="container1">
        @if(!$list_group->isEmpty())
            <table class="table table-bordered table-hover table-striped table-sm text-sm-center">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Название группы</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Успеваемость</th>
                    @foreach($subject as $current_sub)
                    <th scope="col">{{$current_sub->subject_name}}</th>
                    @endforeach
                    <th scope="col">Удалить группу</th>
                </tr>
                </thead>
                <tbody class="">
                @foreach($list_group as $list)
                  @if(!$group_avg['avg_group']==null)
                    <tr>
                        <td>{{$list->group_name}}</td>
                        <td>{{$list->description}}</td>
                        <td>{{round($group_avg['avg_group'],2)}}</td>
                        @foreach($subject as $current_sub)
                            @if(isset($group_avg[$current_sub->subject_name]))
                        <td>{{round($group_avg[$current_sub->subject_name],2)}}</td>
                            @else
                             <td>Оценок нет</td>
                             @endif
                        @endforeach
                        <td>Тут будет кнопка</td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$list->group_name}}</td>
                        <td>{{$list->description}}</td>
                        <td colspan="{{$subject->count()+1}}" class="text-sm-center font-italic">Оценок нет</td>
                        <td>Тут будет кнопка</td>
                    </tr>
                    @endif
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
            <td rowspan="{{$list->assessment->count()+$list->assessment->groupBy('subject_id')->count()}}">{{$list->id}}</td>
            <td rowspan="{{$list->assessment->count()+$list->assessment->groupBy('subject_id')->count()}}"><a href="{{route('showStudent',$list->id)}}" style="color: #000000">{{$list->first_name .' '. $list->middle_name.' ' . $list->last_name}}</a></td>
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
                {{-- <caption>
                @if(isset($group_avg))
                    @foreach($group_avg as $key=>$value)
                    <p class="text-sm-left font-weight-bold">{{$key ." = ". round($value,2)}}</p>
                    @endforeach
                 @endif
                </caption> --}}
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
                                @if(($studentAvg[$list->id]>=4.5)&&($studentAvg[$list->id]!=5))
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
