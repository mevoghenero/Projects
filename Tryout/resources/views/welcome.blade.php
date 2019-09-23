
@extends('layouts.Root')
@section('content')


        <div class="jumbotron">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <!--Code for form input start  -->
            <div class="content-center">
                <div class="title m-b-md">
                    <h2>Enter your details.</h2>
                    <br>
                </div>
            <div>
            <div class="row">
                    <div class="col-md-6">
                        @if(session()->has('status'))
                            <div class="btn btn-success">
                                {{session()->get('status')}}
                            </div>
                        @endif


                        <form action="{{route('post.name')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                  Name: <input type="text" name="name" placeholder="Enter Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="text" placeholder="Text" class="form-control"></textarea>
                            </div>
                                <input type="submit" class="submit btn btn-outline-primary">
                        </form>
                    </div>
                    <!-- Code for Table where the form input is to appear start here -->
                    <div class="col-md-6">
                       <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Text</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                               <th scope="row">{{$loop->index + 1}}</th>
                               <td>{{$post->name}}</td>
                               <td>{{$post->description}}</td>
                               <td><a class="btn btn-success" href="{{route('post.edit', $post->id)}}">Edit</a></td>
                               <td>
                               <form action="{{route('post.delete', $post->id)}}" method="POST">
                                   @csrf
                                   {{ method_field('delete') }}
                                   <button type="submit" class="btn btn-danger">Delete</button>       
                               </form>
                               </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table> 
                 </div>
            </div>
        </div>
        @stop
