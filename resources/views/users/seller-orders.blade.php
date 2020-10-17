@extends('layouts.admin-master')
@section('content')

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Siparişler
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>receiver name</th>
                        <th>company</th>
                        <th class="text-right">address</th>
                        <th class="text-right">phone</th>
                        <th class="text-right">email</th>
                        <th class="text-right">order_date</th>
                        <th class="text-right">product name</th>
                        <th class="text-right">order_quantity</th>
                        <td class="text-right"><a href="/indir">İNDİR</a></td>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>receiver name</th>
                        <th>company</th>
                        <th class="text-right">address</th>
                        <th class="text-right">phone</th>
                        <th class="text-right">email</th>
                        <th class="text-right">order_date</th>
                        <th class="text-right">product name</th>
                        <th class="text-right">order_quantity</th>
                        <td class="text-right"><a href="/indir">İNDİR</a></td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->company}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->order_quantity}}</td>
                            <td class="text-right"><button type="button" style="background-color: #ed969e;border-color: #ed969e;" class="btn btn-danger" onclick="location.href='/orderapprove/{{$order->id}}'">Onayla</button>
                            <td class="text-right"><a href="/indir">İNDİR</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
