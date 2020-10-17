@extends('layouts.admin-master')
@section('content')
    <form action="{{route('orderform.add')}}" method="post">
        <div class="container">
            <div class="row justify-content-center">

                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header" style="background-color: #f1b0b7;">
                            <h3 class="text-center font-weight-light my-4" >Şipariş Talep Formu</h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Ad Soyad</label>
                                            <input class="form-control py-4" id="inputFirstName" type="text" name="name" value="{{ Auth::user()->name }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputLastName">Company</label>
                                            <input class="form-control py-4" id="inputLastName" type="text" name="company" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" value="{{ Auth::user()->email }}" />
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Telefon</label>
                                            <input class="form-control py-4" id="inputLastName" type="text" name="phone"  value="{{ Auth::user()->phone }}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Ülke</label>
                                            <input class="form-control py-4" id="inputLastName" type="text" name="country" value="Türkiye"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Şehir</label>
                                            <input class="form-control py-4" id="inputLastName" type="text" name="city" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">İlçe</label>
                                            <input class="form-control py-4" id="inputLastName" type="text" name="town" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Adres</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped" >Siparişler
                                    <thead>
                                    <tr>
                                        <th scope="col">Ürün Adı</th>
                                        <th scope="col">Talep Edilen Miktar</th>
                                        <th scope="col">Tedarikçi No</th>
                                        <th scope="col">Tedarikçi Mail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" style="border: #0c5460" name="product_name" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="order_quantity" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_no" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_mail" maxlength="30" /></td>
                                    </tr>
                                    <tr class="table-info">

                                        <td><input type="text" style="border: #0c5460" name="product_name" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="order_quantity" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_no" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_mail" maxlength="30" /></td>
                                    </tr>
                                    <tr>

                                        <td><input type="text" style="border: #0c5460" name="product_name" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="order_quantity" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_no" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_mail" maxlength="30" /></td>
                                    </tr>
                                    <tr class="table-info">

                                        <td><input type="text" style="border: #0c5460" name="product_name" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="order_quantity" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_no" maxlength="30" /></td>
                                        <td><input type="text" style="border: #0c5460" name="seller_mail" maxlength="30" /></td>
                                    </tr>
                                    </tbody>
                                </table>



                                <div class="main-content">
                                    <div class="section__content section__content--p30">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Toptan siparişler için</strong> Excel
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
                                <div>
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm" style="background-color: #0c5460;width:200px;height:50px;margin-left:300px;margin-top: 20px;">
                                        <i class="fa fa-dot-circle-o"></i> SİPARİŞ VER
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </form>
@endsection
