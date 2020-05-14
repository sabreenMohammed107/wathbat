@extends('Admin.adminLayout.main')

@section('crumb')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=""><i class="material-icons"></i> {{ __('Wathbat Home') }} </a></li>
        <li class="breadcrumb-item active" aria-current="page">Projects</li>
    </ol>
</nav>

@endsection

@section('content')

<div class="row">
    <div class="col-md-12">



        <div class="ms-panel">
            <div class="ms-panel-header d-flex justify-content-between">
                <h6> Wathbat Projects</h6>
                <a href="{{ route('wathbat_project.create') }}" class="btn btn-dark">add</a>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                        <thead>
                            <th>#</th>
                            <th>Master Poster</th>
                            <th>Project AR Name </th>
                            <th>Project EN Name</th>

                            <th>Project date</th>
                            <th>Project Type</th>
                            <th>Alumital Type</th>
                          
                          
                            <th></th>


                        </thead>
                        <tbody>
                            @foreach($rows as $index => $row)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td><img src="{{ asset('uploads/')}}/{{ $row->master_poster }}" alt=""></td>

                                <td>{{$row->project_ar_name}}</td>
                                <td>{{$row->project_en_name}}</td>

                                <td>
                                    <?php $date = date_create($row->project_date) ?>
                                    {{ date_format($date,"d-m-Y") }}
                                </td>
                                <td>{{$row->alumital->project_en_type}}</td>
                                <td>{{$row->type->project_en_type}}</td>
                            
                              



                                <td>
                                    <a href="{{ route('wathbat_project.edit',$row->id) }}" class="btn btn-info d-inline-block">edit</a>
                                    <a href="#" onclick="destroy('this wathbat_project','{{$row->id}}')" class="btn d-inline-block btn-danger">delete</a>
                                    <form id="delete_{{$row->id}}" action="{{ route('wathbat_project.destroy', $row->id) }}" method="POST" style="display: none;">
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