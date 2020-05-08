@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Clients</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6> Clients page</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>logo</th>

                            <th>AR Name </th>
                            <th>EN Name</th>
                            <th>url</th>
                            <th>Active</th>
                            <th></th>

                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img src="{{ asset('uploads/')}}/{{ $row->logo }}" alt=""></td>


                                <td>{{ $row->ar_name }}</td>
                                <td>{{ $row->en_name }}</td>
                                <td>{{ $row->url }}</td>
                                @if($row->active == 1)
                                <td><i class="fa fa-check"></i></td>
                                @else
                                <td><i class="fa fa-times"></i></td>
                                @endif

                                <td>
                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#editclient{{$row->id}}">edit</a>
                                    <a href="#" onclick="destroy('this client','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('client.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- edit Clients -->
                            <div class="modal fade" id="editclient{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editclient">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                        </button>
                                        <h3>edit Clients</h3>

                                        <div class="modal-body">


                                            <div class="ms-auth-container row no-gutters">
                                                <div class="col-12 p-3">
                                                    <form action="{{route('client.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        @method('PUT')
                                                        <div class="ms-auth-container row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="img-upload">
                                                                        <img src="{{ asset('uploads/')}}/{{ $row->logo }}" alt="">
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
                                                                        <label>AR Name</label>
                                                                    </div>

                                                                    <div class="input-group">
                                                                        <input type="text" name="ar_name" value="{{$row->ar_name}}" class="form-control" id="Master AR Title">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>EN Name</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="en_name" value="{{$row->en_name}}" id="Master EN Title" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>URL</label>
                                                                    <div class="input-group">
                                                                        <input type="url" name="url" value="{{$row->url}}" id="Sub EN Title" class="form-control" placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                            <div class="col-md-12">
                                                                <div class="custom-control custom-checkbox">
                                                                    <br>
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
                            <!-- /end -->
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
@section('modal')
<!-- Add Clients -->
<div class="modal fade" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclient">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>Add Clients</h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
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
                                            <label>AR Name</label>
                                        </div>

                                        <div class="input-group">
                                            <input type="text" name="ar_name" class="form-control" id="Master AR Title">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>EN Name</label>
                                        <div class="input-group">
                                            <input type="text" name="en_name" id="Master EN Title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>URL</label>
                                        <div class="input-group">
                                            <input type="url" name="url" id="Sub EN Title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <br>
                                        <input type="checkbox" id="" name="active" checked>
                                        <label for="category">active</label>
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
<!-- /end -->
@endsection