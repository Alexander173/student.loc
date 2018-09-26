
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
                        <input class="form-control" id="inputEmail3" placeholder="Имя" name="first_name" type="text" value="">
                </div>
            </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Фамилия" name="middle_name" type="text" value="">
            </div>
        </div>
        </div>
        <div class="col-md-2 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Отчество" name="last_name" type="text" value="">
            </div>
        </div>
        </div>
        <div class="col-md-3 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Дата рождения" name="date_of_birth" type="date" value="">
            </div>
        </div>
        </div>
         <div class="col-md-4 column">
        <div class="form-group">
            <div class="col-sm-12">
                        <input class="form-control" id="" placeholder="Group_id(Подр. на стр. группы)" name="group_id" type="number" value="">
            </div>
        </div>
        </div>

        <div class="col-md-2 column">
             <button type="submit" class="btn btn-default" href="">Update</button>
             <button type="button" class="btn btn-link pull-right" data-toggle="collapse" data-target="#myDiv" data-open-text="Open">x</button>
        </div>
    </div>       
    </div>
    </div>
    {{csrf_field()}}
</form> 
    </tr>
</div>
</div>
