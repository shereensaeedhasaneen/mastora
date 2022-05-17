<div class="modal fade" id="delete-confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{__('main.common.close.value')}}
                </button>
                <form action="" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">
                        {{__('main.common.delete.value')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('javascript')
    <script type="text/javascript">
        const modal = document.querySelector('#delete-confirmation');
        document.addEventListener('show.coreui.modal', showDeleteModal);
        function showDeleteModal(event) {
            const trigger = event.relatedTarget;
            const url = trigger.getAttribute('href');
            const dialogTitle = trigger.dataset.dialogTitle;
            const dialogBody = trigger.dataset.dialogBody;
            event.target.querySelector('.modal-title').textContent = dialogTitle;
            event.target.querySelector('.modal-body').textContent = dialogBody;
            event.target.querySelector('form').setAttribute('action', url);
        }
    </script>
@endsection
