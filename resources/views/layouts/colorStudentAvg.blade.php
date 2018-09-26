

@if(!isset($name_temp))
<td colspan="4" bgcolor="{{ ($studentAvg[$list->id] < 3) ? 'red':((($studentAvg[$list->id]>=4.5)&&($studentAvg[$list->id] !=5))? 'yellow': 'green') }}">
    <p class="text-sm-left font-weight-bold">
        Средний бал {{$list->first_name. ' '.$list->middle_name .' '.round($studentAvg[$list->id],2)}}
    </p>
</td>
@else
<td colspan="4" bgcolor="{{ $studentAvg <= 3 ? 'red' : ( (($studentAvg >= 4.5)&&($studentAvg !=5))? 'yellow': 'green') }}">
    <p class="text-sm-left font-weight-bold">
        Средний бал {{$name_temp[0]->first_name. ' '.$name_temp[0]->middle_name .' '. round($studentAvg,2)}}
    </p>
</td>
@endif