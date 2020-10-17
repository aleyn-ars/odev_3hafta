@extends('layouts.admin-master')
@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Ürünler
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>photo</th>
                    <th>name</th>
                    <th class="text-right">price</th>
                    <th class="text-right">created_by</th>
                    <th class="text-right">Delete</th>
                    <th class="text-right">Update
                    <th class="text-right">Download</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>photo</th>
                    <th>name</th>
                    <th class="text-right">price</th>
                    <th class="text-right">created_by</th>
                    <th class="text-right">Delete</th>
                    <th class="text-right">Update
                    <th class="text-right">Download</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{asset('/uploads/products/').'/'.$product->photo}}" alt="{{$product->name}}" width="200px" height="200px"/></td>
                        <td>{{$product->name}}</td>
                        <td class="text-right">{{$product->price}}</td>
                        <td class="text-right">{{$product->user[0]->name}}</td>
                        <td class="text-right"><button type="button" class="btn btn-danger" style="background-color: #f1b0b7;border-color: #f1b0b7" onclick="location.href='/sil/{{$product->id}}'">Delete</button>
                        <td class="text-right"><button type="button" class="btn btn-primary" style="background-color: #0c5460;border-color: #0c5460" onclick="location.href='/guncelle/{{$product->id}}'">Update</button>
                        </td>
                        <td><a href="/indir">DOWNLOAD</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
