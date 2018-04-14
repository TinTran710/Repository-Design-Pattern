@extends('index')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h4>Edit keyword</h4>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <form action="improve/{{$result['data']['id']}}" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="keyword">Keyword</label>
            <input type="text" class="form-control" id="keyword" name="keyword" value="{{$result['data']['keyword']}}" placeholder="Enter keyword">
        </div>
        <div class="form-group">
            <label for="source">Source</label>
            <input type="text" class="form-control" id="source" name="source" value="{{$result['data']['source']}}" placeholder="Enter source">
        </div>
        <div class="form-group">
            <label for="trust">Trust</label>
            <input type="text" class="form-control" id="trust" name="trust" value="{{$result['data']['trust']}}" placeholder="Enter trust level">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection