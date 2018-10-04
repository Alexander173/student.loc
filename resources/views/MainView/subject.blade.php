@extends('layouts.app')


@section('content')



<div class="container1">

  @if(isset($list_subject))
<table class="table table-bordered table-striped table-hover">
<thead class="thead-dark">
<tr>
    <th scope="col">#</th>
    <th scope="col">subject_name</th>
    <th scope="col">Delete Subject</th>
    <th scope="col">Updates Subject </th>

</tr>
</thead>
<tbody class="">
    @foreach($list_subject as $list)
    <tr>
    <th scope="row">{{$list->id}}</th> 
    <td>{{$list->subject_name}} </td>
    <td>
        <form method="post" action="{{route('deleteSubject',$list->id)}}">
            {{method_field('DELETE')}}
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
        </form>
   </td>
    <td>  @include('layouts.button_update_subjects') </td>
    </tr>
    @endforeach

</tbody>
</table>
@endif

</div>

<div class="container">
    <div class="row">
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method="post" action="{{route('createSubject')}}">
<div class="col-md-12 collapse" id="myDiv">
         <div class="col-sm-12">
          <div class="row clearfix">
        <div class="col-md-10 column">
            <div class="form-group">
                <div class="col-sm-12">
                        <input class="form-control" id="inputEmail3" placeholder="Новый предмет" name="subject_name" type="text-center">
                </div>
            </div>
        </div>        
        <div class="col-md-2 column">
             <button type="submit" class="btn btn-default" href="">Добавить предмет</button>
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
            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#myDiv" data-open-text="Open">Добавить Предмет</button>
        </div>
  </div>
</div>
<div class= "footer">
@if(Session::has('string'))
    <p class="text-center font-italic">{{ Session::get('string') }} </p>
@endif
</div>
@endsection
