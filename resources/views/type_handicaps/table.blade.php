<div class="card-header">
    <div class="col-sm-12 d-flex justify-content-between p-0">
        <div class="d-flex justify-content-between">
            <select   class="form-select  btn-default dropdown-toggle ml-2 filter" aria-label="Default select example">
                <option selected>Parents</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input type="search" class="form-control form-control-lg"
                    placeholder="Recherche">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped" id="type-handicaps-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($typeHandicaps as $typeHandicap)
                <tr>
                    <td>{{ $typeHandicap->nom }}</td>
                    <td>{!! $typeHandicap->description !!}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['typeHandicaps.destroy', $typeHandicap->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('typeHandicaps.show', [$typeHandicap->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('typeHandicaps.edit', [$typeHandicap->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $typeHandicaps])
        </div>
        <div class="float-left">
                                <button type="button" class="btn btn-default swalDefaultQuestion">
                                    <i class="fas fa-download"></i> Exporter
                                </button>
                                <button type="button" class="btn btn-default swalDefaultQuestion">
                                    <i class="fas fa-file-import"></i> Importer
                                </button>
        </div>
    </div>
</div>
