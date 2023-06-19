<!-- Etat Civil Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('etat_civil_id', __('models/tuteurs.fields.etat_civil_id').':') !!}
    {!! Form::number('etat_civil_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/tuteurs.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', __('models/tuteurs.fields.prenom').':') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Sexe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sexe', __('models/tuteurs.fields.sexe').':') !!}
    {!! Form::text('sexe', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>




@if (request()->getRequestUri()== "/tuteurs/create?=parentForm")

<input type="hidden" name="parentForm" value="parentForm">

@endif



<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', __('models/tuteurs.fields.telephone').':') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/tuteurs.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Adresse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('adresse', __('models/tuteurs.fields.adresse').':') !!}
    {!! Form::text('adresse', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Cin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cin', __('models/tuteurs.fields.cin').':') !!}
    {!! Form::text('cin', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Remarques Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('remarques', __('models/tuteurs.fields.remarques').':') !!}
    {!! Form::textarea('remarques', null, ['class' => 'form-control', 'maxlength' => 65535, 'maxlength' => 65535]) !!}
</div>
