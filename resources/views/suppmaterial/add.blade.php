@extends('layouts.layout')

@section('content')
    <script>

        function setSubject() {

            var idClass = document.getElementById("idClass").value,
                subject = document.getElementById("subject"),
                l=subject.length;


            for (var i = 0; i <l; i++) {
                subject.remove(0);

            }

            @foreach($subjects as $subject)
            if ("{{$subject->idClass}}" === idClass) {
                var opt = document.createElement('OPTION');
                opt.text = "{{$subject->subject}} ";
                opt.value = "{{$subject->subject}}";
                subject.appendChild(opt);

            }
            @endforeach

        }

    </script>
        <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">Insert new material</a></li>
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
                                                            <div class="form-group col-md-6">
                                                                <label>Class:</label>
                                                                <select onchange="setSubject()" name="idClass" id="idClass" class="form-control" required>
                                                                    <option hidden disabled selected></option>
                                                                    @foreach($classes as $class)
                                                                        <option value="{{$class->idClass}}">{{$class->idClass}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label>Subject:</label>
                                                                <select name="subject" id="subject" class="form-control" required>
                                                                    <option disabled>Select class first</option>
                                                                </select>
                                                            </div>


                                                            <div class="form-group col-md-12" id="topic">
                                                                <label>Description</label>
                                                                <textarea name="frm[mdescription]" type="text"
                                                                       class="form-control"></textarea>
                                                            </div>

                                                            <div class="form-group col-md-12">


                                                                <label class="control-label">Support Material:</label>

                                                                <input type="file" class="form-control-file" required
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
