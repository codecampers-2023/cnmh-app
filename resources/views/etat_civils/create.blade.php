<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Summernote CSS - CDN Link -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- //Summernote CSS - CDN Link -->

@extends('layouts.app')

@section('content')
    <section class="content-header">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    @lang('crud.create') @lang('models/etatCivils.singular')
                    </h1>
                </div>
            </div>
        </div>  --}}
    </section>

    <section class="content px-3">
        @include('adminlte-templates::common.errors')
        <div class="container-fluid ">
            <div class="d-flex justify-content-center">

                <div class="col-md-8">
                    <div class="card card-primary card-create">
                        <div class="card-header">
                            <h3 class="card-title">@lang('crud.create') une nouvelle @lang('models/etatCivils.singular')</h3>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'etatCivils.store']) !!}
                            <div class="row">
                                @include('etat_civils.fields')
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('etatCivils.index') }}" class="btn btn-default"> @lang('crud.cancel') </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                
            </div>
        </div>
    </section>


@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#description').summernote({
            placeholder: 'Saisir une description du service.',
            height: 100
        });
        $('.dropdown-toggle').dropdown();
    });
</script>
