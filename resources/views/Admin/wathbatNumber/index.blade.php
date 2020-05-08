@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wathbat_in_Numbers</li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
<div class="col-md-12">



<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>Wathbat_in_Numbers</h6>
      
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>En Name</th>

                    <th>Ar Name</th>
                    <th>value</th>
                   
                    <th></th>

                </thead>
                <tbody>
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->en_name}}</td>
                        <td>{{$row->ar_name}}</td>

                        <td>{{$row->value}}</td>
                    

                        <td>
                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                data-target="#edit_Wathbat_in_Numbers{{$row->id}}">edit</a>
                           
                        </td>
                    </tr>
                    <!-- edit_Wathbat_in_Numbers -->
    <div class="modal fade" id="edit_Wathbat_in_Numbers{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_Wathbat_in_Numbers{{$row->id}}">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>edit Wathbat_in_Numbers</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('wathbat-number.update',$row->id)}}" method="POST" >
                            {{ csrf_field() }}

                            @method('PUT')
                                <div class="ms-auth-container row">
                                   
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>EN Name</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" name="en_name" value="{{$row->en_name}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">Ar Name</label>
                                            <div class="input-group">
                                                <input type="text" name="ar_name" value="{{$row->ar_name}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>value</label>
                                            <div class="input-group">
                                                <input type="number" name="value" value="{{$row->value}}" id="Master EN Title" class="form-control"
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
    </main>
    <!-- /Add Sub Modal -->

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