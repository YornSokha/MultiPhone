@extends('layouts.app')


@section('content')



    <div class="row">
        <div class="col">
            <a href="/user/create" class="btn btn-success">Add New</a>
        </div>
        <div class="col">
            <div class="float-right">
                {{Form::open(array('url' => '/user/index','class' =>'form-inline', 'method' => 'get'))}}
                <input class="form-control mr-md-2 search-box" style="width: 240px" name="search" value="{{request('search')}}" type="text" placeholder="Search" >
                <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                {{Form::close()}}
            </div>
        </div>
    </div>


    <div class="justify-content-md-center">
        @if(count($users) > 0)
            <table  class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col col-md-2" scope="col">Name</th>
                    <th class="col col-md-auto" scope="col">Phone</th>
                    <th class="col col-md-2" scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
{{--                {{dd($users)}}--}}
                @foreach($users as $i => $user)
                    <tr>
                        <td class="col-md-auto">{{(($users->currentPage() - 1) * 4) + ++$i}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            @php
                                $phones = '';
                            @endphp

                            @foreach($user->phones as $phone)
                                @php
                                    $phones .= $phone->phone . ', ';
                                @endphp
                            @endforeach
                            {{rtrim($phones, ', ')}}
                        </td>
                        <td>

                            <div class="form-inline">
                                <!-- Button trigger modal -->
                                <button type="button" id="btnShow<?php echo $user->id?>" class="btn btn-primary mr-md-2" data-toggle="modal" data-target="#titleModal<?php echo $user->id?>">
                                    Show
                                </button>

                                <a href="/user/{{$user->id}}/edit" class="btn btn-info mr-md-2">Edit</a>
                                {{Form::open(array('url' => '/user/' .$user->id . '/delete','class' =>'form-inline', 'method' => 'delete'))}}
                                <span class="btn btn-danger" id="btn-delete" >Delete</span>
                            {{Form::close()}}

                            </div>

                                <!-- Modal -->
                                <div class="modal" id="titleModal<?php echo $user->id?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalTital">{{$user->name}}'s profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{ Form::open(array('url' => '/user/' .$user->id .'/update','class' => 'modal-update','method' => 'put','files' => true))}}

                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="offset-sm-2 image-profile">
                                                            <img class="image-profile" src="{{url('images/'.$user->path)}}" alt="{{url('images/img_avatar.png')}}">
                                                            <input type="file" id="preview-image" name="profile_img">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 offset-sm-2">
                                                            <div class="form-group">
                                                                <label for="Name">Name</label>
                                                                <input type="text"  class="form-control" name="name" id="Name" value="{{$user->name}}" aria-describedby="emailHelp" placeholder="Enter title" required>
                                                            </div>
                                                            @foreach($user->phones as $i => $phone)
                                                                <div class="form-group">
                                                                    <label>Phone {{$i + 1}}</label>
                                                                    <input type="text" class="form-control" name="phones[]" value="{{$phone->phone}}" placeholder="Enter phone" required><br/>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                {{--<span class="btn btn-primary" id="btn-update">Save changes</span>--}}
                                                <button type="button" class="btn btn-primary" id="btn-update-modal">Save changes</button>
                                            </div>
                                            {{Form::close()}}

                                        </div>
                                        </div>
                                    </div>








                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h1 class="alert alert-dismissible alert-danger">No data...</h1>
        @endif
    </div>

    <div class="justify-content-md-center">
        <div class="col-md-12 align-center-custom">
            {{ $users->links() }}
        </div>
    </div>
@endsection
