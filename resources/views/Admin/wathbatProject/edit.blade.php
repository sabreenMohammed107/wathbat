@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('Wathbat Home') }} </a></li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>edit Wathbat Projects</h6>

            </div>
            <div class="ms-panel-body">
                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('wathbat_project.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="img-upload">
                                            <img src="{{ asset('uploads/')}}/{{ $row->master_poster }}" alt="">
                                            <div class="upload-icon">
                                                <input type="file" name="pic" class="upload">
                                                <i class="fas fa-camera    "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Project AR name</label>
                                        <input type="text" name="project_ar_name" value="{{$row->project_ar_name}}" class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Project en name</label>
                                        <input type="text" name="project_en_name" value="{{$row->project_en_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Date
                                        </label>
                                        <br>
                                        <?php $date = date_create($row->project_date) ?>
                                        <input name="project_date" value="{{ date_format($date,'Y-m-d') }}" style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Project Type</label>
                                        <select name="project_type_id" class="form-control" id="">
                                            <option value="">
                                                @if($row->type)
                                                {{$row->type->project_en_type}}
                                                @endif
                                            </option>
                                            @foreach ($types as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->project_en_type }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alumital Type</label>
                                        <select name="alumital_type_id" class="form-control" id="">
                                            <option value="">
                                                @if($row->alumital)
                                                {{$row->alumital->project_en_type}}
                                                @endif</option>
                                            @foreach ($alumitals as $alumital)
                                            <option value='{{$alumital->id}}'>
                                                {{ $alumital->project_en_type }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AR Details</label>
                                        <div class="input-group">
                                            <textarea class="area" name="project_ar_details" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->project_ar_details}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Details</label>
                                        <div class="input-group">
                                            <textarea class="area" name="project_en_details" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->project_en_details}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AR About</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_ar_project" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->about_ar_project}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En About</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_en_project" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->about_en_project}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AR Customer</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_ar_customer" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->about_ar_customer}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Customer</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_en_customer" id="" cols="80" rows="8" placeholder="Type your notes here" name="">{{$row->about_en_customer}}</textarea>
                                        </div>
                                    </div>
                                </div>



                            </div>










                            <div class="input-group d-flex justify-content-end text-center">
                                <a href="{{ route('wathbat_project.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                                <input type="submit" value="save" class="btn btn-success ">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <!-- tabs  Project  -->


        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs " role="tablist">

                    <li class="btn btn-light test">
                        <a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
                            Project Gallery </a>
                    </li>
                    <li class="btn btn-light ">
                        <a href="#tab_default_2" data-toggle="tab" role="tab">
                            Project Slider </a>
                    </li>



                </ul>
                <!-- Add Project Slider -->
                <div class="tab-content test ">
                    <div class="tab-pane active" id="tab_default_1">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="ms-panel">
                                    <div class="ms-panel-header d-flex justify-content-between">
                                        <button class="btn btn-dark" data-toggle="modal" data-target="#add-Project-Gallery">add Project Gallery </button>
                                    </div>
                                    <div class="ms-panel-body">

                                        <div class="table-responsive">
                                            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Order</th>
                                                        <th scope="col"></th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach($galleries as $index => $gallery)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td><img src="{{ asset('uploads/')}}/{{ $gallery->image }}" alt=""></td>
                                                        <td>{{$gallery->order}}</td>




                                                        <td>

                                                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-Project-Gallery{{$gallery->id}}">edit</a>
                                                            <a href="#" onclick="destroy('this Gallery','{{$gallery->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                                            <form id="delete_{{$gallery->id}}" action="{{ route('deleteProjectGallery', $gallery->id) }}" method="POST" style="display: none;">
                                                                @csrf

                                                                <button type="submit" value=""></button>
                                                            </form>
                                                        </td>

                                                        <!-- ADD Project Gallery-->
                                                        <div class="modal fade" id="add-Project-Gallery{{$gallery->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                            <div class="modal-dialog modal-lg " role="document">
                                                                <div class="modal-content">
                                                                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                                    </button>
                                                                    <h3>Edit </h3>
                                                                    <div class="modal-body">


                                                                        <div class="ms-auth-container row no-gutters">
                                                                            <div class="col-12 p-3">
                                                                                <form action="{{route('updateProjectGallery')}}" method="POST" enctype="multipart/form-data">
                                                                                    {{ csrf_field() }}


                                                                                    <input type="hidden" name="project_id" value="{{$row->id}}">
                                                                                    <input type="hidden" name="gallery_id" value="{{$gallery->id}}">

                                                                                    <div class="ms-auth-container row">

                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <div class="img-upload">
                                                                                                    <img src="{{ asset('uploads/')}}/{{ $gallery->image }}" alt="">
                                                                                                    <div class="upload-icon">
                                                                                                        <input type="file" name="gallery" class="upload">
                                                                                                        <i class="fas fa-camera    "></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label>order</label>
                                                                                                <input type="text" name="order" value="{{$gallery->order}}" class="form-control">


                                                                                            </div>
                                                                                        </div>






                                                                                        <div class="input-group d-flex justify-content-end text-center">
                                                                                            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                                                            <input type="submit" value="Add" class="btn btn-success ">
                                                                                        </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Project Gallery Modal -->
                                                        @endforeach


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End -->
                    </div>
                    <!-- Add Project Gallery -->
                    <div class="tab-pane" id="tab_default_2">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="ms-panel">
                                    <div class="ms-panel-header d-flex justify-content-between">

                                        <button class="btn btn-dark" data-toggle="modal" data-target="#slider-model"> add Project Slider</button>
                                    </div>
                                    <div class="ms-panel-body">

                                        <div class="table-responsive">
                                            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Order</th>
                                                        <th scope="col"></th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sliders as $index => $slider)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td><img src="{{ asset('uploads/')}}/{{ $slider->image }}" alt=""></td>
                                                        <td>{{$slider->order}}</td>



                                                        <td>

                                                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#slider-model{{$slider->id}}">edit</a>
                                                            <a href="#" onclick="destroy('this slider','{{$slider->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                                            <form id="delete_{{$slider->id}}" action="{{ route('deleteProjectSlider', $slider->id) }}" method="POST" style="display: none;">
                                                                @csrf

                                                                <button type="submit" value=""></button>
                                                            </form>
                                                        </td>
                                                        <!-- ADD Project Gallery-->
                                                        <div class="modal fade" id="slider-model{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                            <div class="modal-dialog modal-lg " role="document">
                                                                <div class="modal-content">
                                                                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                                    </button>
                                                                    <h3>Edit Slider</h3>
                                                                    <div class="modal-body">


                                                                        <div class="ms-auth-container row no-gutters">
                                                                            <div class="col-12 p-3">
                                                                                <form action="{{route('updateProjectSlider')}}" method="POST" enctype="multipart/form-data">
                                                                                    {{ csrf_field() }}


                                                                                    <input type="hidden" name="project_id" value="{{$row->id}}">
                                                                                    <input type="hidden" name="slider_id" value="{{$slider->id}}">

                                                                                    <div class="ms-auth-container row">

                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <div class="img-upload">
                                                                                                    <img src="{{ asset('uploads/')}}/{{ $slider->image }}" alt="">
                                                                                                    <div class="upload-icon">
                                                                                                        <input type="file" name="slider" class="upload">
                                                                                                        <i class="fas fa-camera    "></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                        <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label>order</label>
                                                                                                <input type="text" name="order" value="{{$slider->order}}" class="form-control">


                                                                                            </div>
                                                                                        </div>






                                                                                        <div class="input-group d-flex justify-content-end text-center">
                                                                                            <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                                                            <input type="submit" value="Add" class="btn btn-success ">
                                                                                        </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Project Gallery Modal -->


                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- ADD Project Gallery-->
                    <div class="modal fade" id="add-Project-Gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                        <div class="modal-dialog modal-lg " role="document">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                </button>
                                <h3>Add </h3>
                                <div class="modal-body">


                                    <div class="ms-auth-container row no-gutters">
                                        <div class="col-12 p-3">
                                            <form action="{{route('addProjectGallery')}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="project_id" value="{{$row->id}}">

                                                <div class="ms-auth-container row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="img-upload">
                                                                <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                                                                <div class="upload-icon">
                                                                    <input type="file" name="gallery" class="upload">
                                                                    <i class="fas fa-camera    "></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>order</label>
                                                            <input type="text" name="order" class="form-control">


                                                        </div>
                                                    </div>






                                                    <div class="input-group d-flex justify-content-end text-center">
                                                        <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                                        <input type="submit" value="Add" class="btn btn-success ">
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Project Gallery Modal -->







                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->


</div>


<!-- ADD Project Slider-->
<div class="modal fade" id="slider-model" tabindex="-1" role="dialog" aria-labelledby="slider-model">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>Add Slider</h3>
            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('addProjectSlider')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="project_id" value="{{$row->id}}">

                            <div class="ms-auth-container row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="img-upload">
                                            <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
                                            <div class="upload-icon">
                                                <input type="file" name="slider" class="upload">
                                                <i class="fas fa-camera "></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>order</label>
                                        <input type="text" name="order" class="form-control">


                                    </div>
                                </div>






                                <div class="input-group d-flex justify-content-end text-center">
                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal" aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /Project Gallery Modal -->

@endsection