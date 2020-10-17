@extends('layouts.admin-master')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Kullanıcılar
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>date</th>
                    <th>name</th>
                    <th class="text-right">email</th>
                    <th class="text-right">user_type</th>
                    <td class="text-right">İndir</td>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>date</th>
                    <th>name</th>
                    <th class="text-right">email</th>
                    <th class="text-right">user_type</th>
                    <td class="text-right">İndir</td>
                </tr>
                </tfoot>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->updated_at}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->user_type}}</td>
                    <td><a href="/indir">İNDİR</a></td>
                </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <strong>Excel Dosyası</strong> Ekle
                    </div>
                    <div class="card-body card-block">
                        <form action="{{route('user.import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Yükle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
