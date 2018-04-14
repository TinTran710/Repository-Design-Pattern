@extends('index')

@section('content')
    <h4>List keywords</h4><br>

    <form action="list" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="trustMin">Trust min:</label>
            <input type="number" required="" class="form-control" id="trustMin" name="trustMin" style="width: 20%; display: inline; margin-left: 3px;">
        </div>
        <div class="form-group">
            <label for="trustMax">Trust max:</label>
            <input type="number" required="" class="form-control" id="trustMax" name="trustMax" style="width: 20%; display: inline">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form><br>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Keyword</th>
                    <th>Source</th>
                    <th>Trust</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @php if(count($result['data']) == 1) { @endphp
                <tr>
                    <td>{{$result['data'][0]['id']}}</td>
                    <td>{{$result['data'][0]['keyword']}}</td>
                    <td>{{$result['data'][0]['source']}}</td>
                    <td>{{$result['data'][0]['trust']}}</td>
                    <td><a href="improve/{{$result['data'][0]['id']}}">Edit</a></td>
                </tr>
                @php } else { @endphp

                @foreach($result['data'] as $item)
                <tr>
                    <td>{{$item['id']}}</td>
                    <td>{{$item['keyword']}}</td>
                    <td>{{$item['source']}}</td>
                    <td>{{$item['trust']}}</td>
                    <td><a href="improve/{{$item['id']}}">Edit</a></td>
                </tr>
                @endforeach

                @php } @endphp
            </tbody>
        </table>
    </div>

@endsection