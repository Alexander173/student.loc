
  <div class="container">
    <div class="col-md-1 pull-right">
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#myDiv{{$list->id}}" data-open-text="Open">Редактировать</button>
        </div>
  </div>
</div>

<div class="container">
    <div class="row">
    <tr>
<form method="post" action="{{route('updateStudent', $list->id)}}">
 {{method_field('PUT')}}
<div class="col-md-12 collapse" id="myDiv{{$list->id}}">
         <div class="col-sm-12">
          
          <div class="row clearfix">
            
        <div class="col-md-2 column">
            <div class="form-group">
                <div class="col-sm-12">
                        <input class="form-control" id="inputEmail3" placeholder="Имя" name="first_name" type="text" value="{{$list->first_name}}">
                </div>
            </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Фамилия" name="middle_name" type="text" value="{{$list->middle_name}}">
            </div>
        </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Отчество" name="last_name" type="text" value="{{$list->last_name}}">
            </div>
        </div>
        </div>
        <div class="col-md-3 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Дата рождения" name="date_of_birth" type="date" value="{{$list->date_of_birthday}}">
            </div>
        </div>
        </div>
         <div class="col-md-4 column">
        <div class="form-group">
            <div class="col-sm-12">
                <select class="custom-select custom-select-sm" name="group_id">
                <option selected value="Choose Group" type="number">Choose group</option>
                @foreach($group as $gr)    
                        @if($gr->id==$list->group_id)
                        <option value="{{$gr->id}}" type="number" selected>{{$gr->group_name}}</option>
                        @else
                        <option value="{{$gr->id}}" type="number">{{$gr->group_name}}</option>
                        @endif
                        @endforeach
                    </select>                       
            </div>
        </div>
        </div>

        <div class="col-md-2 column">
             <button type="submit" class="btn btn-default" href="">Update</button>
             <button type="button" class="btn btn-link pull-right" data-toggle="collapse" data-target="#myDiv{{$list->id}}" data-open-text="Open">x</button>
        </div>
    </div>       
    </div>
    </div>
    {{csrf_field()}}
</form> 
    </tr>
</div>
</div>
