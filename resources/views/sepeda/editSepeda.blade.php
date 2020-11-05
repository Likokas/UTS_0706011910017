@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Sepeda</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('sepeda.update', $sepeda) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $sepeda->name }}" >
                    </div>
                    <div class="form-group">
                        <label for="barcode">Spesifikasi:</label>
                        <textarea type="text" class="form-control"  name="description">{{ $sepeda->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nama">Pembeli:</label>
                        <select name="created_by" class="custom-select">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name.' ('. $user->email.')'}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Price:</label>
                        <input type="text" class="form-control"  name="harga" value="{{ $sepeda->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Create Date:</label>
                        <input type="date" class="form-control"  name="create_date" value="{{ $sepeda->event_date }}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
