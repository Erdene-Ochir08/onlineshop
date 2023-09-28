<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        Paginator::useBootstrapFive();
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'brands'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);

        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'sale_percent' => $validatedData['sale_percent'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'trending' => $request->trending == true ? '1':'0',
            'status' => $request->status == true ? '1':'0',
            'quantity' => $validatedData['quantity'],
        ]);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/product/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        return redirect('admin/product')->with('message', 'Product Added Successfully!');

    }

    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);

        return view('admin.product.edit', compact('categories', 'brands', 'product'));
    }

    public function update(ProductFormUpdateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['category_id'])
            ->products()->where('id', $id)->first();

        if($product)
        {
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'sale_percent' => $validatedData['sale_percent'],
                'price' => $validatedData['price'],
                'trending' => $request->trending == true ? '1':'0',
                'status' => $request->status == true ? '1':'0',
                'quantity' => $validatedData['quantity'],
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'uploads/product/';

                $i = 1;
                foreach($request->file('image') as $imageFile){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extension;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }

            return redirect('admin/product')->with('message', 'Product Updated Successfully!');
        }
        else
        {
            return redirect('admin/product')->with('message', 'No Such Product Id Found!');
        }
    }

    public function destroyImage($id)
    {
        $productImage = ProductImage::findOrFail($id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted Successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully!');
    }

    public function brandGet(Request $request)
    {
        $category_id = $request->input('category_id');

        $brands = Brand::where('category_id', $category_id)->get();

        return response()->json($brands);
    }

}
