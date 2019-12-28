@extends('layouts.layout')

@section('content')
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Classroom Information</a></li>
                        </ul>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form action="/classroom/update/{{$classroomInfo->id}}" method="post"
                                                      class="dropzone dropzone-custom needsclick add-professors"
                                                      id="demo1-upload" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Name:</label>
                                                                <input name="frm[id]" type="text"
                                                                       class="form-control" required
                                                                       value="{{$classroomInfo->id}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Capacity:</label>
                                                                <input name="frm[capacity]" type="number" min="0"
                                                                       class="form-control" required
                                                                       value="{{$classroomInfo->capacity}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Assign Class Coordinator</label>
                                                                <select class="form-control"
                                                                        name="class_coordinator_id">
                                                                    @if($coordinator != 'Select Coordinator')
                                                                        <option value="{{$coordinator->id}}"
                                                                                selected="selected">
                                                                            {{$coordinator->firstName}} {{$coordinator->lastName}}
                                                                        </option>
                                                                    @else
                                                                        <option value=0 selected="selected">
                                                                            {{$coordinator}}
                                                                        </option>
                                                                    @endif

                                                                    @foreach($teachers as $teacher)
                                                                        <option value="{{$teacher->idTeach}}">
                                                                            {{$teacher->firstName}} {{$teacher->lastName}}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Description:</label>
                                                                <textarea
                                                                    name="frm[description]">{{$classroomInfo->description}}
                                                                </textarea>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="row" style="margin-top: 50px">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                        class="btn btn-primary btn-lg center-block">
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
