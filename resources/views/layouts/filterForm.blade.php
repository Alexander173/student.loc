<div class="filter-form">
    <form method="get" action="{{ route('filterStudent') }}">
        @csrf
        <div class="d-flex flex-row">

            <div class="col-md-2 column">
                <div class="col-sm-25">
                        <input class="form-control" id="inputEmail3" placeholder="Имя" name="first_name" type="text">
                </div>
            </div>

            <div class="col-md-2 column">
                <div class="col-sm-10">
                    <select class="custom-select custom-select-sm form-control" name="group_id">
                        <option selected value="" type="number">Choose group</option>
                            @foreach($group as $gr)
                                <option value="{{ $gr->id }}" type="number">{{ $gr->group_name }}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-2 column">
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Pagination" name="page_count" value="5">
                </div>
            </div>

            <div class="container">
                <div class="col-md-1 pull-left">
                    <button type="submit" class="btn btn-default">Найти</button>
                </div>
            </div>

        </div>
   </form>
</div>