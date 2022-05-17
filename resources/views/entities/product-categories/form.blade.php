@extends('layouts.base')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                {{ $title }}
                                <x-guide-x.translation-languages-switcher 
                                    :routeName="$translationLanguageSwitcher['routeName']"
                                    :routeParameters="$translationLanguageSwitcher['routeParameters']"
                                    :isEditMode="$translationLanguageSwitcher['isEditMode']"
                                />
                            </div>
                        </div>
                        <div class="card-body scroll-x">
                            <form 
                                action="{{ $formAction['route'] }}" 
                                method="POST" 
                                enctype="multipart/form-data"
                            >
                                @csrf
                                @method($formAction['method'])
                                @foreach ($elements as $element)
                                    <x-guide-x.form.element-factory 
                                        :element="$element"
                                    />
                                @endforeach
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary mx-2">{{ $submitButton }}</button>
                                    <button type="reset" class="btn btn-primary mx-2">{{ __('main.common.reset.value') }}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection