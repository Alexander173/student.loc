@if(!$assessment->isEmpty())
    <div class="d-flex justify-content-between flex-wrap">
   @foreach($assessment->groupBy('subject_id') as $list)
       <div class="col-md-4">
    <form method="post" action="{{route('editAssessment',$list[0]->subject_id)}}">
        {{method_field('PUT')}}
    <div class="col-md-4">
                <input type="hidden" name="student_id" value="{{$assessment->first()->student_id}}">
                @foreach($list as $last)
                            <div class="">
                                <select class="custom-select custom-select-sm" name="Update[{{$last->id}}]">
                                    @for($i=2;$i<=5;++$i)
                                    @if($last->assess == $i)
                                       <option value="{{$i}}" type="text" selected>{{$i}}</option>
                                        @else
                                        <option value="{{$i}}" type="text">{{$i}}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                       @endforeach
        <div class="">
                    <select class="custom-select custom-select-sm" name="assess" type="number">
                        <option selected value="Add_mark" type="text">Add mark</option>
                        <option value="2" type="number">2</option>
                        <option value="3" type="number">3</option>
                        <option value="4" type="number">4</option>
                        <option value="5" type="number">5</option>
                    </select>
        </div>
                    <div class="pb-4">
                    <label for="labelTag">{{$list[0]->subject->subject_name}}</label>
                        <button type="submit" class="btn btn-default" href="" id="labelTag">Update</button>
                    </div>
    </div>
        {{csrf_field()}}
    </form>
        </div>
    @endforeach
  </div>
  @endif