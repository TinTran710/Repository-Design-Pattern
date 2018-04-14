@extends('index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h4>Search keyword</h4>
    </div>

    <form action="search" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="keyword">Search by keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection