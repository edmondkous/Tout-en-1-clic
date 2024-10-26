
@extends('layoutshop.master')
@section('content')

@if ($cartItems->count() >0)

    @if (Session::has('successs'))
        <script>
            swal("Message","{{ Session::get('successs')}}",'success',{
                button:true,
                button:"OK",
                timer:5000,
            });
        </script>
    @endif

    @if (Session::has('error1'))
        <script>
            swal("Message","{{ Session::get('successs')}}",'success',{
                button:true,
                button:"OK",
                timer:5000,
            });
        </script>
    @endif

    @if (Session::has('success'))
    <script>
        swal("Message","{{ Session::get('success')}}",'success',{
            button:true,
            button:"OK",
            timer:5000,
        });
    </script>
@endif

<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>IMAGE</th>
                            <th>DESIGNATION</th>
                            <th class="text-center">PRIX</th>
                            <th class="text-center">QUANTITE</th>
                            <th class="text-center">TOTAL</th>
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $produit)
                        <tr>
                            <td class="image" data-title="No"><img src="{{asset('/storage/produits/') }}/{{ $produit->model->image }}"></td>
                            <td class="product-des" data-title="Description">
                                <p class="product-name"><a href="#">{{ $produit->model->nom_prod }} </a></p>
                                <p class="product-des"></p>
                            </td>
                            <td class="price" data-title="Price"><span>{{ $produit->model->prix }}  </span></td>

                            <td class="qty" data-title="Qty">
                                <div class="quantity text-center">
                                    <div class="btn-group" role="group" aria-label="Quantité">
                                        <form action="{{ route('cart.decrement', $produit->rowId) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary mr-4">-</button>
                                        </form>
                                        <span class="qty-number text-center">{{ $produit->qty }}</span>
                                        <form action="{{ route('cart.increment', $produit->rowId) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-secondary ml-4">+</button>
                                        </form>
                                    </div>
                                </div>
                            </td>

                            <td class="total-amount" data-title="Total"><span>{{ $produit->model->prix*$produit->qty }}</span></td>
                            <td class="action" data-title="Remove">
                                <form method="post" action="{{route('cart.destroy', $produit->rowId)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="ti-trash remove-icon"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">
                                {{-- <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" placeholder="Enter Your Coupon">
                                        <button class="btn">Appliquer</button>
                                    </form>
                                </div> --}}
                                {{-- <div class="checkbox">
                                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
                                <ul>
                                    <li>Montant HT<span>{{Cart::instance('cart')->subtotal()}}</span></li>
                                    <li>Taxe<span>{{Cart::instance('cart')->tax()}}</span></li>
                                    <li class="last">Total<span>{{Cart::instance('cart')->total()}}</span></li>
                                </ul>
                                <div class="button5">
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        @foreach ($cartItems as $produit)
                                            <input type="hidden" name="produits[{{ $loop->index }}][id]" value="{{ $produit->id }}">
                                            <input type="hidden" name="produits[{{ $loop->index }}][qty]" value="{{ $produit->qty }}">
                                        @endforeach
                                        <button type="submit" class="btn">Payer à la livraison</button>
                                    </form>
                                    <a href="{{ route('shops.boutique') }}" class="btn">Payer en ligne</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->

<!-- Start Shop Services Area  -->
<section class="shop-services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                        <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Your email address" required="" type="email">
                            <button class="btn">Subscribe</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
@else
<div class="shopping-cart section">
    <p>Votre panier est vide.</p>
</div>
@endif

<form id="updateCartQty" action="{{route('cart.update')}}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" id="rowId" name="rowId" >
    <input type="hidden" id="quantity" name="quantity">

</form>
@endsection

{{-- @section('scripts')
<script src="{{ asset('assets/js/quantity.js') }}"></script>
@endsection --}}
