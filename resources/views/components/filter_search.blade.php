<form class="row justify-content-between " method="get" action="{{route($route_name)}}">
        <div class="col-md-3">
            <label>
                Search
                <input type="text" class="form-control" name="search_key"
                       placeholder="Search" value="{{request('search_key')}}">
            </label>
        </div>
        <div class="row col-md-3 align-items-center">
            <div class="col-md-6">
                <label>
                    Show
                    <select name="show" class="form-control">
                        <option value="10">10</option>
                        <option value="25" {{25 == request('show')? 'selected' : ""}}>25</option>
                        <option value="50" {{50 == request('show')? 'selected' : ""}}>50</option>
                        <option value="100" {{100 == request('show')? 'selected' : ""}}>100</option>
                    </select>
                </label>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-success">
                    <i class="fa fa-filter"></i>
                </button>
            </div>
        </div>

</form>
