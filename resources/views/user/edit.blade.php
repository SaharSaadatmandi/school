@extends('layouts.layout')

@section('content')
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Basic Information</a></li>
                            {{--                            <li><a href="#reviews"> Account Information</a></li>--}}
                            {{--                            <li><a href="#INFORMATION">Social Information</a></li>--}}
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="/user/update/{{$userInfo->id}}" method="post"
                                                      class="dropzone dropzone-custom needsclick add-professors"
                                                      id="demo1-upload" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group col-md-12">
                                                                <label>Name:</label>
                                                                <input name="frm[name]" type="text"
                                                                       class="form-control" required
                                                                       value="{{$userInfo->name}}">
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label>Email:</label>
                                                                <input name="frm[email]" type="text"
                                                                       class="form-control"
                                                                       value="{{$userInfo->email}}">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Role:</label>
                                                                <select name="frm[roleId]" class="form-control">
                                                                    @foreach($roles as $role)
                                                                        <option
                                                                            @if($userInfo->roleId == $role->id) selected
                                                                            @endif
                                                                            value="{{$role->id}}">{{$role->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label>Status:</label>
                                                                <select name="frm[status]" class="form-control">
                                                                    <option @if($userInfo->status == 'active')  selected @endif
                                                                    value="active">Enable User
                                                                    </option>
                                                                    <option @if($userInfo->status == 'inactive')  selected @endif
                                                                    value="inactive">Disable User
                                                                    </option>

                                                                </select>
                                                            </div>


                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                            <div class="form-group col-md-12">
                                                                <label>Password:</label>
                                                                <input name="password" type="password"
                                                                       class="form-control"
                                                                       value="">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label>Confirm Password:</label>
                                                                <input name="confirmPassword" type="password"
                                                                       class="form-control"
                                                                       value="">
                                                            </div>

                                                            <div class="form-group col-md-12">


                                                                <label class="control-label">Photo:</label>

                                                                <input type="file" class="form-control-file"
                                                                       name="photo">


                                                            </div>
                                                            @if(isset($userInfo->photo))
                                                                <div class="form-group col-md-12">
                                                                    <img
                                                                        src="{{ asset('/uploads/'.$userInfo->photo) }}"
                                                                        class="img-thumbnail"
                                                                        style="width: 50%;height: 50%"/>
                                                                </div>
                                                            @endif



                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">
                                                                    Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="product-tab-list tab-pane fade" id="reviews">--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--                                        <div class="review-content-section">--}}
                            {{--                                            <div class="row">--}}
                            {{--                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--                                                    <div class="devit-card-custom">--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="text" class="form-control" placeholder="Email">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="number" class="form-control"--}}
                            {{--                                                                   placeholder="Phone">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="password" class="form-control"--}}
                            {{--                                                                   placeholder="Password">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="password" class="form-control"--}}
                            {{--                                                                   placeholder="Confirm Password">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <a href="#!" class="btn btn-primary waves-effect waves-light">Submit</a>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="product-tab-list tab-pane fade" id="INFORMATION">--}}
                            {{--                                <div class="row">--}}
                            {{--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
                            {{--                                        <div class="review-content-section">--}}
                            {{--                                            <div class="row">--}}
                            {{--                                                <div class="col-lg-12">--}}
                            {{--                                                    <div class="devit-card-custom">--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="url" class="form-control"--}}
                            {{--                                                                   placeholder="Facebook URL">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="url" class="form-control"--}}
                            {{--                                                                   placeholder="Twitter URL">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="url" class="form-control"--}}
                            {{--                                                                   placeholder="Google Plus">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <div class="form-group">--}}
                            {{--                                                            <input type="url" class="form-control"--}}
                            {{--                                                                   placeholder="Linkedin URL">--}}
                            {{--                                                        </div>--}}
                            {{--                                                        <button type="submit"--}}
                            {{--                                                                class="btn btn-primary waves-effect waves-light">Submit--}}
                            {{--                                                        </button>--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
