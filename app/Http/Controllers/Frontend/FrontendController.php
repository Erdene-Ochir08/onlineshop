<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $saleProducts = Product::where('sale_percent', '>' , '0')->take(15)->get();
        $latestProducts = Product::latest()->take(15)->get();
        $allProducts = Product::all();

        $categories = Category::where('status', '0')->get();
        return view('frontend.index', compact('sliders', 'trendingProducts',
            'categories','saleProducts','latestProducts','allProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', compact('category','products'));
        } else {
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if ($category) {

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if ($product) {

                return view('frontend.collections.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thank-you');
    }

    public function searchProduct(Request $request)
    {
        if($request->search) {
            $searchProducts = Product::where('name','LIKE','%'.$request->search.'%')->latest()->paginate(15);
            return view('frontend.pages.search',compact('searchProducts'));
        }
        else{
            return redirect()->back()->with('message','Илэрч олдсонгүй');
        }
    }


}
