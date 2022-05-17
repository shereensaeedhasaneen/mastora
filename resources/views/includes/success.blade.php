@if(session('success'))
    <div class="alert alert-success alert-dismissible mt-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul class="mb-0">
            <li>{!! session('success') !!}</li>
        </ul>
    </div>
@endif
