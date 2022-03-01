@extends('adminlte::page')

@section('title', 'List Data PNS')

@section('content_header')
    <h1 class="m-0 text-dark">List User PNS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('pns.create')}}" class="btn btn-primary mb-2">
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
                            <th>Gol</th>
                            <th>Eselon</th>
                            <th>Jabatan</th>
                            <th>Tempat Tugas</th>
                            <th>Agama</th>
                            <th>Unit Kerja</th>
                            <th>No HP</th>
                            <th>NPWP</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pns as $key => $user)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->userpns->nip}}</td>
                                <td>{{$user->userpns->nama}}</td>
                                <td>{{$user->userpns->tempat_lahir}}</td>
                                <td>{{$user->userpns->alamat}}</td>
                                <td>{{$user->userpns->tanggal_lahir}}</td>
                                <td>{{$user->userpns->jenis_kelamin}}</td>
                                <td>{{$user->gol}}</td>
                                <td>{{$user->eselon}}</td>
                                <td>{{$user->jabatan}}</td>
                                <td>{{$user->tempat_tugas}}</td>
                                <td>{{$user->agama}}</td>
                                <td>{{$user->unit_kerja}}</td>
                                <td>{{$user->no_hp}}</td>
                                <td>{{$user->npwp}}</td>
                                {{-- <td>
                                    <img src="{{asset('/images/'.$user->image)}}" alt="{{$user->nama}}" width="100px" height="100px">
                                </td> --}}
                                <td>
                                    <a href="{{route('pns.edit', $user)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('pns.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
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