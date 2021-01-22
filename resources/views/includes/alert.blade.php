<div class="alert-container">
    <div class="alert-danger">
        <div class="exit-button">
            <span>X</span>
        </div>
        <header>
            <h3>Errors occured</h3>
        </header>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>