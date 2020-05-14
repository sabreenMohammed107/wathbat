@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('Wathbat Home') }} </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Projects </li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
<div class="col-md-12">



<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>add Wathbat Projects</h6>

    </div>
    <div class="ms-panel-body">
        <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
            <form action="{{route('wathbat_project.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                <div class="ms-auth-container row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="img-upload">
                                            <img src="{{ asset('adminasset/img/default-user.gif')}}" alt="">
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
                                        <input type="text" name="project_ar_name"  class="form-control">
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="exampleInputPassword1" for="exampleCheck1">Project en name</label>
                                        <input type="text" name="project_en_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Date
                                        </label>
                                        <br>
                                        <input name="project_date"  style="height: 40px; border-radius: 5px;" class="col-md-12 exampleInputPassword1" for="exampleCheck1" data-date-format="dd/mm/yyyy" type="date" id="datepicker">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Project Type</label>
                                        <select name="project_type_id" class="form-control" id="">
                                            <option value="">select...</option>
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
                                            <option value="">select...</option>
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
                                            <textarea class="area" name="project_ar_details" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Details</label>
                                        <div class="input-group">
                                            <textarea class="area" name="project_en_details" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AR About</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_ar_project" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En About</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_en_project" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>AR Customer</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_ar_customer" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Customer</label>
                                        <div class="input-group">
                                            <textarea class="area" name="about_en_customer" id="" cols="80" rows="8" placeholder="Type your notes here" name="" ></textarea>
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
</div>     </div> 
        </div>
        <!-- /.row -->


</div>
@endsection