@extends('layouts.app')



@section('content')

  @if(isset($list_stud))
<table class="table table-bordered table-hover table-striped">
<thead class="thead-dark">
<tr>
    <th scope="col">#</th>
    <th scope="col">Полное имя</th>
    <th scope="col">Дата рождения</th>
    <th scope="col">Группа</th>
    <th scope="col">Успеваемость</th>
    @foreach($subject as $current_sub)
    <th scope="col">{{$current_sub->subject_name}}</th>
    @endforeach
    <th scope="col">Анкета</th>
    <th scope="col">Delete Student</th>
</tr>
</thead>
<tbody class="">
    @foreach($list_stud as $list)
    <tr>
    @if(isset($student_avg[$list->id]))
    <th scope="row" bgcolor="{{($student_avg[$list->id]>=4.5)&&($student_avg[$list->id]!=5) ? 'yellow': ($student_avg[$list->id]<=3?'red':($student_avg[$list->id]==5?'green':' '))}}">{{$list->id}}</th>
    @else
    <th scope="row">{{$list->id}}</th>
    @endif
    <td>{{$list->first_name.' '.$list->middle_name.' '.$list->last_name}} </td>
    <td>{{$list->date_of_birthday}}</td>
    <td>{{$list->group->group_name}}</td>
    @if(isset($student_avg[$list->id]))
        <td>{{round($student_avg[$list->id],2)}}</td>
        @else
        <td> - </td>
        @endif
    @foreach($subject as $current_sub)
        @if(isset($subject_avg[$list->id][$current_sub->subject_name]))
    <td> {{round($subject_avg[$list->id][$current_sub->subject_name],2)}}</td>
        @else
        <td> - </td>
        @endif
    @endforeach
    <td><a href="{{route('showStudent',$list->id)}}"><button class="btn btn-sm btn-secondary">Анкета</button></a></td>
    <td>
        <form method="post" action="{{route('deleteStudent',$list->id)}}">
            {{method_field('DELETE')}}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
        </form>
   </td>
    </tr>
@endforeach

</tbody>
</table>
{{$list_stud->render()}}
@endif
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container">
    <div class="row">
<form method="post" action="{{route('createStudent')}}">
<div class="col-md-12 collapse" id="myDiv">
         <div class="col-sm-12">
          <div class="row clearfix">
        <div class="col-md-2 column">
            <div class="form-group">
                <div class="col-sm-12">
                        <input class="form-control" id="inputEmail3" placeholder="Имя" name="first_name" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Фамилия" name="middle_name" type="text">
            </div>
        </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Отчество" name="last_name" type="text">
            </div>
        </div>
        </div>
        <div class="col-md-3 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Дата рождения" name="date_of_birthday" type="date">
            </div>
        </div>
        </div>
         <div class="col-md-4 column">
        <div class="form-group">
            <div class="col-sm-12">
                <select class="custom-select custom-select-sm" name="group_id">
                <option selected value="" type="number">Choose group</option>
                @foreach($group as $gr)
                        <option value="{{$gr->id}}" type="number">{{$gr->group_name}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        </div>

        <div class="col-md-2 column">
             <button type="submit" class="btn btn-default" href="">Create</button>
             <button type="button" class="btn btn-link pull-right" data-toggle="collapse" data-target="#myDiv" data-open-text="Open">x</button>
        </div>
    </div>
    </div>
    </div>
    {{csrf_field()}}
</form>
  </div>
  <div class="container">
    <div class="col-md-1 pull-right">
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#myDiv" data-open-text="Open">Добавить студента</button>
        </div>
  </div>
</div>
<div class= "footer">
@if(Session::has('string'))
    <p class="text-center font-italic">{{ Session::get('string') }} </p>
@endif
</div>
@endsection




