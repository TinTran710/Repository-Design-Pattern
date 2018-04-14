@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h4>Add keyword</h4>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form action="create" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Enter keyword">
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" id="source" name="source" placeholder="Enter source">
        </div>
        <div class="form-group">
            <label for="trust">Trust</label>
            <input type="text" class="form-control" id="trust" name="trust" placeholder="Enter trust level">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection