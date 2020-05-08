@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Setup</li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
<div class="col-md-12">



<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>Wathbat_Data</h6>
      
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>Phone</th>

                    <th>fax</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Map url </th>
                   
                    <th></th>

                </thead>
                <tbody>

                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->fax}}</td>

                        <td>{{$row->address}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->map_url}}</td>
                   

                        <td>
                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                data-target="#edit_Wathbat_Data{{$row->id}}">edit</a>
                           
                        </td>
                    </tr>
                    <!-- edit Wathbat Data -->
    <div class="modal fade" id="edit_Wathbat_Data" tabindex="-1" role="dialog" aria-labelledby="edit_Wathbat_Data">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>edit Wathbat Data</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('wathbat_data.update',$row->id)}}" method="POST" >
                            {{ csrf_field() }}

                            @method('PUT')
                                <div class="ms-auth-container row">
                                   
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>Phone</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="phone" value="{{$row->phone}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">fax</label>
                                            <div class="input-group">
                                                <input type="text" name="fax" value="{{$row->fax}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <div class="input-group">
                                                <input type="text" name="address" value="{{$row->address}}" id="Master EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="text" name="email" value="{{$row->email}}" id="Sub AR Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Map url</label>
                                            <div class="input-group">
                                                <input type="url" name="map_url" value="{{$row->map_url}}" id="Sub EN Title" class="form-control"
                                                    placeholder="">
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
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
        </div>
        <!-- /.row -->


</div>
@endsection