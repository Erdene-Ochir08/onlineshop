<div class="py-3 py-md-5" style="background-color: rgb(248, 248, 248);">
    <div class="container">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="s-card">
                    <div class="row">
                        <div class="col-md-6 " wire:ignore>
                            @if ($product->productImages)
                        <div class="exzoom" id="exzoom">
                            <!-- Images -->
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->productImages as $itemImg)
                                        <li> <img src="{{ asset($itemImg->image) }}"> </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="bi bi-chevron-left"></i> </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="bi bi-chevron-right"></i> </a>
                            </p>
                        </div>
                        @else
                            Зураггүй байна
                        @endif
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <p class="route">Home / {{ $product->category->name }} / {{ $product->name }}</p>
                                <h3>{{ $product->name }}</h3>
                                <p class="price">{{ $product->price }}₮</p>
                                <p class="desc">
                                    You also need to be able to accept that not every post is going to get your motor running. Some posts will feel like a chore, but if you have editorial control over what you write about, then choose topics you’d want to read – even if they relate to niche industries. The more excited you can be about your topic, the more excited your readers 
                                    <!-- {!! $product->small_description !!} -->
                                </p>
                            </div>
                            <div class="mt-2 product-view">
                                <div class="input-group">
                                    <span class="btn btn1" wire:click="quantityDecrement"><i class="fa fa-minus"></i></span>
                                    <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                    <span class="btn btn1" wire:click="quantityIncrement"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="mt-2 product-view">
                                <button type="button" wire:click="addToCart({{ $product->id }})" class="btn btn1">
                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="more" style="margin-top:50px;">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text">
                                            <h6>Brand</h6>
                                            <p>Nike Horizon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="latest">
                    <h5>Сүүлд нэмэгдсэн</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://127.0.0.1:8000/uploads/product/16939067911.png" alt="" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="info">
                                <h6>Mouse</h6>
                                <p class="price">$600.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://127.0.0.1:8000/uploads/product/16939067911.png" alt="" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="info">
                                <h6>Mouse</h6>
                                <p class="price">$600.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://127.0.0.1:8000/uploads/product/16939067911.png" alt="" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="info">
                                <h6>Mouse</h6>
                                <p class="price">$600.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="http://127.0.0.1:8000/uploads/product/16939067911.png" alt="" width="100%">
                        </div>
                        <div class="col-md-8">
                            <div class="info">
                                <h6>Mouse</h6>
                                <p class="price">$600.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $("#exzoom").exzoom({
                "navWidth": 60,
                "navHeight": 60,
                "navItemNum": 5,
                "navItemMargin": 7,
                "navBorder": 1,
                "autoPlay": false,
                "autoPlayTimeout": 2000
            });
        });
    </script>
@endpush
