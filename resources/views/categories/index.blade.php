<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories List</title>
</head>
<body>

  
<h1>Categories List</h1>

<div class='card'>
    <div class='card-header'>        
        <a class="btn btn-success btn-sm float-right" href="{{route('categories.create')}}">Add Category</a>        
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
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td width="10px">
                            <a class="btn btn-primary btn-sm" href="{{route('categories.edit', $category)}}">Edit</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('categories.destroy', $category)}}" method="POST">                              
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
</html>