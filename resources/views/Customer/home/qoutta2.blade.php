<div class="col-25">
      <div class="container" style="padding-bottom:35px; background-color: brown ;">
            <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>@if(Session::has('qoutsSession')){{count(Session::get('qoutsSession'))}}@endif</b></span></h4>

            @foreach($value as $data)
            <p><a href="#">{{$data->id}} - {{$data->total}}</a> <span class="price">{{$data->amount}}</span> </p>

            <div class="">
                  <p><a href="{{url('removeItem',$data->id)}}">X</a> <span class="price">{{$data->type}}</span> </p>
            </div>

            <hr>
            @endforeach




          
            <p> <a class="site-btn sb-light get-quote" href="{{url('quoteFormTest')}}">get Qoute</a> </p>
      </div>
</div>