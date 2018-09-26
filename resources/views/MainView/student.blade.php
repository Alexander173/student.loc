@extends('layouts.app')



@section('content')
  @if(isset($list_stud))
<table class="table table-bordered table-hover table-striped">
<thead class="thead-dark">
<tr>
    <th scope="col">#</th>
    <th scope="col">First_name</th>
    <th scope="col">Middle_name</th>
    <th scope="col">Last_name</th>
    <th scope="col">Date_of_birthday</th>
    <th scope="col">Group_id</th>
    <th scope="col">Delete Student</th>
    <th scope="col">Updates Student </th>
</tr>
</thead>
<tbody class="">
    @foreach($list_stud as $list)
    <tr>
    <th scope="row">{{$list->id}}</th> 
    <td>{{$list->first_name}} </td>
    <td>{{$list->middle_name}}</td>
    <td>{{$list->last_name}}</td>
    <td>{{$list->date_of_birthday}}</td>
    <td>{{$list->group_id}}</td>
    <td>
        <form method="post" action="{{route('deleteStudent',$list->id)}}">
            {{method_field('DELETE')}}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
        </form>
   </td>
    <td>  @include('layouts.button_update_students') </td>
    </tr>
   
@endforeach

</tbody>
</table>
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
                        <input class="form-control" id="" placeholder="Дата рождения" name="date_of_birth" type="date">
            </div>
        </div>
        </div>
         <div class="col-md-4 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Group_id(Подр. на стр. группы)" name="group_id" type="number">
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




