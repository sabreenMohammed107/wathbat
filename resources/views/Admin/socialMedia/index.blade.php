@extends('Admin.adminLayout.main')

@section('crumb')
    
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.html"><i class="material-icons"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social_Media</li>
    </ol>
  </nav>

@endsection

@section('content')

<div class="row">
<div class="col-md-12">



<div class="ms-panel">
    <div class="ms-panel-header d-flex justify-content-between">
        <h6>Social_Media</h6>
      
    </div>
    <div class="ms-panel-body">
        <div class="table-responsive">
            <table id="courseEval" class="dattable table table-striped thead-dark  w-100">
                <thead>
                    <th>#</th>
                    <th>Facebook url</th>

                    <th>Twitter url</th>
                    <th>Linkedin url</th>
                    <th>Instgram url</th>
                    <th>googleplus url </th>
                    <th>Youtube url</th>
                    <th></th>

                </thead>
                <tbody>
                @foreach($rows as $index => $row)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$row->facebook_url}}</td>
                        <td>{{$row->twitter_url}}</td>

                        <td>{{$row->linkedin_url}}</td>
                        <td>{{$row->instgram_url}}</td>
                        <td>{{$row->googleplus_url}}</td>
                        <td>{{$row->youtube_url}}</td>

                        <td>
                            <a href="#" class="btn btn-info d-inline-block" data-toggle="modal"
                                data-target="#editSocialMedia{{$row->id}}">edit</a>
                            
                        </td>
                    </tr>
                     <!-- edit Social Media -->
    <div class="modal fade" id="editSocialMedia{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editSocialMedia{{$row->id}}">
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">X

                </button>
                <h3>edit Social Media</h3>

                <div class="modal-body">


                    <div class="ms-auth-container row no-gutters">
                        <div class="col-12 p-3">
                        <form action="{{route('social-media.update',$row->id)}}" method="POST" >
                            {{ csrf_field() }}

                            @method('PUT')
                                <div class="ms-auth-container row">
                                   
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="upload-icon">
                                                <label>Facebook url</label>
                                            </div>

                                            <div class="input-group">
                                                <input type="url" name="facebook_url" value="{{$row->facebook_url}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="example2">Twitter url</label>
                                            <div class="input-group">
                                                <input type="url" name="twitter_url" value="{{$row->twitter_url}}" class="form-control" id="Master AR Title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Linkedin url</label>
                                            <div class="input-group">
                                                <input type="url" name="linkedin_url" value="{{$row->linkedin_url}}" id="Master EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Instgram url</label>
                                            <div class="input-group">
                                                <input type="url" name="instgram_url" value="{{$row->instgram_url}}" id="Sub AR Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>googleplus url</label>
                                            <div class="input-group">
                                                <input type="url" name="googleplus_url" value="{{$row->googleplus_url}}" id="Sub EN Title" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube url</label>
                                            <div class="input-group">
                                                <input type="url" name="youtube_url" value="{{$row->youtube_url}}" id="Sub EN Title" class="form-control"
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