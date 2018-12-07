@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-sm-4">
            {{Form::open(array('url' => '/user/store','class' => 'md-form align-self-center', 'method' => 'post','files' => true))}}
                <input name="_token" type="hidden" value="{{ csrf_token()}}"/>
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control" name="name" id="inputName" placeholder="Enter name" required>
                </div>

                <div id="add-field">
                    <div class="row form-group" >
                        <div class="form-group col-md-11">
                            <label for="inputPhone">Phone 1</label>
                            <input type="text" class="form-control" name="phones[]" id="inputPhone" placeholder="Enter phone" required><br/>
                        </div>
                        <div class="col-md-1">
                            <label for="btn-add-more">Add</label>
                            <button class="btn btn-primary add">+</button>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="form-group col">--}}
                        {{--<label class="btn btn-default btn-file">--}}
                            {{--Browse photo<input name="profile" type="file" style="display: none;">--}}
                        {{--</label>--}}
                    {{--</div>--}}

                {{--</div>--}}
                <div class="form-group">
                    <label for="imageInput">Select profile picture</label>
                    <input data-preview="#preview" name="profile_img" type="file" id="imageInput">
                    <img class="col-sm-6" id="preview"  src="">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="/user/index" class="btn btn-dark">Back</a>
            {{Form::close()}}
        </div>
    </div>

@stop

