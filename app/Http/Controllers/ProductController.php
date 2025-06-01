<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{       
    //This method will show product page
    public function index(Request $request) {
 $query = Product::query();

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('sku', 'like', "%{$search}%");
    }

    $products = $query->latest()->paginate(5)->withQueryString();

    return view('products.list', compact('products'));
    }


    //this method will show create product page
     public function create(){
        return view('products.create');
    }
    //this method will show store product page
     public function store(Request $request){
        $rules=[
            'name'=>'required|min:5',
             'sku'=>'required|min:3',
              'price'=>'required|numeric'
        ];
        if($request->image != ""){
            $rules['image']='image';

        }
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        // the data is stored in db

        $product = new Product();
        $product->name =$request->name;
        $product->sku =$request->sku;
        $product->price =$request->price;
        $product->description =$request->description;
        $product->save();

     if($request->image != "")
         {
        //image mechanism
        $image= $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName=time().'.'.$ext; //image unique

        //save image in diff directory
        $image->move(public_path('uploads/products'),$imageName);

        //image in db
        $product->image =$imageName;
        $product->save();
         }
        return redirect()->route('products.index')->with('success','Product added successfully');
        
    }
    //this method will show edit product page
     public function edit($id){
        $product= Product::findOrFail($id);
        return view('products.edit',[
            'product'=>$product
        ]);
    }
    //this method will  update product 
     public function update($id,Request $request){
        $product= Product::findOrFail($id);
        $rules=[
            'name'=>'required|min:5',
             'sku'=>'required|min:3',
              'price'=>'required|numeric'
        ];
        if($request->image != ""){
            $rules['image']='image';

        }
        $validator =Validator::make($request->all(),$rules);
        if($validator->fails()){
            return redirect()->route('products.edit',$product->id)->withInput()->withErrors($validator);
        }

        // the data is update in db

        $product->name =$request->name;
        $product->sku =$request->sku;
        $product->price =$request->price;
        $product->description =$request->description;
        $product->save();

     if($request->image != "")
         {
            //delete the old image
            File::delete(public_path('uploads/products/'.$product->image));
        //image mechanism
        $image= $request->image;
        $ext= $image->getClientOriginalExtension();
        $imageName=time().'.'.$ext; //image unique

        //save image in diff directory
        $image->move(public_path('uploads/products'),$imageName);

        //image in db
        $product->image =$imageName;
        $product->save();
         }
        return redirect()->route('products.index')->with('success','Product updated successfully');
        
    }
    //this method will  destroy product 
     public function destroy($id){
        $product= Product::findOrFail($id);

        //delete the  image
        File::delete(public_path('uploads/products/'.$product->image));
         $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
