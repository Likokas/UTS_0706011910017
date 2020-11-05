@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <h1 class="col">List Sepeda</h1>
    </div>
    <div class="row">
        @auth()
        <div class="col-md-2 offset-md-10">
            <a href="{{ route('sepeda.create') }}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Tambah</a>
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
