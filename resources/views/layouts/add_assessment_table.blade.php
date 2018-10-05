<div class="container1">
@if(!$assessment->isEmpty())
    <table class="table table-bordered table-hover table-sm">
               <thead class="thead-dark">
                <tr>
                    <th scope="col">Успеваемость</th>
                    <th scope="col">Оценка </th>
                    <th scope='col'>Удалить оценку </th>
                </tr>
                </thead>
        <tbody>
            <tr>
        @foreach($assessment->groupBy('subject_id') as $list)
        <td rowspan="{{$list->count()+1}}">{{$list[0]->subject->subject_name}}</td>
                        @foreach($list as $last)
                            <tr>
                                <td>{{$last->assess}}</td>
                                    <td>
                                    <form method="post" action="{{route('deleteAssessment',$last->id)}}">
                         {{method_field('DELETE')}}
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button type="submit" class="btn btn-primary btn-sm" style="margin: 0 !important;padding: 0!important ">Delete Mark</button>
                            </form>
                                 </td>
                                 </tr>
                        @endforeach
        @endforeach
                            @include('layouts.colorStudentAvg',$name_temp)
                            </tr>
        </tbody>
    </table>
@else
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th>Студент без оценок</th>
                <th scope="col">Оценки</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$name_temp->first_name.' '. $name_temp->middle_name}}</td>
                <td class="text-center font-italic">Оценок нет </td>
            </tr>
        </tbody>
    </table>

@endif
    </div>