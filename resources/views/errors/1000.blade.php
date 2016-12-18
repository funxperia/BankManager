@if(count($errors) > 0)
    <ul class="alert alert-danger" style="margin: 10px 0 10px 0; padding: 8px 5px; list-style-type: none;">
        @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif