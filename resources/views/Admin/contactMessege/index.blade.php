@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contacts_Messages</li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
<div class="col-md-12">



<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>Contacts_Messages</h6>
      
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>mobile</th>
                    <th>Email</th>
                    <th>Massage</th>
                    <th>Created Date </th>
                   
                    <th></th>

                </thead>
                <tbody>

                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->mobile}}</td>

                        <td>{{$row->email}}</td>
                        <td>{{ Str::limit($row->messege, 100,'...') }}</td>
                        <td><?php $date = date_create($row->created_at) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                </td>
                   

                        <td>
                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                data-target="#edit_Contacts_Messages{{$row->id}}">show</a>
                                <a href="#" onclick="destroy('this contact_messege','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('contact_messege.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                           
                        </td>
                    </tr>
                    <!-- edit Contacts_Messages -->
    <div class="modal fade" id="edit_Contacts_Messages{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_Contacts_Messages">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>edit Contacts Messages</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                            <form action="">
                                <div class="ms-auth-container row">
                                   
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>Name</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="text" readonly name="name" value="{{$row->name}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">moblie</label>
                                            <div class="input-group">
                                                <input type="text" readonly name="mobile" value="{{$row->mobile}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="text" readonly name="email" value="{{$row->email}}" id="Sub AR Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Massage</label>
                                            <div class="input-group">
                                                <textarea type="text" name="messege" readonly id="Sub EN Title" class="form-control"
                                                   >{{$row->messege}}</textarea>
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