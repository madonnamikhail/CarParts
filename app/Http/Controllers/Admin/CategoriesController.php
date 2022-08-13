<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('permission:Update Categories,admin')->only('edit','update');
        $this->middleware('permission:Store Categories,admin')->only('create','store');
        $this->middleware('permission:Index Categories,admin')->only('index');
        $this->middleware('permission:Destroy Categories,admin')->only('destroy');
    }
    public const AVAILABLE_STATUS = ['مفعل' => 1, 'غير مفعل' => '0'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->get();
        return view('Admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $nodes  = Category::get()->toTree();
        return view('Admin.categories.create',['statuses'=>self::AVAILABLE_STATUS,'nodes'=>$nodes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if($request->category_id){
            $parent = Category::findOrFail($request->category_id); // electronics
            Category::create($request->validated(), $parent);
        }else{
            Category::create($request->validated());
        }
        return $this->redirectAccordingToRequest($request, 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $nodes  = Category::get()->toTree();
        return view('Admin.categories.edit',['statuses'=>self::AVAILABLE_STATUS,'nodes'=>$nodes,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request,Category $category)
    {
        if($request->category_id){
            $parent = Category::findOrFail($request->category_id); // electronics
            $category->appendToNode($parent)->save();
            $category->update( $request->validated() );
        }else{
            $category->parent_id = NULL;
            $category->update( $request->validated() );
        }
        return redirect()->route('categories.index')->with('success', 'تمت العملية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', 'تمت العملية بنجاح');
    }

    public function products(Request $request)
    {
        $request->validate([
            'category_id'=>['required','integer','exists:categories,id'],
            'model_id'=>['required','integer','exists:models,id']
        ]);
        $products = Product::select('id','name','price','quantity')->where([['category_id','=',$request->category_id],['model_id','=',$request->model_id]])->get();
        $options = "";
         foreach($products AS $pro){
            $options.= "<option value='{$pro->id}' >{$pro->getTranslation('name','ar')} - {$pro->getTranslation('name','en')} - قطعة  {$pro->quantity} - {$pro->price} جنيه</option>";
         }
        return response()->json(compact('options','products'));
    }

    public function brands(Request $request)
    {
        $request->validate([
            'category_id'=>['required','integer','exists:categories,id'],
        ]);
        $brands =  Brand::select('id','name')->whereIn('id',function($subquery) use($request){
            $subquery->select('brand_id')
            ->distinct()
            ->from('models')
            ->whereIn('id',function($subquery2) use($request){
                $subquery2->select('model_id')
                ->distinct()
                ->from('products')
                ->where('category_id', $request->category_id);
            });
        })->get();
        $options = "<option value=''></option>";
         foreach($brands AS $brand){
            $options.= "<option value='{$brand->id}' >{$brand->id} -{$brand->getTranslation('name','ar')} - {$brand->getTranslation('name','en')}</option>";
         }
        return response()->json(compact('options','brands'));
    }
}
