@extends('layout')

@section('scripts')
<script src="/js/job.js"></script>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="container title">
            <div class="row">
                <div class="col-6">
                    <h3><strong>Your Jobs</strong></h3>
                </div>
                <div class="col-6 text-right">
                    <button class="btn btn-success btn-round" data-toggle="modal" data-target="#addModal">&#43; Add
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-12 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Location</th>
                        <th scope="col">Price</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr>
                        <td scope="row">{{$job->id}}</td>
                        <td>{{$job->type->name}}</td>
                        <td>{{$job->date}}</td>
                        <td>{{date('h:i A', strtotime($job->time))}}</td>
                        <td>{{$job->location}}</td>
                        <td>${{number_format($job->price, 2, '.', ',')}}</td>
                        <td><button id="btn_edit" class="btn btn-success btn-sm" data-id="{{$job->id}}"
                                data-toggle="modal">Edit</button></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="nodata">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        {{ $jobs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal HTML -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('job.add')}}" method="POST" role="form" id="validateAddForm" novalidate>
                {!! csrf_field() !!}

                <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}" />

                <div class="modal-header">
                    <h4 class="modal-title">Add Job</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="type_id" name="type_id">
                                <option></option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Time</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Location"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price"
                                value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    <input id="btn_add" type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('job.update')}}" method="POST" role="form" id="validateEditForm" novalidate>
                {!! csrf_field() !!}

                <input type="hidden" id="id" name="id" />
                <input type="hidden" id="user_id" name="user_id" value="{{Auth::id()}}" />

                <div class="modal-header">
                    <h4 class="modal-title">Edit Job</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Type</label>
                        <div class="col-sm-8">
                            <select class="form-control" id="type_id" name="type_id">
                                <option></option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Time</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="time" name="time" placeholder="Time" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Location</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Location"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label required">Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price"
                                value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <button id="btn_delete" class="btn btn-danger">Delete</button>
                            </div>
                            <div class="col-10 text-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="btn_update" type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
