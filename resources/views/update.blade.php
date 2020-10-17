@extends('layouts.admin-master')
@section('content')
    <div class="row mt">
        <div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> User</h4>
            <div class="form-panel">
                <div class=" form">
                    <form class="cmxform form-horizontal style-form" method="post" action="/update/{{$user->id}}">
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input class=" form-control" id="name" name="name" value="{{$user->name}}" minlength="2"
                                       type="text" required/>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="control-label col-lg-2">E-Mail</label>
                            <div class="col-lg-10">
                                <input class="form-control " id="email" type="email" name="email"
                                       value="{{$user->email}}"
                                       required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                @csrf
                                <button class="btn btn-theme" type="submit">Save</button>
                                <button class="btn btn-theme04" type="button" onclick="location.href='users'">Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /form-panel -->
        </div>
        <!-- /col-lg-12 -->
    </div>
@endsection
