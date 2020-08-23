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
        <h6>{{$row->type->en_type}}</h6>

    </div>
    <div class="ms-panel-body">
        <div class="ms-auth-container row no-gutters">
            <div class="col-12 p-3">
                <form action="{{route('quate.update',$row->id)}}" method="POST">

                    {{ csrf_field() }}

                    @method('PUT')
                    <div class="ms-auth-container row">


                    <input type="hidden" name="editId" value="{{$rowId}}" >

                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ar Style</label>
                                        <div class="input-group">
                                            <input type="text" name="ar_style" value="{{$row->ar_style}}" id="Master EN Title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Style</label>
                                        <div class="input-group">
                                            <input type="text" name="en_style" value="{{$row->en_style}}" id="Master EN Title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                






                        <div class="input-group d-flex justify-content-end text-center">
                            <a href="{{ route('wathbat_project.index') }}" class="btn btn-dark mx-2"> Cancel</a>
                            <input type="submit" value="Add" class="btn btn-success ">
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- //tabs -->

<div class="tabbable-panel">
        <div class="tabbable-line">
            <ul class="nav nav-tabs " role="tablist">

                <li class="btn btn-light test">
                    <a href="#tab_default_1" class="active" data-toggle="tab" role="tab">
                        Sectors </a>
                </li>
               



            </ul>
            <div class="tab-content test ">
                <div class="tab-pane active" id="tab_default_1">
                    <!-- Add Category -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="ms-panel">
                                <div class="ms-panel-header d-flex justify-content-between">
                                    <button class="btn btn-dark" data-toggle="modal" data-target="#add-Annoucement-Gallery">Add  Sector</button>
                                </div>
                                <div class="ms-panel-body">

                                    <div class="table-responsive">
                                        <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Img</th>
                                                    <th scope="col">En Sector</th>
                                                    <th scope="col">Ar Sector</th>
                                                    <th scope="col">Type Style</th>
                                                    <th scope="col">Aluminium_thickness</th>
                                                    <th scope="col">Glass</th>
                                                    <th scope="col">price_per_meter</th>
                                                    <th scope="col"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sectors as $index => $sector)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td><img src="{{ asset('uploads/')}}/{{$sector->image }}" alt=""></td>
                                                    <td>{{$sector->en_sector}}</td>
                                                    <td>{{$sector->ar_sector}}</td>
                                                    <td>
                                                        @if($sector->style)
                                                        {{$sector->style->en_style}}
                                                        @endif
                                                    </td>
                                                    <td>{{$sector->aluminium_thickness}}</td>
                                                    <td>{{$sector->glass}}</td>
                                                    <td>{{$sector->price_per_meter}}</td>


                                                  

                                                    <td>
                                                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#add-Annoucement-Gallery{{$sector->id}}">edit</a>
                                                        <a href="#" onclick="destroy('this sector','{{$sector->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                                        <form id="delete_{{$sector->id}}" action="{{ route('deleteSector', $sector->id) }}" method="POST" style="display: none;">
                                                            @csrf

                                                            <button type="submit" value=""></button>
                                                        </form>
                                                    </td>



                                                </tr>



                                                <!-- ADD -->
                                                <div class="modal fade" id="add-Annoucement-Gallery{{$sector->id}}" tabindex="-1" role="dialog" aria-labelledby="addCat">
                                                    <div class="modal-dialog modal-lg " role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                                            </button>
                                                            <h3>Edit Sector</h3>
                                                            <div class="modal-body">


                                                                <div class="ms-auth-container row no-gutters">
                                                                    <div class="col-12 p-3">
                                                                        <form action="{{route('updateSector')}}" method="POST"  enctype="multipart/form-data" >
                                                                            {{ csrf_field() }}

                                                                            <input type="hidden" name="type_style_id" value="{{$row->id}}" >
                                                                            <input type="hidden" name="editData" value="{{$sector->id}}" >
                                                                            
                                                                            <div class="ms-auth-container row">
                                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="img-upload">
                                                                        <img src="{{ asset('uploads/')}}/{{$sector->image }}" alt="">
                                                                        <div class="upload-icon">
                                                                            <input type="file" name="pic" class="upload">
                                                                            <i class="fas fa-camera"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> En Sector </label>
                                                            <div class="input-group">
                                                                <input type="text" name="en_sector" value="{{$sector->en_sector}}" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> Ar Sector </label>
                                                            <div class="input-group">
                                                                <input type="text" name="ar_sector" value="{{$sector->ar_sector}}" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> aluminium_thickness</label>
                                                            <div class="input-group">
                                                                <input type="text" name="aluminium_thickness" value="{{$sector->aluminium_thickness}}" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> glass </label>
                                                            <div class="input-group">
                                                                <input type="text" name="glass" value="{{$sector->glass}}" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label>price_per_meter </label>
                                                            <div class="input-group">
                                                                <input type="text" name="price_per_meter" value="{{$sector->price_per_meter}}" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                <!-- /news gallery  Modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Cat-->
                </div>
              


                <!-- ADD -->
                <div class="modal fade" id="add-Annoucement-Gallery" tabindex="-1" role="dialog" aria-labelledby="addCat">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                            </button>
                            <h3>Add Sector </h3>
                            <div class="modal-body">


                                <div class="ms-auth-container row no-gutters">
                                    <div class="col-12 p-3">
                                        <form action="{{route('addSector')}}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <input type="hidden" name="type_style_id" value="{{$row->id}}" >
                                            <div class="ms-auth-container row">
                                            <div class="col-md-12">
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
                                                        <div class="upload-icon">

                                                            <label> En Sector </label>
                                                            <div class="input-group">
                                                                <input type="text" name="en_sector" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> Ar Sector </label>
                                                            <div class="input-group">
                                                                <input type="text" name="ar_sector" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> aluminium_thickness</label>
                                                            <div class="input-group">
                                                                <input type="text" name="aluminium_thickness" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label> glass </label>
                                                            <div class="input-group">
                                                                <input type="text" name="glass" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="upload-icon">

                                                            <label>price_per_meter </label>
                                                            <div class="input-group">
                                                                <input type="text" name="price_per_meter" class="form-control" id="Master AR Title">
                                                            </div>
                                                        </div>
                                                    </div>
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
              
                <!-- end./model -->







            </div>
        </div>
    </div>
<!-- EndTabs -->
</div>
</div>
        </div>
        <!-- /.row -->


</div>
@endsection