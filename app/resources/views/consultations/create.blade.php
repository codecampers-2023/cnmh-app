@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    @lang('crud.create') @lang('models/consultations.singular') {{$title}}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::open(['route' => ['consultations.store',$title]]) !!}

            <div class="card-body">

                <div class="row">
                    @include('consultations.fields')
                </div>

            </div>

            <div class="card-footer">
                <a href="{{ route('consultations.patient', request()->model) }}?dossier_patients={{request()->dossier_patients}} "
                    class="btn btn-primary">Previous</a>
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
