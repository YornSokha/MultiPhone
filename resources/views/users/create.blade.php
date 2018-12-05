@extends('layouts.app')

@section('content')
    <div class="form-group">
        {{Form::open(array('url' => '/user/store','class' => 'align-self-center', 'method' => 'post'))}}
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
                        <label for="btn-add-more">Add phone</label>
                        <button class="btn btn-primary add">+</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/user/index" class="btn btn-dark">Back</a>
        {{Form::close()}}
    </div>

@stop

