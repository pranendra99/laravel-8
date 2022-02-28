@extends('adminlte::page')

@section('title', 'List User PNS')

@section('content_header')
    <h1 class="m-0 text-dark">List User PNS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('userpns.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userpns as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->nip}}</td>
                                <td>{{$user->nama}}</td>
                                <td>{{$user->tempat_lahir}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>{{$user->tanggal_lahir}}</td>
                                <td>{{$user->jenis_kelamin}}</td>
                                <td>
                                    <img src="{{asset('/images/'.$user->image)}}" alt="{{$user->nama}}" width="100px" height="100px">
                                </td>
                                <td>
                                    <a href="{{route('userpns.edit', $user)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('userpns.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush