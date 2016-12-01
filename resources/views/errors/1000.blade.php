@if($errors -> any())
    <ul class="alert alert-danger" style="margin: 10px 0 0 0;padding: 8px 5px;">
        @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif