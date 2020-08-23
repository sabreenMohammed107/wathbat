<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Type_style;
use App\Models\Sector_type;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class QuateController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Type $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'Admin.quate.';
        $this->routeName = 'quate.';
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
        $rows = Type::orderBy("created_at", "Desc")->get();


        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

            'en_style' => $request->input('en_style'),
            'ar_style' => $request->input('ar_style'),

        ];
        if ($request->input('editId')) {

            $data['type_id'] = $request->input('editId');
        }

        Type_style::create($data);




        return redirect()->route($this->routeName . 'edit', $request->input('editId'));
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

        $row = Type::where('id', '=', $id)->first();
        $styles = Type_style::where('type_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'indexDetails', compact('row', 'styles'));
    }
    public function editQuate($id)
    {
        $row = Type_style::where('id', '=', $id)->first();

        $rowId = $row->type_id;

        $sectors = Sector_type::where('type_style_id', '=', $id)->orderBy("created_at", "Desc")->get();

        return view($this->viewName . 'edit', compact('row', 'rowId', 'sectors'));
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

            'en_style' => $request->input('en_style'),
            'ar_style' => $request->input('ar_style'),

        ];
        if ($request->input('editId')) {

            $data['type_id'] = $request->input('editId');
        }

        Type_style::findOrFail($id)->update($data);




        return redirect()->route($this->routeName . 'edit', $request->input('editId'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Type_style::where('id', '=', $id)->first();
        $editId = $row->type_id;
        try {

            $row->delete();
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->route($this->routeName . 'edit', $editId);
    }

    /**
     * Announce Gallery
     */
    public function addSector(Request $request)
    {

        $data = [

            'en_sector' => $request->input('en_sector'),
            'ar_sector' => $request->input('ar_sector'),
            'type_style_id' => $request->input('type_style_id'),
            'aluminium_thickness' => $request->input('aluminium_thickness'),
            'glass' => $request->input('glass'),
            'price_per_meter' => $request->input('price_per_meter'),


        ];
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }

        Sector_type::create($data);


        return redirect()->back()->with('flash_success', $this->message);
    }

    public function updateSector(Request $request)
    {
        $id = $request->input('editData');
        $data = [

            'en_sector' => $request->input('en_sector'),
            'ar_sector' => $request->input('ar_sector'),
            'type_style_id' => $request->input('type_style_id'),
            'aluminium_thickness' => $request->input('aluminium_thickness'),
            'glass' => $request->input('glass'),
            'price_per_meter' => $request->input('price_per_meter'),


        ];
        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }
       
        Sector_type::findOrFail($id)->update($data);

        return redirect()->back()->with('flash_success', $this->message);
    }

    public function deleteSector($id)
    {
        $row = Sector_type::where('id', '=', $id)->first();
        $file = $row->image;

        try {

            $row->delete();
            File::delete($file);
        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'You cannot delete related with another...');
        }

        return redirect()->back()->with('flash_success', 'Data Has Been Deleted Successfully !');
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
		$imageName =$name;
		$uploadPath = public_path('uploads');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
