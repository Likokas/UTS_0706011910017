@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <h1 class="col">List Pembeli</h1>
        </div>
        <div class="row">
            <div class="col-md-2 offset-md-10">
                <a href="@auth() {{ route('user.create') }} @endauth" class="btn btn-primary btn-block" role="button" aria-pressed="true">Tambah</a>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>

                    <th scope="col">Sepeda List</th>
                    <th scope="col">Remove</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><a href=" @auth(){{route('user.edit', $user)}} @endauth">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
{{--                        <td>{{$user->tahun}}</td>--}}
                        <td>
                            @foreach($user->sepedas  as  $sepeda )
                                <li>{{ $sepeda->name }}</li>
                            @endforeach
                        </td>
                        @auth()
                            <td>
                                <form action="{{ route('user.destroy', $user) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Remove</button>
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
