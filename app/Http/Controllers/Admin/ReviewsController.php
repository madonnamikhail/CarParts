<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function index(Product $product)
    {
       return view('Admin.products.reviews.index',[
        'product'=>$product->with('reviews:id,name,email')->select('id','name')->where('id',$product->id)->first()
       ]);
    }

    public function destroy(Product $product, User $user)
    {
        $product->reviews()->detach([$user->id]);
        return redirect()->back()->with('success','تمت العملية بنجاح');
    }
}
