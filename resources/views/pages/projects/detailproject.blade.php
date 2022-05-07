@extends("layouts.app")
@section("content")
    <div class="card mt-2">
        <div class="card-footer">
            <h3 class="my-3">{{$project->ad}}</h3>
        </div>
        <div class="card-body">
            <p style="text-align: justify">{{$project->icerik}}</p>
        </div>
        <div class="card-footer">
            Ekler :

            @foreach(json_decode($project->ekler) as $key=>$ek)
                <a href="{{route("download")}}?path={{$ek}}">Ek {{$key+1}} </a>,
            @endforeach

        </div>
    </div>

@endsection
