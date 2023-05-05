<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Company\StoreCompanyValidation;
use App\Http\Requests\Admin\Company\UpdateCompanyValidation;
use App\Mail\CompanyCreated;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;

class CompanyController extends BaseController
{
    //properties
    protected $base_route = 'admin.company';
    protected $view_path = 'admin.company';
    protected $panel = 'Company';
    protected $folder = 'company';
    protected $folder_path;


    public function __construct(Company $model)
    {
        $this->model = $model;
        $this->folder_path = 'images' . DIRECTORY_SEPARATOR . $this->folder;
        $this->generateAllMiddlewareByPermission();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = $this->model->latest()->paginate(10);

        return view(parent::loadCommonDataToView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(parent::loadCommonDataToView($this->view_path . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyValidation $request)
    {
        $data = $request->validated();

        if($request->hasFile('main_image')){
            $this->processImage($data['main_image']);
            $data['logo'] = $this->file_name;
        }
        $company = $this->model->create($data);

        try{
            Mail::to('kapilsapkota1001@gmail.com')->send(new CompanyCreated($company));
        }catch (\Exception $e){

        }

        $request->session()->flash('success_message', $this->panel.' '.$company->name. ' added Successfully');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);
        parent::rowExist($data['row']);

        return view(parent::loadCommonDataToView($this->view_path . '.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data ['row'] = $this->model->find($id);
        parent::rowExist($data['row']);

        return view(parent::loadCommonDataToView($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyValidation $request, $id)
    {
        $row = $this->model->find($id);

        $data = $request->validated();
        if($request->hasFile('main_image')){
            $this->processImage($data['main_image']);
            $data['logo'] = $this->file_name;
            //remove old photo
            @$this->removeFile($this->folder_path.DIRECTORY_SEPARATOR.$row->logo);
        }
        $row->update($data);

        $request->session()->flash('success_message',$this->panel.' '. $row->name . ' updated Successfully');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = $this->model->find($id);
        parent::rowExist($row);

        $row->delete();

        return redirect()->route($this->base_route.'.index')->with('success_message', $this->panel . ' deleted Successfully');
    }
}
