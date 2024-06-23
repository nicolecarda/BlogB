@extends('layouts.index')

@yield('title', 'Posts Index')

@section('body')
<main>
 

        <h1>Posts List</h1>
            <div class='card'>
                <div class='card-header'>        
                    <a class="btn btn-success btn-sm float-right" href="{{route('posts.showAll')}}">Add Post</a>        
                </div>
                <div class='card-body'>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td width="10px">
                                        <a class="btn btn-primary btn-sm" href="{{route('posts.edit', $post)}}">Edit</a>
                                    </td>
                                    <td width="10px">
                                        <form action="{{route('posts.destroy', $post)}}" method="POST">                              
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>        
            </div>

        </main>
    
@endsection
    
    
    