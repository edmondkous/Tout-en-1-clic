<div class="shop-sidebar">
    <!-- Single Widget -->
    <div class="single-widget category">
        <h3 class="title">Categories</h3>
        <ul class="categor-list">
            @foreach ( $categories as $categorie )
                <li><a href="{{route('shops.viewBycategory',['id'=>$categorie->id])}}">{{$categorie->nom_cat}}</a></li>
            @endforeach
        </ul>
    </div>
    <!--/ End Single Widget -->
    <!-- Shop By Price -->
        <div class="single-widget range">
            <h3 class="title">Filtrer par prix</h3>
            <div class="price-filter">
                <form action="{{ route('shops.filtrePrix') }}" method="GET">
                    @csrf
                    <div >
                        <label for="min_price">Prix minimum</label>
                        <input type="text" name="min_price" value="{{ old('min_price') }}">
                    </div>
                    <div>
                        <label for="max_price">Prix maximum</label>
                        <input type="text" name="max_price" value="{{ old('max_price') }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-info">Filtrer</button>
                    </div>
                </form>
            </div>
            {{-- <ul class="check-box-list">
                <li>
                    <label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
                </li>
                <li>
                    <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
                </li>
                <li>
                    <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
                </li>
            </ul> --}}
        </div>
        <!--/ End Shop By Price -->
    <!-- Single Widget -->
    {{-- <div class="single-widget recent-post">
        <h3 class="title">Recent post</h3>
        <!-- Single Post -->
        <div class="single-post first">
            <div class="image">
                <img src="https://via.placeholder.com/75x75" alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Girls Dress</a></h5>
                <p class="price">$99.50</p>
                <ul class="reviews">
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        <!-- End Single Post -->
        <!-- Single Post -->
        <div class="single-post first">
            <div class="image">
                <img src="https://via.placeholder.com/75x75" alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Women Clothings</a></h5>
                <p class="price">$99.50</p>
                <ul class="reviews">
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        <!-- End Single Post -->
        <!-- Single Post -->
        <div class="single-post first">
            <div class="image">
                <img src="https://via.placeholder.com/75x75" alt="#">
            </div>
            <div class="content">
                <h5><a href="#">Man Tshirt</a></h5>
                <p class="price">$99.50</p>
                <ul class="reviews">
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                    <li class="yellow"><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        <!-- End Single Post -->
    </div> --}}
    <!--/ End Single Widget -->
    <!-- Single Widget -->
    <div class="single-widget category">
        <h3 class="title">Manufacturers</h3>
        <ul class="categor-list">
            <li><a href="#">Forever</a></li>
            <li><a href="#">giordano</a></li>
            <li><a href="#">abercrombie</a></li>
            <li><a href="#">ecko united</a></li>
            <li><a href="#">zara</a></li>
        </ul>
    </div>
    <!--/ End Single Widget -->
</div>
