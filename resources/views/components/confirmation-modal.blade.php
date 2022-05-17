@php($modalId = 'confirmationModal-'. $action . $attributes['id'])

<a class="dropdown-item"
   href="#"
   data-toggle="modal"
   data-target="#{{ $modalId }}">
    {{ $action }}
</a>


<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="pull-left">{{__('Actions')}}</h4>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <span class="modal-exclamation-wrapper">
                    <i class="fa fa-exclamation" aria-hidden="true"></i>
                </span>
                <p>{{__("Do you want to")}} {{ $action }} {{$resourceType}}
                    {{ $resourceName }}
                    {{__('?')}}</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ $actionUrl ?? '' }}">
                    {{csrf_field()}}
                    {{method_field($actionMethod ?? 'DELETE')}}
                    <button type="button" class="btn btn-secondary pull-right"
                            data-dismiss="modal">{{__('Close')}}</button>
                    <button type="submit" class="btn btn-danger pull-left"><i class="fa fa-trash-o" aria-hidden="true"></i>
                        {{__('Confirm')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
