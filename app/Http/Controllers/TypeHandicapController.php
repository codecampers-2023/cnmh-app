<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeHandicapRequest;
use App\Http\Requests\UpdateTypeHandicapRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TypeHandicapRepository;
use Illuminate\Http\Request;
use Flash;

class TypeHandicapController extends AppBaseController
{
    /** @var TypeHandicapRepository $typeHandicapRepository*/
    private $typeHandicapRepository;

    public function __construct(TypeHandicapRepository $typeHandicapRepo)
    {
        $this->typeHandicapRepository = $typeHandicapRepo;
    }

    /**
     * Display a listing of the TypeHandicap.
     */
    public function index(Request $request)
    {
        $typeHandicaps = $this->typeHandicapRepository->paginate();

        return view('type_handicaps.index')
            ->with('typeHandicaps', $typeHandicaps);
    }

    /**
     * Show the form for creating a new TypeHandicap.
     */
    public function create()
    {
        return view('type_handicaps.create');
    }

    /**
     * Store a newly created TypeHandicap in storage.
     */
    public function store(CreateTypeHandicapRequest $request)
    {
        $input = $request->all();

        $typeHandicap = $this->typeHandicapRepository->create($input);

        Flash::success(__('messages.saved', ['model' => __('models/typeHandicaps.singular')]));

        return redirect(route('typeHandicaps.index'));
    }

    /**
     * Display the specified TypeHandicap.
     */
    public function show($id)
    {
        $typeHandicap = $this->typeHandicapRepository->find($id);

        if (empty($typeHandicap)) {
            Flash::error(__('models/typeHandicaps.singular').' '.__('messages.not_found'));

            return redirect(route('typeHandicaps.index'));
        }

        return view('type_handicaps.show')->with('typeHandicap', $typeHandicap);
    }

    /**
     * Show the form for editing the specified TypeHandicap.
     */
    public function edit($id)
    {
        $typeHandicap = $this->typeHandicapRepository->find($id);

        if (empty($typeHandicap)) {
            Flash::error(__('models/typeHandicaps.singular').' '.__('messages.not_found'));

            return redirect(route('typeHandicaps.index'));
        }

        return view('type_handicaps.edit')->with('typeHandicap', $typeHandicap);
    }

    /**
     * Update the specified TypeHandicap in storage.
     */
    public function update($id, UpdateTypeHandicapRequest $request)
    {
        $typeHandicap = $this->typeHandicapRepository->find($id);

        if (empty($typeHandicap)) {
            Flash::error(__('models/typeHandicaps.singular').' '.__('messages.not_found'));

            return redirect(route('typeHandicaps.index'));
        }

        $typeHandicap = $this->typeHandicapRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/typeHandicaps.singular')]));

        return redirect(route('typeHandicaps.index'));
    }

    /**
     * Remove the specified TypeHandicap from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeHandicap = $this->typeHandicapRepository->find($id);

        if (empty($typeHandicap)) {
            Flash::error(__('models/typeHandicaps.singular').' '.__('messages.not_found'));

            return redirect(route('typeHandicaps.index'));
        }

        $this->typeHandicapRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/typeHandicaps.singular')]));

        return redirect(route('typeHandicaps.index'));
    }
}
