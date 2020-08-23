<h3 style="color:white">Cart Details</h3>
<h4 style="color:white">Total Products : <span> @if(Session::has('qoutsSession')){{count(Session::get('qoutsSession'))}}@endif items</span></h4>
<div class="row">
      <div class="col-lg-12 col-md-12">
            <table class="table" style="color:white">
                  <thead>
                        <tr>
                              <th scope="col">TYPE</th>
                              <th scope="col">STYLE</th>
                              <th scope="col">SECTOR</th>
                              <th scope="col">UNIT PRICE</th>
                              <th scope="col">QTY</th>
                              <th scope="col">DELETE</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($value as $data)
                        <tr>
                              <td>@if(app()->getLocale()=='en')
                                    {{$data->type->en_type}}
                                    @else
                                    {{$data->type->ar_type}}
                                    @endif</td>
                              <td>@if(app()->getLocale()=='en')
                                    {{$data->style->en_style}}
                                    @else
                                    {{$data->style->ar_style}}
                                    @endif</td>
                              <td>@if(app()->getLocale()=='en')
                                    {{$data->sector->en_sector}}
                                    @else
                                    {{$data->sector->ar_sector}}
                                    @endif</td>
                              <td>{{$data->total}}</td>

                              <td>{{$data->amount}}</td>
                              <td><button class="btn" title="Delete" onclick="removeItem('{{$data->id}}')" ><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                        </tr>
                        @endforeach

                  </tbody>
            </table>
      </div>
      <!--<div class="col-lg-6 col-md-6">
							<form class="contact-form">
								<button class="site-btn sb-light get-quote">Get Offer</button>
							</form>
						</div>
						<div class="col-lg-6 col-md-6">
							<form class="contact-form">
								<button class="site-btn sb-light get-quote">Clear Cart</button>
							</form>
						</div>-->
      <div class="col-lg-12">
      <form action="{{route('quoteForm')}}" method="GET" >
                  <button class="site-btn sb-light">Get Offer</button>
      </form>
                  <button class="site-btn sb-light" onclick="removeAll()">Clear Cart</button>
      </div>
</div>