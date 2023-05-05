<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;

class BaseController extends Controller
{
    public  $model;
    public $file_name;

    protected function loadCommonDataToView($view_path)
    {
        //pass the given variable to all views that call this function
        View::composer($view_path, function ($view) {
            $view->with('dashboard_url', route('admin.dashboard'));
            $view->with('_panel',$this->panel);
            $view->with('_base_route',$this->base_route);
            $view->with('_view_path',$this->base_route);
            $view->with('_folder',property_exists($this,'folder')?$this->folder:'');

        });

        return $view_path;

    }

    public function checkDirectoryExist (){
        //check folder
        if (!file_exists(storage_path($this->folder_path)))
        {
            @mkdir(storage_path($this->folder_path));
        }

    }

    public function getRandomStringForImage()
    {
        return rand(2323,9999);
    }

    public function rowExist( $row)
    {

        if (!$row) {

            request()->session()->flash('error_message', 'Invalid request');
            return redirect()->route($this->base_route.'.index')->send();
        }

    }

    protected function processImage($file, $dimension_conf = null)
    {
        $this->file_name = time().'_'.$this->getRandomStringForImage().'.'. $file->getClientOriginalExtension();
        //check if folder exist
        $this->checkDirectoryExist();
        $file->storeAs('public', $this->file_name);
    }

    protected function removeFile($path)
    {
       @Storage::delete('public/' . $path);
    }

    function generateAllMiddlewareByPermission($permissionName = null)
    {
        //Take permission name automatically from panel
        if (!$permissionName)
            $permissionName = lcfirst($this->panel);

        $this->middleware('permission:' . $permissionName.'-index')->only('index');
        $this->middleware('permission:' . $permissionName.'-view')->only('show');
        $this->middleware('permission:' . $permissionName . '-create')->only('create', 'store');
        $this->middleware('permission:' . $permissionName . '-edit')->only('edit', 'update');
        $this->middleware('permission:' . $permissionName . '-delete')->only('destroy');
    }
}
