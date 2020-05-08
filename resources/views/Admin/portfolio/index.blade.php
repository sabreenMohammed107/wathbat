@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Portfolio</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6>Wathbat_Portfolio</h6>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#edit_Portfolio"> add</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>Image</th>

                            <th>Portfolio type </th>
                            <th>order</th>
                         
                            <th></th>

                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img src="{{ asset('uploads/')}}/{{ $row->image }}" alt=""></td>
                                <td>
                                    @if($row->type)
                                    {{ $row->type->en_type }}
                                    @endif
                                </td>
                                <td>{{$row->order}}</td>
                               


                                <td>
                                    <a href="#" class="btn btn-info d-inline-block" data-toggle="modal" data-target="#edit_Portfolio{{$row->id}}">edit</a>
                                    <a href="#" onclick="destroy('this Portfolio','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('portfolio.destroy', $row->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                                </td>
                            </tr>
                            <!-- edit_Portfolio -->
                            <div class="modal fade" id="edit_Portfolio{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="edit_Portfolio{{$row->id}}">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                                        </button>
                                        <h3>edit Portfolio</h3>

                                        <div class="modal-body">


                                            <div class="ms-auth-container row no-gutters">
                                                <div class="col-12 p-3">
                                                    <form action="{{route('portfolio.update',$row->id)}}" method="POST" enctype="multipart/form-data">
                                                        {{ csrf_field() }}

                                                        @method('PUT')
                                                        <div class="ms-auth-container row">

                                                            <div class="col-md-6 col-sm-12">
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
                                                            <div class="col-md-6"></div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label>Portfolio type</label>
                                                                    <select name="portfolio_type_id" class="form-control" id="">
                                                                        <option value="">
                                                                            @if($row->type)
                                                                            {{ $row->type->en_type }}
                                                                            @endif</option>
                                                                        @foreach ($types as $type)
                                                                        <option value='{{$type->id}}'>
                                                                            {{ $type->en_type }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6"></div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>order</label>
                                                                    <div class="input-group">
                                                                        <input type="number" name="order" value="{{$row->order}}" id="Master EN Title" class="form-control" placeholder="">
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

<!-- edit_Portfolio -->
<div class="modal fade" id="edit_Portfolio" tabindex="-1" role="dialog" aria-labelledby="edit_Portfolio">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>Add Portfolio</h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="ms-auth-container row">

                                <div class="col-md-6 col-sm-12">
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
                                <div class="col-md-6"></div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Portfolio type</label>
                                        <select name="portfolio_type_id" class="form-control" id="">
                                            <option value="">select....</option>
                                            @foreach ($types as $type)
                                            <option value='{{$type->id}}'>
                                                {{ $type->en_type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>order</label>
                                        <div class="input-group">
                                            <input type="number" name="order" id="Master EN Title" class="form-control" placeholder="">
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
@endsection