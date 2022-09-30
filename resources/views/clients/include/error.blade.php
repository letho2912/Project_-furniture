<style>
    ul.error {
        margin-bottom: 0 !important;
        padding: 5px;
        margin-left: 140px;
    }

    .error {
        color: red;
        font-size: 16px;
        font-weight: 600;
    }

    .alert-danger {
        /* margin-left: 10px; */
        color: red;
        font-size: 16px;
        font-weight: 600;
    }

    .alert-success {
        margin-left: 10px;
        color: green;
        font-size: 16px;
        font-weight: 600;
    }
</style>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
