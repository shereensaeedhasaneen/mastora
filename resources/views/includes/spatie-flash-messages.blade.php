@if (flash()->message)
    <div class="alert {{ flash()->class }} alert-dismissible fade show" role="alert">
        <strong><i class="cil-chat-bubble"></i></strong> {{ flash()->message }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
