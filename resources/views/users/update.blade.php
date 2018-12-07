@extends('layouts.app')




@section('content')
    <div class="row">
        <div class="col-md-6 offset-sm-3">
            {{ Form::open(array('url' => '/user/' .$user->id .'/update', 'class' => 'align-self-center','method' => 'put','files' => true))}}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="row">
                <div class="offset-sm-2 image-profile">
                    <img class="image-profile" src="{{url('images/'.$user->path)}}" alt="{{url('images/img_avatar.png')}}">
                    <input type="file" id="preview-image" name="profile_img">
                </div>
            </div>

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name" id="Name" value="{{$user->name}}" aria-describedby="emailHelp" placeholder="Enter title" required>
            </div>
            @foreach($user->phones as $i => $phone)
                @if(!$i)
                    <div class="add-field-update">
                        <div class="row" >
                            <div class="form-group col-md-11">
                                <label>Phone 1</label>
                                <input type="text" class="form-control" name="phones[]" value="{{$phone->phone}}" placeholder="Enter phone" required><br/>
                            </div>
                            <div class="col-md-1">
                                <label for="btn-add-more">Add</label>
                                <button class="btn btn-primary add-update">+</button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="add-field-update">
                        <div class="row" >
                            <div class="form-group col-md-11">
                                <label>Phone  {{$i+1}} </label>
                                <input type="text" class="form-control" name="phones[]" value="{{$phone->phone}}" placeholder="Enter phone" required><br/>
                            </div>
                            <div class="col-md-1">
                                <label for="btn-remove">Remove</label>
                                <button class="btn btn-danger remove-update">X</button>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach
            <span class="btn btn-info" id="btn-update">Update</span>
            {{--<button type="submit" class="btn btn-info" onclick="updatedAlert()">Update</button>--}}
            <a href="/user/index" class="btn btn-dark">Back</a>
            {{ Form::close() }}
        </div>

    </div>

@stop

@section('footer')
    <script> function updatedAlert() {
            alert("Record has been updated.");
        }</script>
@stop