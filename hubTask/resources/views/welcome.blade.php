<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{URL::to('css/bootstrap.css')}}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/79d7837427.js"></script>

        <!-- Styles -->
        <style>
           img{
               margin-left: 120px;
           }
           h2{
               font-size:54px;
               font-weight: 400;
           }
           .input-table{
               width:700px;
           }
           .add{
            margin-bottom:13px;
            height:55px;
            width:130px;
            font-size:20px;
            color:white !important;
           }
        </style>
        
    </head>
    <body>
    <div class="container" style="margin-top:120px;">
    <div class="row justify-content-center mt-5">
            <!--Code for form input start  -->
            <div class="head">
                <div class="title m-b-md" style="margin-left:50px;">
                    <img src="{{ URL::to('/image/vue.png') }}" width="100px;" height="100px;" alt="Vue.js logo">
                    <h2 class="mt-3">Vue.js Todo List</h2>
                    <br>
                </div>
            <div>
            <div class="row">
                    <div class="col" style="margin-left:50px;">
                        @if(session()->has('status'))
                            <div class="btn btn-success">
                                {{session()->get('status')}}
                            </div>
                        @endif


                        <form action="{{route('tasks.store')}}" method="POST">
                        @csrf
                                <input type="text" name="name" placeholder="Todo Item" class="mr-1 mb-4 name" style="height:50px; width:250px; font-size:25px;" required>
                                <button class="btn btn-primary add">Add Todo</button>
                        </form>
                    </div>
            </div>
                 <div class="row">
                       <!-- Code for Table where the form input is to appear start here -->
                    <div class="input-table">
                       <table class="table-bordered">
                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                               <th style="width:40px; text-align:center;">{{$loop->index + 1}}</th>
                               <td style="width:450px; height:50px; font-size:22px;">{{$task->name}}</td>
                               <td style="width:40px; text-align:center;">
                               <form action="{{route('tasks.delete', $task->id)}}" method="POST">
                                   @csrf
                                   {{ method_field('delete') }}
                                   <button><a><i class="fas fa-times"></i></a></button>       
                               </form>
                               </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table> 
                 </div>
                 </div>
        </div>
    </div>
    </body>
    </html>
    </body>
</html>
