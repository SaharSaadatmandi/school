@extends('layouts.layout')

@section('content')

        <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Insert new Topic</a></li>
                            {{--                            <li><a href="#reviews"> Account Information</a></li>--}}
                            {{--                            <li><a href="#INFORMATION">Social Information</a></li>--}}
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="/material/store" method="post" class="dropzone dropzone-custom needsclick add-professors"
                                                      id="demo1-upload" enctype="multipart/form-data" onsubmit="checkDate()" name="form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group col-md-6" id="class">
                                                                <label>Class</label>
                                                                <select name="idClass" class="form-control" required>
                                                                        @foreach($classes as $class)
                                                                        <option value="{{$class->idClass}}">{{$class->idClass}}</option>
                                                                        @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6" id="subject">
                                                                <label class="login2">Subject</label>
                                                                <input name="frm[subject]" type="text"
                                                                       class="form-control" required>
                                                            </div>




                                                            <div class="form-group col-md-12" id="topic">
                                                                <label>Description</label>
                                                                <textarea name="frm[mdescription]" type="text"
                                                                       class="form-control"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-12">


                                                                <label class="control-label">Support Material:</label>

                                                                <input type="file" class="form-control-file"
                                                                       name="material">


                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 50px">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection