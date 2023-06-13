<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped" id="rendez-vouses-table">
            <thead>
            <tr>
                <th>Id Consultation</th>
                <th>Date Rendez Vous</th>
                <th>Etat</th>
                <th>Remarques</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($rendezVouses as $rendezVous)
                <tr>
                    <td>{{ $rendezVous->id_consultation }}</td>
                    <td>{{ $rendezVous->date_rendez_vous }}</td>
                    <td>{{ $rendezVous->etat }}</td>
                    <td>{{ $rendezVous->remarques }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['rendez-vouses.destroy', $rendezVous->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('rendez-vouses.show', [$rendezVous->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('rendez-vouses.edit', [$rendezVous->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $rendezVouses])
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
