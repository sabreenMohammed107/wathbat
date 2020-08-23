@extends('Customer.webLayout.web')
@section('style')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
@endSection
@section('content')
<!-- hero slider area -->
<div class="page-header-section set-bg" data-setbg="{{ asset('webasset/img/project.jpg')}}">
    <div class="container">
        <h1 class="header-title">{{ __('titles.quote') }}<span>.</span></h1>
    </div>
</div>
</section>
<!-- Hero section end -->
<style>
    .dl-horizontal dt {

        text-align: left;

    }
</style>
<!-- Get a Quotation section start -->
<section class="spad " id="printableArea" style="padding:0px;">
    <div class="section-title col-lg-12" style="padding-top:50px">
    </div>
    <div class="container set-bg">
        <div class="invoice-header">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-xs-12">

                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object logo" style="max-height: 70px;border-radius: 10px;" src="{{ asset('webasset/img/logo.jpeg')}}" />
                        </div>
                        <ul class="media-body list-unstyled">
                            <li><strong>Wathbat Al-Tamayoz</strong></li>
                            <li>Wathba For Aluminum</li>
                            <li>New Cairo</li>
                            <li>info@wathba.com</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="invoice-body">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Services / Products</h3>
                </div>
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Item / Details</th>
                            <th class="text-center colfix">Unite Price</th>
                            <th class="text-center colfix">Quantity</th>
                            <th class="text-center colfix">preview</th>
                            <th class="text-center colfix">Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($value as $row)
                        <tr>
                            <td>
                                <h6><b>Aluminum Type :</b> <span>{{$row->sector->aluminium_thickness}}</span></h6>
                                <h6><b>Dimensions :</b> <span>Height : {{$row->data['height']}} cm * Width : {{$row->data['width']}} cm</span></h6>
                                <h6><b>Type :</b> <span>@if(app()->getLocale()=='en'){{$row->type->en_type}}@else{{$row->type->ar_type}}@endif" </span></h6>
                                <h6><b>Type Style :</b> <span>@if(app()->getLocale()=='en') {{$row->style->en_style}}@else{{$row->style->ar_style}}@endif</span></h6>
                                <h6><b>Sector :</b> <span>@if(app()->getLocale()=='en') {{$row->sector->en_sector}} @else{{$row->sector->ar_sector}}@endif</span></h6>
                                <h6><b>Price Per Meter :</b> <span> {{$row->sector->price_per_meter}} </span></h6>

                                <h6><b>Glass :</b> <span>{{$row->sector->glass}}</span></h6>
                                <h6><b>Color :</b> <input type="color" name="color" style="-webkit-print-color-adjust: exact; " value="{{$row->data['color']}}"></h6>
                            </td>
                            <td class="text-right">
                                <span class="mono">{{ number_format($row->total, 2, ',', '.') }} -SAR </span>
                                <br>
                                <small class="text-muted">{{ number_format($row->total, 2, ',', '.') }} -SAR</small>
                            </td>
                            <td class="text-center">
                                <span class="mono">{{$row->amount}}</span>
                                <br>
                                <small class="text-muted"></small>
                            </td>
                            <td  style="width: 21%;">
                                <div>
                                    <img style="height:150px;box-shadow: 4px 2px 4px 2px #ccc;background:#fff;" src="{{ asset('uploads/')}}/{{$row->sector->image }}">
                                </div>
                                <p style="width:100%">width :{{$row->data['width']}} cm / height :{{$row->data['height']}} cm</p>

                            </td>
                            <td class="text-right">
                                <strong class="mono">{{ number_format($row->total*$row->amount, 2, ',', '.') }} -SAR</strong>
                                <br>
                                <small class="text-muted mono">{{ number_format($row->total*$row->amount, 2, ',', '.') }} -SAR</small>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="panel panel-default">
                <table class="table table-bordered table-condensed">
                    <thead style="background-color: #eee;font-size:16px;">
                        <tr >
                            <td class="text-center col-xs-1"> Total Items Quantity</td>
                            <!-- <td class="text-center col-xs-1">Discount</td>
                            <td class="text-center col-xs-1">Total</td> -->
                            <td class="text-center col-xs-1">Net Value</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center rowtotal mono">{{count($value)}}</th>
                            <!-- <th class="text-center rowtotal mono">-EG 1,800.00</th>
                            <th class="text-center rowtotal mono">EG 16,440.00</th> -->
                            <?php
                            $final = 0;
                            foreach ($value as $val) {
                                $final += $val->total * $val->amount;
                            }
                            ?>
                            <th class="text-center rowtotal mono">{{ number_format($final, 2, ',', '.') }} -SAR</th>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-8 ">
                    <form class="contact-form" style="margin-bottom: 10px;">
                        <button id="print_button" onclick="printDiv('printableArea')" class="site-btn sb-dark">{{ __('titles.print') }}</button>
                    </form>
                </div>
            </div>


        </div>

    </div>

</section>
<!-- Get a Quotation section end -->

@endsection
@section('scripts')
<script>
    function printDiv(divName) {

        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    $(document).ready(function() {



    });
</script>
@endsection