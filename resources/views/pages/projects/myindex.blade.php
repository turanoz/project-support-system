@extends("layouts.app")
@section("title")
    Benim Projelerim
@endsection
@section("content")
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Benim Projelerim</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="me-2">
                    <button id="btnGroupDrop1" type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Filtreler
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{route("get-my-projects-category",$category->id)}}">{{$category->ad}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Yeni Proje
                    </button>
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

    {{--New Project--}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Yeni Proje</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{route("projects.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->ad}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ad" class="form-label">Proje Adı</label>
                    <input type="text" class="form-control" autocomplete="off" name="ad">
                </div>
                <div class="mb-3">
                    <label for="icerik" class="form-label">İçeriği</label>
                    <textarea class="form-control" name="icerik" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ekler" class="form-label">Ekler (.pdf ve .docx türevleri)</label>
                    <input class="form-control" type="file" name="ekler[]" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf" multiple>
                </div>
                <button type="submit" class="btn btn-outline-dark">Kaydet</button>
            </form>
        </div>
    </div>
@endsection

