@extends("layouts.app")
@section("title")
    Tüm Projeler
@endsection
@section("content")
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Tüm Projeler</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="me-2">
                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtreler
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{route("get-projects-category",$category->id)}}">{{$category->ad}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <th>Tarih</th>
                <th>Kategori</th>
                <th class="text-center">Proje Adı</th>
                <th>İçerik</th>

                <th>Görüntülenme</th>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr class="align-middle">
                        <td style="width: 200px">{{$project->created_at->format("d-m-Y H:i")}}</td>
                        <td>{{$project->category->ad}}</td>
                        <td class="text-center" ><a href="{{route("projects.detailproject",$project->id)}}">{{$project->ad}}</a></td>
                        <td width="500" style="text-align: justify">{{mb_substr($project->icerik,0,250,"UTF-8")}}</td>

                        <td width="150" class="text-center">{{$project->goruntulenme}}</td>
                    </tr>
                @endforeach

                </tbody>
                <caption>
                    <p>{{$projects->total()}} projeden {{$projects->count()*($projects->currentPage()-1)+1}}
                        - {{$projects->count()*$projects->currentPage()}} arası</p>
                    {{$projects->links()}}
                </caption>
            </table>
        </div>
    </div>


@endsection
