@extends('layouts.Root')
@section('content')

<!-- Code for updating a form inputs starts -->

     <div class="row">
            <div class="col-md-6 offset-3">
              <div class="card">
                <div class="card-header bg-success"><h2>Edit Task</h2></div>
                <div class="card-body">
                 <form action="{{route('post.put', $posts->id)}}" method="POST">
                    {{method_field('put')}}
                        @csrf
                            <div class="form-group">
                                  Name: <input type="text" name="name" placeholder="Enter Task" value="{{$posts->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="text" placeholder="Text" class="form-control">{{$posts->description}}</textarea>
                            </div>
                                <input type="submit" class="submit btn btn-outline-primary">
                 </form>
              </div>
              </div>
            </div>
            <div class="col-md-6">
            
            </div>
     </div>
@stop