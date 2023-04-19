@extends('layouts.app')

@section('content')

    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('models/typeHandicaps.plural')</h1>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-primary float-right"
                       href="{{ route('typeHandicaps.create') }}">
                         @lang('crud.create') {{strtolower(__('models/typeHandicaps.singular'))}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            @include('type_handicaps.table')
        </div>
    </div>

@endsection
