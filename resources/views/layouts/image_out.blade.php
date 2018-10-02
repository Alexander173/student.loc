<div class="">
@if(is_null($name_temp->student[0]->image))
<img src="{{asset('storage/img_lk/default_avatar.jpg')}}" class="img-responsive rounded-circle border-primary img-thumbnail" width="175" height="175"/>
<form method="post" action="{{route('getImage',$name_temp->student[0]->id)}}" enctype="multipart/form-data">
@csrf
<input type="file" name="photo" required style="margin-top:5px"></br>
<button class="btn btn-success" type="submit" style="margin-top:10px">Загрузить</button>
</form>
@if(Session::has('string'))
    <p class="text-center font-italic">{{ Session::get('string') }} </p>
@endif
@else
<img src="{{asset('storage/img_lk/'.$name_temp->student[0]->image->img_src)}}" class="img-responsive rounded-circle border-primary img-thumbnail" width="175" height="175"/>
<form method="post" action="{{route('updateImage',$name_temp->student[0]->image->id)}}" enctype="multipart/form-data">
@csrf
<input class="btn-sm" type="file" name="photo" required></br>
<button class="btn btn-sm btn-success" type="submit" style="margin-left:7px">Обновить</button>
</form>
@if(Session::has('string'))
    <p class="text-center font-italic">{{ Session::get('string') }} </p>
@endif
@endif
</div>