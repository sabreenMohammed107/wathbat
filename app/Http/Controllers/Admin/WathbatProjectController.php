<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wathbat_project;
use App\Models\Project_type;
use App\Models\Project_gallery;
use App\Models\Project_slider;
use App\Models\Project_alumital_type; 
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class WathbatProjectController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Wathbat_project $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'Admin.wathbatProject.';
        $this->routeName = 'wathbat_project.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Wathbat_project::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Project_type::all();
        $alumitals = Project_alumital_type::all();
        return view($this->viewName . 'create', compact('types', 'alumitals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'project_ar_name' => $request->input('project_ar_name'),
            'project_en_name' => $request->input('project_en_name'),
            'project_ar_details' => $request->input('project_ar_details'),
            'project_en_details' => $request->input('project_en_details'),
            'about_ar_project' => $request->input('about_ar_project'),
            'about_en_project' => $request->input('about_en_project'),
            'about_ar_customer' => $request->input('about_ar_customer'),
            'about_en_customer' => $request->input('about_en_customer'),
            'project_date' => Carbon::parse($request->input('project_date')),

        ];
        if ($request->input('project_type_id')) {

            $data['project_type_id'] = $request->input('project_type_id');
        }
        if ($request->input('alumital_type_id')) {

            $data['alumital_type_id'] = $request->input('alumital_type_id');
        }
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['master_poster'] = $this->UplaodImage($image);
        }
        $this->object::create($data);



        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Wathbat_project::where('id', '=', $id)->first();
        $types = Project_type::all();
        $alumitals = Project_alumital_type::all();
        $sliders=Project_slider::where('project_id','=',$id)->get();
        $galleries=Project_gallery::where('project_id','=',$id)->get();
        return view($this->viewName . 'edit', compact('row', 'types', 'alumitals','sliders','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'project_ar_name' => $request->input('project_ar_name'),
            'project_en_name' => $request->input('project_en_name'),
            'project_ar_details' => $request->input('project_ar_details'),
            'project_en_details' => $request->input('project_en_details'),
            'about_ar_project' => $request->input('about_ar_project'),
            'about_en_project' => $request->input('about_en_project'),
            'about_ar_customer' => $request->input('about_ar_customer'),
            'about_en_customer' => $request->input('about_en_customer'),
            'project_date' => Carbon::parse($request->input('project_date')),

        ];
        if ($request->input('project_type_id')) {

            $data['project_type_id'] = $request->input('project_type_id');
        }
        if ($request->input('alumital_type_id')) {

            $data['alumital_type_id'] = $request->input('alumital_type_id');
        }
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['master_poster'] = $this->UplaodImage($image);
        }
        $this->object::findOrFail($id)->update($data);

        return redirect()->route($this->routeName . 'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Wathbat_project::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->master_poster;

        $file_name = public_path('uploads/' . $file);

        try {
            $row->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext  = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();


        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }

    /***
     * 
     */

    public function addGallery(Request $request)
    {

       
        $data = [

        
            'order' => $request->input('order'),
            'project_id' => $request->input('project_id'),
         
        ];

        if ($request->hasFile('gallery')) {
            $image = $request->file('gallery');

            $data['image'] = $this->UplaodImage($image);
        }

        Project_gallery::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateGallery(Request $request)
    {
        $id = $request->input('gallery_id');

    
        $data = [

           
            'order' => $request->input('order'),
            'project_id' => $request->input('project_id'),
           
        ];

        if ($request->hasFile('gallery')) {
            $image = $request->file('gallery');

            $data['image'] = $this->UplaodImage($image);
        }


        Project_gallery::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteGallery($id)
    {

        $gallery = Project_gallery::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/' . $file);

        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    public function addSlider(Request $request)
    {

       
        $data = [

        
            'order' => $request->input('order'),
            'project_id' => $request->input('project_id'),
         
        ];

        if ($request->hasFile('slider')) {
            $image = $request->file('slider');

            $data['image'] = $this->UplaodImage($image);
        }

        Project_slider::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateSlider(Request $request)
    {
        $id = $request->input('slider_id');

    
        $data = [

           
            'order' => $request->input('order'),
            'project_id' => $request->input('project_id'),
           
        ];

        if ($request->hasFile('slider')) {
            $image = $request->file('slider');

            $data['image'] = $this->UplaodImage($image);
        }


        Project_slider::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteSlider($id)
    {

        $gallery = Project_slider::where('id', '=', $id)->first();
        $file = $gallery->image;


        $file_name = public_path('uploads/' . $file);

        try {

            $gallery->delete();
            File::delete($file_name);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    
}
