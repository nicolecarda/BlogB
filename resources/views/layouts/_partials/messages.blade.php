@if($message = Session::get('info'))

    <div style="padding:15px; background-color: green; color: white">
        <p> {{$message}} </p>
    </div>
@endif