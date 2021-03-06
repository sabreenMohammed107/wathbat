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
        <h6>Quotation Type</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addclient"> add</a>
      
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>ar Type</th>

                    <th>En Type</th>
                    
                    <th></th>

                </thead>
                <tbody>
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->ar_type}}</td>
                        <td>{{$row->en_type}}</td>
                       

                        <td>
                        <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#editclient{{$row->id}}">edit</a>
                                    <a href="#" onclick="destroy('this Type','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('quate-type.destroy', $row->id) }}" method="POST" style="display: none;">
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
                                        <h3>edit Type</h3>

                                        <div class="modal-body">


                                            <div class="ms-auth-container row no-gutters">
                                                <div class="col-12 p-3">
                                                    <form action="{{route('quate-type.update',$row->id)}}" method="POST" >
                                                        {{ csrf_field() }}

                                                        @method('PUT')
                                                        <div class="ms-auth-container row">
                                                          
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <div class="upload-icon">
                                                                        <label>AR Type</label>
                                                                    </div>

                                                                    <div class="input-group">
                                                                        <input type="text" name="ar_type" value="{{$row->ar_type}}" class="form-control" id="Master AR Title">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>EN Type</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="en_type" value="{{$row->en_type}}" id="Master EN Title" class="form-control" placeholder="">
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
            <h3>Add Type</h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('quate-type.store')}}" method="POST" >
                            {{ csrf_field() }}
                            <div class="ms-auth-container row">
                         
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="upload-icon">
                                            <label>AR Type</label>
                                        </div>

                                        <div class="input-group">
                                            <input type="text" name="ar_type" class="form-control" id="Master AR Title">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>EN Type</label>
                                        <div class="input-group">
                                            <input type="text" name="en_type" id="Master EN Title" class="form-control" placeholder="">
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
<!-- /end -->
@endsection