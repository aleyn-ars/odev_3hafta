@extends('layouts.admin-master')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <img src="{{asset('/uploads/avatars/').'/'.Auth::user()->avatar}}" class="img-circle" style="width:150px;height:150px;float:left;margin-right:25px;">

                    <h2> {{Auth::user()->name}}'s Profile</h2>
                    <form enctype="multipart/form-data" action="/profile" method="POST">
                        <label> Update Profile İmage </label> <br>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary" style="background-color: #0c5460;border-color: #0c5460;">
                    </form>


                </div>
            </div>
        </div>
        <form action="{{route('seller.add')}}" method="post">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5" >
                            <div class="card-header" style="background-color: #f1b0b7;"><h3 class="text-center font-weight-light my-4">Profili Güncelle</h3></div>
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
                                                <label class="small mb-1" for="inputLastName">Şirket</label>
                                                <input class="form-control py-4" id="inputLastName" type="text" name="company" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" value="{{ Auth::user()->email }}" />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputLastName">Telefon</label>
                                                <input class="form-control py-4" id="inputLastName" type="text" name="phone" />
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="inputEmailAddress">Üyelik Tipi</label>
                                            <select id="inputState" class="form-control" name="member_type">
                                                <option selected>Seçenekler</option>
                                                <option value="bronz">Bronz Üyelik</option>
                                                <option value="silver">Silver Üyelik</option>
                                                <option value="gold">Gold Üyelik</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-row" style="margin-left: 5px;">
                                            <label class="radio-container m-r-55">Tedarikçi
                                                <input type="radio" checked="checked" name="secim" value="tedarikci">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container" style="margin-left: 15px;">Alıcı
                                                <input type="radio" name="secim" value="alici">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    @csrf
                                    <button type="submit" class="btn btn-primary" style="margin-left: 230px;background-color: #0c5460; border-color: #0c5460;width:150px;">Kaydet</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
@endsection
