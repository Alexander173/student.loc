@extends('layouts.app')


@section('content')



<div class="container1">

  @if(isset($list_group))
<table class="table table-bordered table-hover table-striped">
<thead class="thead-dark">
<tr>
    <th scope="col">#</th>
    <th scope="col">Group name</th>
    <th scope="col">Description</th>
    <th scope="col">Delete group</th>
    <th scope="col">Updates Subject </th>

</tr>
</thead>
<tbody class="">
    @foreach($list_group as $list)
    <tr>
    <th scope="row">{{$list->id}}</th> 
        <td><a href="{{route('showGroup', $list->id)}}" style="color: #000000">{{$list->group_name}} </a></td>
    <td>{{$list->description}}</td>
    <td>
        <form method="post" action="{{route('deleteGroup',$list->id)}}">
            {{method_field('DELETE')}}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
        </form>
   </td>
    <td>  @include('layouts.button_update_group') </td>
    </tr>
    @endforeach

</tbody>
</table>
@endif

</div>

<div class="container">
    <div class="row">
            
<form method="post" action="{{route('createGroup')}}">
<div class="col-md-12 collapse" id="myDiv">
         <div class="col-sm-12">
          
          <div class="row clearfix">
            
        <div class="col-md-4 column">
            <div class="form-group">
                <div class="col-sm-12">
                        <input class="form-control" id="inputEmail3" placeholder="Группа" name="group_name" type="text">
                </div>
            </div>
        </div>
        <div class="col-md-4 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <textarea class="form-control" id="" placeholder="Описание" name="description" type="text"></textarea>
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
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#myDiv" data-open-text="Open">Добавить Группу</button>
        </div>
  </div>
</div>
<div class= "footer">
@if(Session::has('string'))
    <p class="text-center font-italic">{{ Session::get('string') }} </p>
@endif
</div>
@endsection
