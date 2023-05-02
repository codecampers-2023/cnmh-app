<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Consultation;
use App\Repositories\ConsultationRepository;
use Illuminate\Http\Request;
use Flash;

class ConsultationController extends AppBaseController
{
    /** @var ConsultationRepository $consultationRepository*/
    private $consultationRepository;

    public function __construct(ConsultationRepository $consultationRepo)
    {
        $this->consultationRepository = $consultationRepo;
    }

    /**
     * Display a listing of the Consultation.
     */
    public function index(Request $request,$modelName)
    {
        $title = $modelName;
        $model = "App\\Models\\".ucfirst($modelName);
        $query = $request->input('query');
         $consultations = $this->consultationRepository->where($model,'type',$modelName)->paginate(2);
        if ($request->ajax()) {
            return view('consultations.table')
                ->with('consultations', $consultations);
        }

        return view('consultations.index',compact('consultations','title'));
    }

    /**
     * Show the form for creating a new Consultation.
     */
    public function create($model)
    {
        $title= $model;
        return view('consultations.create',compact('title'));
    }

    /**
     * Store a newly created Consultation in storage.
     */
    public function store(CreateConsultationRequest $request,$model)
    {
        $input = $request->all();
        $Model = "App\\Models\\" . ucfirst($model);
         $callModel =new $Model;
        $callModel::create($input);
        // $consultation = $this->consultationRepository->create($input);

        // Flash::success(__('messages.saved', ['model' => __('models/consultations.singular')]));

        return redirect(route('consultations.index',$model));
    }

    /**
     * Display the specified Consultation.
     */
    public function show($id)
    {
        $consultation = $this->consultationRepository->find($id);

        if (empty($consultation)) {
            Flash::error(__('models/consultations.singular').' '.__('messages.not_found'));

            return redirect(route('consultations.index'));
        }

        return view('consultations.show')->with('consultation', $consultation);
    }

    /**
     * Show the form for editing the specified Consultation.
     */
    public function edit($id)
    {
        $consultation = $this->consultationRepository->find($id);

        if (empty($consultation)) {
            Flash::error(__('models/consultations.singular').' '.__('messages.not_found'));

            return redirect(route('consultations.index'));
        }

        return view('consultations.edit')->with('consultation', $consultation);
    }

    /**
     * Update the specified Consultation in storage.
     */
    public function update($id, UpdateConsultationRequest $request)
    {
        $consultation = $this->consultationRepository->find($id);

        if (empty($consultation)) {
            Flash::error(__('models/consultations.singular').' '.__('messages.not_found'));

            return redirect(route('consultations.index'));
        }

        $consultation = $this->consultationRepository->update($request->all(), $id);

        Flash::success(__('messages.updated', ['model' => __('models/consultations.singular')]));

        return redirect(route('consultations.index'));
    }

    /**
     * Remove the specified Consultation from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $consultation = $this->consultationRepository->find($id);

        if (empty($consultation)) {
            Flash::error(__('models/consultations.singular').' '.__('messages.not_found'));

            return redirect(route('consultations.index'));
        }

        $this->consultationRepository->delete($id);

        Flash::success(__('messages.deleted', ['model' => __('models/consultations.singular')]));

        return redirect()->back();
    }
}
