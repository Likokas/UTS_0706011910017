@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 20px;">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/Images/designsepeda4.jpg" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="font-weight-bold">Bicycle means simplicity and simplicity means happiness!</h5>
                    <p>Mehmet Murat Ildan</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Images/designsepeda5.jpg" class="d-block w-100" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>HIDUP INI SEPERTI MENGAYUH SEPEDA UNTUK MENJAGA KESEIMBANGAN KITA HARUS TETAP MENGAYUH
                    </h5>
                    <p>-A. EINSTEN-</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/Images/designsepeda6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Coding tanpa error bagaikan sepeda tanpa roda</h5>
                    <p>Liko S</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row">
        <h1 class="col">List Sepeda</h1>
    </div>
    <div class="row">
        @auth()
        <div class="col-md-2 offset-md-10">
            <a href="{{ route('sepeda.create') }}" class="btn btn-dark" role="button" aria-pressed="true">Tambah</a>
        </div>
        @endauth
    </div>
    <div class="row" style="margin-top: 30px;">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Spesifikasi</th>
                <th scope="col">Price</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Create_Date</th>
                <th scope="col">Updated At</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sepedas as $sepeda)
                <tr>
                    <td><a href=" @auth(){{route('sepeda.edit', $sepeda)}} @endauth">{{$sepeda->name}} </a></td>
                    <td>{{$sepeda->description}}</td>
                    <td>{{$sepeda->harga}}</td>
                    @if(isset($sepeda->creator->name))
                        <td>{{$sepeda->creator->name}}</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>{{$sepeda->create_date}}</td>
                    <td>{{$sepeda->updated_at}}</td>
                    <td>{{$sepeda->created_at}}</td>
                    @auth()
                    <td>
                        <form action="{{ route('sepeda.destroy', $sepeda) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
