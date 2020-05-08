<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wathbat_portfolio;
use App\Models\Portfolio_type;
use File;
use DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class PortfolioController extends Controller
{
    protected $object;

    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Wathbat_portfolio $object)
    {
        $this->middleware('auth');

        $this->object = $object;
        $this->viewName = 'Admin.portfolio.';
        $this->routeName = 'portfolio.';
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
        $rows = Wathbat_portfolio::orderBy("order", "Desc")->get();

        $types = Portfolio_type::all();
        return view($this->viewName . 'index', compact('rows','types'));
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
            'order' => $request->input('order'),
            

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }
        if($request->input('portfolio_type_id')){

            $data['portfolio_type_id']=$request->input('portfolio_type_id');
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
        $data = [
            'order' => $request->input('order'),
            

        ];

        if ($request->hasFile('pic')) {
            $image = $request->file('pic');

            $data['image'] = $this->UplaodImage($image);
        }
        if($request->input('portfolio_type_id')){

            $data['portfolio_type_id']=$request->input('portfolio_type_id');
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
        $row=Wathbat_portfolio::where('id', '=', $id)->first();
        // Delete File ..
        $file = $row->image;
      
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
