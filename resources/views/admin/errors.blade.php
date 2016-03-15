@if (count($errors))
    <div class="alert alert-danger">
        <p><strong>Ups...</strong> Se produjeron algunos errores:</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif  