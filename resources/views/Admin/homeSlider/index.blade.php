@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home_Slider</li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
    <!-- /* start From this */ -->
<div class="col-md-12">

<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>home_slider</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addhomeslider"> add</a>
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>img</th>

                    <th>Master AR Title </th>
                    <th>Master EN Title</th>
                    <th>Url</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th></th>

                </thead>
                <tbody>
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td><img src="{{ asset('uploads/')}}/{{ $row->image }}" alt=""></td>
                        <td>{{ $row->master_ar_text }}</td>
                        <td>{{ $row->master_en_text }}</td>
                        <td>{{ $row->url }}</td>
                        <td>{{ $row->order }}</td>
                        @if($row->active == 1)
                          <td><i class="fa fa-check"></i></td>
                          @else
                          <td><i class="fa fa-times"></i></td>
                          @endif

                        <td>
                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#addhomeslider{{$row->id}}" 
                           >edit</a>
              <a href="#" onclick="destroy('this home-slider','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
              <form id="delete_{{$row->id}}" action="{{ route('home-slider.destroy', $row->id) }}"  method="POST" style="display: none;">
									@csrf
									@method('DELETE')
									<button type="submit" value=""></button>
									</form>
                        </td>
                    </tr>
                    <!-- Edit home slider -->
<div class="modal fade" id="addhomeslider{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="addhomeslider{{$row->id}}">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>Edit home slider</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="{{route('home-slider.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @method('PUT')
                                <div class="ms-auth-container row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="img-upload">
                                                <img src="{{ asset('uploads')}}/{{ $row->image }}" alt="">
                                                <div class="upload-icon">
                                                    <input type="file" name="pic" class="upload">
                                                    <i class="fas fa-camera    "></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>Master AR Title</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="master_ar_text" value="{{$row->master_ar_text}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">Master EN Text</label>
                                            <div class="input-group">
                                                <input type="text" name="master_en_text" value="{{$row->master_en_text}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                   
                               
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div class="input-group">
                                                <input type="url" name="url" value="{{$row->url}}" id="Sub EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Order </label>
                                            <div class="input-group">
                                                <input type="number" name="order" value="{{$row->order}}" id="Sub EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                        @if($row->active == 1)
                                        <input type="checkbox" id="" name="active" checked>
                                        @else
                                        <input type="checkbox" id="" name="active">
                                        @endif
                                            <label for="category">active</label>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="input-group d-flex justify-content-end text-center">
                                   
                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /end -->
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
  <!-- /* End From this */ -->
        </div>
        <!-- /.row -->


</div>
@endsection


@section('modal')
<!-- Add home slider -->
<div class="modal fade" id="addhomeslider" tabindex="-1" role="dialog" aria-labelledby="addhomeslider">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>Add home slider</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('home-slider.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                         
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
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>Master AR Title</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="master_ar_text"  class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">Master EN Text</label>
                                            <div class="input-group">
                                                <input type="text" name="master_en_text"  class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                   
                               
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>URL</label>
                                            <div class="input-group">
                                                <input type="url" name="url"  id="Sub EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Order </label>
                                            <div class="input-group">
                                                <input type="number" name="order" id="Sub EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                    
                                        <input type="checkbox" id="" name="active">
                                      
                                            <label for="category">active</label>
                                        </div>

                                    </div>
                                </div>
                                
                                <div class="input-group d-flex justify-content-end text-center">
                                   
                                    <input type="button" value="Cancel" class="btn btn-dark mx-2" data-dismiss="modal"
                                        aria-label="Close">
                                    <input type="submit" value="Add" class="btn btn-success ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /end -->
@endsection