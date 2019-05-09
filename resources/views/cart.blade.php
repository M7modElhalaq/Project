@extends('layouts.app')

@section('content')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img src="{{asset('img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Cart Page</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('FrontIndex')}}">Home</a></li>
                        <li class="active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-view-area">
                        <div class="cart-view-table">
                            <form action="">
                                <div class="table-responsive">
                                    @if(count($cartItems) > 0)
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cartItems as $item)
                                                <tr class="cart-list-{{$item['id']}}">
                                                    <td><a class="remove aa-remove-product" href="#" data-id="{{ $item['id'] }}"><fa class="fa fa-close"></fa></a></td>
                                                    <td><a href="{{route('FrontProductDetail', ['id' => $item['id']])}}"><img src="img/products/{{$item['image']}}" alt="img"></a></td>
                                                    <td><a class="aa-cart-title" href="{{route('FrontProductDetail', ['id' => $item['id']])}}">{{$item['name']}}</a></td>
                                                    <td>${{$item['price']}}</td>
                                                    <td><input class="aa-cart-quantity" type="number" value="{{$item['quantity']}}"></td>
                                                    <td>
                                                        @php
                                                            $total = $item['price'] * $item['quantity'];
                                                        @endphp
                                                        ${{$item['price']}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- Cart Total view -->
                                        <div class="cart-view-total">
                                            <h4>Cart Totals</h4>
                                            <table class="aa-totals-table">
                                                <tbody>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>$450</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>$450</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
                                        </div>
                                    @else
                                        <h2 class="text-center" style="margin-top: 120px;">There is no items in cart.</h2>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->

@endsection