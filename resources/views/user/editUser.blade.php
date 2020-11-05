@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">Edit Sepeda</h1>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('user.update', $user) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <label for="nama">Name:</label>
                        <input type="text" class="form-control"  name="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="barcode">Email:</label>
                        <input type="text" class="form-control"  name="email" value="{{ $user->email }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="barcode">Jenis Sepeda:</label>
                        <td>
                            @foreach($user->sepedas  as  $sepeda )
                                <li>{{ $sepeda->name }}</li>
                            @endforeach
                        </td>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
