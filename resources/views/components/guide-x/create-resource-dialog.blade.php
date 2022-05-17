<div class="modal fade" id="{{$attributes['resourceName']}}-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{$attributes['resourceName']}}-modal-title">
                    {{$attributes['modaleTitleStore']}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="create-resource-{{$attributes['resourceName']}}-dialog-alert-wrapper">
                </div>
                
                <input 
                    id="create-resource-{{$attributes['resourceName']}}-dialog-data-holder" 
                    type="hidden" 
                    class=""
                    data-resource-name="{{$attributes['resourceName']}}"
                    data-store-url="{{$attributes['storeUrl']}}"
                    data-update-url="{{$attributes['updateUrl']}}"
                    data-success-store-message="{{$attributes['successStoreMessage']}}"
                    data-success-update-message="{{$attributes['successUpdateMessage']}}"
                    data-modal-title-store="{{$attributes['modaleTitleStore']}}"
                    data-modal-title-update="{{$attributes['modaleTitleUpdate']}}"
                    data-bind-key="{{config('guide-x.blade_component.guide_x.create_resource_dialog.bind_key')}}"
                />
                <form id="{{$attributes['resourceName']}}-form">
                    @csrf
                    @foreach ($attributes['elements'] as $element)
                        <x-guide-x.form.element-factory :element="$element" />
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{$attributes['closeButtonText']}}
                </button>
                <button type="button" id="{{$attributes['resourceName']}}-submit-button" class="btn btn-primary">
                    {{$attributes['submitButtonText']}}
                </button>
            </div>
        </div>
    </div>
</div>