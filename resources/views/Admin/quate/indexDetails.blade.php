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
        <h6>{{$row->en_type}}</h6>
        <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#addnumber"> add </a>    
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>ar Style</th>

                    <th>En Style</th>
                    <th>Type</th>
                    
                    <th></th>

                </thead>
                <tbody>
                @foreach($styles as $index => $style)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$style->ar_style}}</td>
                        <td>{{$style->en_style}}</td>
                        <td>
                            @if($style->type)
                            {{$style->type->en_type}}
                            @endif
                        </td>
                       

                        <td>
                        <a href="{{ route('editQuate',$style->id) }}" class="btn btn-info d-inline-block">edit</a>
                                    <a href="#" onclick="destroy('this News','{{$style->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$style->id}}" action="{{ route('quate.destroy', $style->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" value=""></button>
                                    </form>
                            
                        </td>
                    </tr>
    
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
<div class="modal fade" id="addnumber" tabindex="-1" role="dialog" aria-labelledby="addnumber">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

            </button>
            <h3>Add Style</h3>

            <div class="modal-body">


                <div class="ms-auth-container row no-gutters">
                    <div class="col-12 p-3">
                        <form action="{{route('quate.store')}}" method="POST" >
                            {{ csrf_field() }}
                            <div class="ms-auth-container row">

                              
                               <input type="hidden" name="editId" value="{{$row->id}}" >
                               
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ar Style</label>
                                        <div class="input-group">
                                            <input type="text" name="ar_style" id="Master EN Title" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>En Style</label>
                                        <div class="input-group">
                                            <input type="text" name="en_style" id="Master EN Title" class="form-control" placeholder="">
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