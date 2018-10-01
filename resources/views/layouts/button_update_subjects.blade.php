<div class="container">
  
  <div class="container">
    <div class="col-md-1">
            <button type="button" class="btn btn-secondary btn-sm" data-toggle="collapse" data-target="#myDiv{{$list->id}}" data-open-text="Open">Редактировать</button>
        </div>
  </div> 
   <div class="row">
            
<form method="post" action="{{route('updateSubject',$list->id)}}">
 {{method_field('PUT')}}
<div class="col-md-12 collapse" id="myDiv{{$list->id}}">
         <div class="col-sm-12">
          
          <div class="row clearfix">
            
        <div class="col-md-10 column">
            <div class="form-group">
                <div class="col-sm-12">
                        <input class="form-control" id="inputEmail3" placeholder="Редактировать предмет" name="subject_name" type="text" value="{{$list->subject_name}}">
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
  </div>
  
</div>