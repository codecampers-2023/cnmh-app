@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    {{-- @lang('crud.create') @lang('models/rendezVouses.singular') --}}
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
        <div class="container-fluid ">
            <div class="d-flex justify-content-center">
                <div class="col-md-10  ">
                    <div class="col-md-12  ">
                        <div class="card card-primary card-create ">
                            <div class="card-header">
                                <h3 class="card-title"> @lang('crud.create')
                                    @if (app()->getLocale() == 'fr')
                                        {{ is_male_localisation('models/rendezVouses.isMale') }} @lang(strtolower(__('models/rendezVouses.singular')))
                                    @else
                                        @lang(strtolower(__('models/rendezVouses.singular')))
                                    @endif

                                </h3>
                            </div>
                            <div class="card-body ">
                                {!! Form::open(['route' => 'rendez-vous.store', 'method' => 'post']) !!}

                                <div class="row">
                                    @include('rendez_vouses.fields')
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="d-flex bd-highlight mb-3">
                                    <div class="p-2 bd-highlight">
                                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                    </div>
                                    <div class="ml-auto p-2 bd-highlight">
                                        <a href="{{ route('rendez-vous.list_dossier') }}" class="btn btn-secondary"> @lang('crud.cancel')
                                        </a>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>







        {{-- <div class="card">

            {!! Form::open(['route' => 'rendez-vous.store', 'method' => 'post']) !!}

            <div class="card-body">

                <div class="row">
                    @include('rendez_vouses.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('rendez-vous.index') }}" class="btn btn-default"> @lang('crud.cancel') </a>
            </div>

            {!! Form::close() !!}

        </div> --}}
    </div>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('#remarques').summernote({
                height: 100,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
@endpush
