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
        <h6>Quate</h6>
      
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
                        <a href="{{ route('quate.edit',$row->id) }}" class="btn btn-info d-inline-block" 
                           >Select</a>
                            
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