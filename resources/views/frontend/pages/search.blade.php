@extends('layouts.app')

@section('title','Search Products')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <h4>Хайлтын үр дүн</h4>
                <div class="underline mb-4"></div>
            </div>
            @forelse($searchProducts as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">Search Result</label>

                            @if($productItem->productImages->count() > 0)
                                <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{asset($productItem->productImages[0]->image)}}" alt="{{$productItem->name}}">
                                </a>
                            @endif
                        </div>

                        <div class="product-card-body">
                            <p class="product-brand">{{$productItem->brand}}</p>
                            <h5 class="product-name">
                                <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    {{$productItem->name}}
                                </a>
                            </h5>
                            <div>
                                <span class="selling-price"> {{($productItem->price - (($productItem->sale_percent/100) * $productItem->price)) }}</span>
                                <span class="original-price">{{$productItem->price}}</span>
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-md-12 p-2">
                    <h4>Бүтээгдэхүүн олдсонгүй</h4>
                </div>
            @endforelse
            </div>
        </div>
    </div>
@endsection
