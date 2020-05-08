<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wathbat_client;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
class ClientController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Wathbat_client $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'Admin.client.';
        $this->routeName = 'client.';
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
        $rows = Wathbat_client::orderBy("created_at", "Desc")->get();


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
        $active = 0;


        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [
            'url' => $request->input('url'),
            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
           
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['logo'] = $this->UplaodImage($image);
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
        //
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
        $active = 0;


        if ($request->input('active') == 'on') {
            $active = 1;
        }
        $data = [
            'url' => $request->input('url'),
            'en_name' => $request->input('en_name'),
            'ar_name' => $request->input('ar_name'),
           
            'active' => $active,

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['logo'] = $this->UplaodImage($image);
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
        $row=Wathbat_client::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->logo;
      
        $file_name = public_path('uploads/'.$file);
             
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
		$imageName =$name;
		$uploadPath = public_path('uploads');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
