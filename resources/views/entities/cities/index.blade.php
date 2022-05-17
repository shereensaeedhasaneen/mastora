@extends('layouts.base')
@section('title', $title)
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col">
                 
                </div>
            </div>
        
            <div class="row ">
                <div class="col">
                    <div class="card mb-0 border-bottom border-bottom rounded-0 shadow-sm ">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    {{ $title }}
                                </div>
                                <div>
                                    <a href="{{$createRoute}}" type="button" class="btn btn-outline-primary btn-sm">
                                        <i class="cil-playlist-add"></i> {{$createLinkTitle}} 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="row">
                <div class="col">
                    <div class="card rounded-0 rounded-bottom border-top-0 shadow-sm ">
                        <div class="card-body">
                            <x-guide-x.grid 
                                :columnHeaders="$columnHeaders"
                                :rows="$rows"
                            />
                            <x-guide-x.delete-dialog />
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
@endsection

