<!-- Nom Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nom', __('models/services.fields.name').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-md-12">
    {!! Form::label('description', __('models/services.fields.description').':') !!}
    {!! Form::textarea('description',old('description'), null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    {{-- <input class="form-control" required maxlength="255" name="description" type="text" id="description" style="display: none;"> --}}

    {{-- <textarea name="description" id="description" cols="80" rows="5" required>{!! old('description') !!}</textarea> --}}
</div>
