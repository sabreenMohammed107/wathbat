<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_slider;
use App\Models\Wathbat_project;
use App\Models\Wathbat_client;
use App\Models\Project_slider;
use App\Models\Project_gallery;
use App\Models\Customer_review;
use App\Models\Project_type;
use App\Models\Contact_message;
use App\Models\Wathbat_portfolio;
use App\Models\Portfolio_type;
use App\Models\Type;
use App\Models\Type_style;
use App\Models\Sector_type;
use App\Models\Wathbat_in_number;
use Illuminate\Database\QueryException;

class IndexController extends Controller
{
    public function index()
    {

        $sliders = Home_slider::where('active', '=', 1)->orderBy("order", "asc")->get();
        $projects = Wathbat_project::with('alumital')->orderBy("created_at", "Desc")->take(6)->get();
        $clients = Wathbat_client::where('active', '=', 1)->orderBy("created_at", "Desc")->get();
        //
        $types = Type::all();
        
        return view('Customer.home.index', compact('sliders', 'projects', 'clients', 'types'));
    }

    public function projectDetails($id)
    {
        $project = Wathbat_project::where('id', '=', $id)->first();
        $sliders = Project_slider::where('project_id', '=', $id)->get();
        $galleries = Project_gallery::where('project_id', '=', $id)->take(8)->inRandomOrder(rand(10, 100))->get();
        return view('Customer.home.project', compact('project', 'sliders', 'galleries'));
    }

    public function about()
    {
        $reviews = Customer_review::orderBy("created_at", "Desc")->get();
        return view('Customer.home.about', compact('reviews'));
    }

    public function services()
    {
        return view('Customer.home.service');
    }
    public function portfolio()
    {
        $numbers = Wathbat_in_number::all();
        $portoGalleries = Wathbat_portfolio::take(10)->inRandomOrder(rand(10, 100))->get();
        $types = Project_type::all();
        $portoTypes = Portfolio_type::all();
        $projects = Wathbat_project::with('alumital')->orderBy("created_at", "Desc")->get();
        return view('Customer.home.portfolio', compact('projects', 'types', 'portoGalleries', 'portoTypes', 'numbers'));
    }


    public function contact()
    {
        return view('Customer.home.contact');
    }

    public function contactForm(Request $request)
    {
        try {

            $user =  Contact_message::create($request->all());


            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        } catch (QueryException $q) {

            return redirect()->back()->with('message', 'You cannot send Empty Message...');
        }
    }


    public function allPortoGallery()
    {
        $portoTypes = Portfolio_type::all();
        $portoGalleries = Wathbat_portfolio::take(10)->inRandomOrder(rand(10, 100))->get();

        return view('Customer.home.portofolioGallery', compact('portoGalleries', 'portoTypes'))->render();
    }

    public function PortoGalleryType(Request $request)
    {

        if ($request->ajax()) {
            $portoTypes = Portfolio_type::all();
            $gallerytype = $request->input('galleryId');
            $portoGalleries = Wathbat_portfolio::where('portfolio_type_id', '=', $gallerytype)->take(10)->inRandomOrder(rand(10, 100))->get();

            return view('Customer.home.portofolioGallery', compact('portoGalleries', 'portoTypes'))->render();
        }
    }

    public function allProjects()
    {
        $types = Project_type::all();
        $projects = Wathbat_project::with('type')->orderBy("created_at", "Desc")->get();

        return view('Customer.home.portofolioProjects', compact('projects', 'types'))->render();
    }

    public function ProjectType(Request $request)
    {

        if ($request->ajax()) {
            $types = Project_type::all();
            $typeId = $request->input('typeId');
            $projects = Wathbat_project::with('type')->where('project_type_id', '=', $typeId)->orderBy("created_at", "Desc")->get();

            //gallery

            return view('Customer.home.portofolioProjects', compact('projects', 'types'))->render();
        }
    }

    /**
     * dependace sub category
     */
    function fetchCat(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $lang = $request->get('lang');
        $data = Type_style::where('type_id', $value)->get();
        if ($lang === 'en') {
            $output = '<option value="">Select Style</option>';
            foreach ($data as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->en_style . '</option>';
            }
        } else {
            $output = '<option value="">إختر الشكل</option>';
            foreach ($data as $row) {

                $output .= '<option value="' . $row->id . '">' . $row->ar_style . '</option>';
            }
        }
       
        echo $output;
    }

    function fetchCity(Request $request)
    {

        $select = $request->get('select');
        $value = $request->get('value');
        $lang = $request->get('lang');

        $data = Sector_type::where('type_style_id', $value)->get();
        if ($lang === 'en') {
            $output = '<option value="">Select sector</option>';
      
        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->en_sector . '</option>';
        }
    } else {
        $output = '<option value="">إختر القطاع</option>';
        foreach ($data as $row) {

            $output .= '<option value="' . $row->id . '">' . $row->ar_sector . '</option>';
        }
      
    }
    echo $output;
}
    function fetchLastes(Request $request)
    {
        $dataAjax = array();
        $select = $request->get('select');
        $value = $request->get('value');

        $data = Sector_type::where('id', $value)->first();

        array_push($dataAjax, $data->aluminium_thickness);
        array_push($dataAjax, $data->glass);
        array_push($dataAjax, $data->price_per_meter);

        return ($dataAjax);
    }

    public function quoteForm(Request $request)
    {

        $price=0;
        $data = [
            'height' => $request->input('height'),
            'width' => $request->input('width'),
            'aluminium_thickness' => $request->input('aluminium_thickness'),
            'glass' => $request->input('glass'),
            'color' => $request->input('color'),



        ];
        if ($request->input('type_id')) {
            $type = Type::where('id', '=', $request->input('type_id'))->first();
            $data['type_id'] = $request->input('type_id');
        }
        if ($request->input('type_style')) {
            $style = Type_style::where('id', '=', $request->input('type_style'))->first();
            $data['type_style'] = $request->input('type_style');
        }
        if ($request->input('sector_type')) {
            $sector = Sector_type::where('id', '=', $request->input('sector_type'))->first();
            $price=$sector->price_per_meter;
            $data['sector_type'] = $request->input('sector_type');
        }
        $width=($request->input('width'))*10;
        $height=($request->input('height'))*10;
        $avg=(($width)*($height))/1000000;
        $total =$avg * $price;
        $data['total'] = $total;
        // return($data);
        return view('Customer.home.quote', compact('data', 'type', 'style', 'sector'));
    }
}
