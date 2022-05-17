<div class="card">
    <div class="pb-3 pt-3">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading pl-3 pr-3">
                    <div class="panel-title">
                        <a data-toggle="collapse" class="btn btn-info" href="#collapse1">{{ __('main.common.filter.value') }}</a>
                        {{ $exportSlot ?? '' }}
                    </div>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <form action="{{ $action }}" method="GET" class="border-top mt-3 p-3 pt-4">
                        <div class="panel-body">
                            <div class="row">
                                {{ $slot }}
                            </div>
                        </div>
                        <div class="d-flex justify-content-end panel-footer">
                            <input type="submit" value="Search" class="btn btn-primary mr-3 pl-5 pr-5">
                            <a href="{{ $action }}" class="btn btn-light">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
