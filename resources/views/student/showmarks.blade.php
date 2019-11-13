@extends('layouts.layout')

@section('content')

    <!-- Static Table Start -->
    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Marks<span class="table-project-n"></span>Table</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                       data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                    <tr>
                                        <th data-field="date" data-editable="true">Date</th>
                                        <th data-field="subject">Subject</th>
                                        <th data-field="prof" data-editable="true">Prof</th>
                                        <th data-field="mark" data-editable="true">Mark</th>
                                        <th data-field="topic" data-editable="true">Topic</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($marks as $mark)

                                    <tr>
                                        <td>{{$mark->date}}</td>
                                        <td>{{$mark->subject}}</td>
                                        <td>{{$mark->teachFirstName}} {{$mark->teachLastName}}</td>
                                        <td>{{$mark->mark}}</td>
                                        <td>{{$mark->topic}}</td>

                                    </tr>

                                    @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->



@endsection
