<div class="card shadow-sm">
    <div class="pb-3 pt-3">
        <div class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading pl-3 pr-3">
                    <div class="panel-title">
                        <a data-toggle="collapse" class="btn btn-info" href="#collapse1">
                            {{ __('main.common.filter.value') }}
                        </a>
                        <form class="float-right" method="GET" action="{{$exportRoute}}">
                            {{ csrf_field() }}
                            <button class="btn btn-warning float-left"><span class="fa fa-share-square-o"></span>
                                {{ __('Export Excel') }}
                            </button>
                        </form>
                    </div>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                    <form action="{{ $indexRoute }}" method="GET" class="border-top mt-3 p-3 pt-4">
                        <div class="panel-body">
                            <div class="row">
                                @foreach ($filterElements as $element)
                                    <div class="col">
                                        <x-guide-x.form.element-factory
                                            :element="$element"
                                        />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-end panel-footer">
                            <input type="submit" value="{{ __('main.common.search.value')}}" class="btn btn-primary mr-3 pl-5 pr-5">
                            <input type="reset" value="{{ __('main.common.reset.value')}}" class="btn btn-secondary mr-3 pl-5 pr-5" id="elements-reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>