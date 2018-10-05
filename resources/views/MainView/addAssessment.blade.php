@extends('layouts.app')

@section('content')

    <div class="text-center">
        <span>{{ implode(' ', [$name_temp->first_name, $name_temp->middle_name, $name_temp->last_name]) }}</span>
    </div>

    <br />

    <div class="d-sm-flex">

        <div class="well">
            @include('layouts.image_out')
            <div>
                <p>Дата рождения: {{$name_temp->date_of_birthday}}</p>
                <p>Группа: {{$name_temp->group->group_name}}</p>
            </div>
        </div>

        <div class="flex-fill">
            @include('layouts.add_assessment_table')
        </div>

    </div>

    <div>
        @include('layouts.add_assessment')
    </div>

    <div class="d-flex justify-content-between flex-wrap">
        @include('assessment.add')
    </div>

    @include('layouts.button_update_students')

@endsection
