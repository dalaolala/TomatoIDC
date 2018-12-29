@extends('themes.default.layouts.home')

@section('content')

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 600px; background-image: url({{asset('assets/themes/argon/img/computer-1149148.jpg')}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <p class="text-white" style="font-size: 1rem">欢迎回来</p>
                    <h1 class="display-2 text-white">{{Auth::user()->name}}</h1>
                    <p class="text-white mt-0 mb-5">祝你开心每一天！</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
@endsection

@section('container-fluid')
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h3 class="mb-0">订购商品</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('order.pay.re')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="no" value="{{$order->no}}">
                        <h6 class="heading-small text-muted mb-4">确认订单信息</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">商品名称</label>
                                        <input type="text" id="input-username"
                                               class="form-control form-control-alternative" disabled
                                               value="{{$order->good->title}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">价格</label>
                                        <input type="text" id="input-email"
                                               class="form-control form-control-alternative" disabled
                                               value="{{$order->price}}  {{$currencyUnit}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">优惠码</label>
                                        <input type="text" id="input-first-name" disabled
                                               class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">推荐者</label>
                                        <input type="text" id="input-last-name" disabled
                                               class="form-control  form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-control-label" for="input-last-name">订单支付方式</label>
                                    <div class="custom-control custom-radio mb-3">
                                        <input class="custom-control-input" id="customRadio4" name="payment" checked
                                               value="account" type="radio">
                                        <label class="custom-control-label" for="customRadio4">余额支付</label>
                                    </div>
                                    @if(!empty($paymentWechat))
                                        <div class="custom-control custom-radio mb-3">
                                            <input class="custom-control-input" id="customRadio6" name="payment" checked
                                                   value="wechat" type="radio">
                                            <label class="custom-control-label" for="customRadio6">微信支付</label>
                                        </div>
                                    @endif
                                    @if(!empty($paymentAlipay))
                                        <div class="custom-control custom-radio mb-3">
                                            <input class="custom-control-input" id="customRadio5" name="payment" checked
                                                   value="alipay" type="radio">
                                            <label class="custom-control-label" for="customRadio5">支付宝</label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @include('themes.default.layouts.errors')
                        <input type="submit" class="btn btn-primary" value="确认">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
