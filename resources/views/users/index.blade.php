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
                        <td>{{(($users->currentPage() - 1) * 4) + ++$i}}</td>
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
                        <td class="form-inline ">
                            <a href="/user/{{$user->id}}/edit" class="btn btn-info mr-md-2">Edit</a>
                            {{Form::open(array('url' => '/user/' .$user->id . '/delete','class' =>'form-inline', 'method' => 'delete'))}}
                            <span class="btn btn-danger" id="btn-delete" >Delete</span>
                            {{Form::close()}}
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
