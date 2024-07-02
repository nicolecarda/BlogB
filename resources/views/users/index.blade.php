<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Index</title>
</head>
<body>

    <h1>Users List</h1>
<ul>
    @foreach ($users as $user)
        <li> <a href="{{route('users.show', $user)}}"> 
            {{$user->name}} 
            {{$user->email}} </a> 
        |  <a href="{{route('users.edit', $user)}}"> EDIT </a> | 
        <form method="POST" action= "{{route ('users.destroy', $user)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="DELETE" />
        </form>
    </li>
    @endforeach
</ul>   
    
</body>
</html>

 

