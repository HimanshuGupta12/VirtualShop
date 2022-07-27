<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Section;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductsAttribute;
use App\Models\ProductsImage;
use Illuminate\Support\Facades\Auth;
use Image;



class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::with(['section' => function($query){
            $query->select('id' , 'name');
        }, 'category' => function($query){
            $query->select('id' , 'category_name');
        }])->get()->toArray();
     // dd($products);
        return view('admin.products.product')->with(compact('products'));

    }

    public function updateProductStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            }
            else{
                $status = 1;
            }
            Product::where('id' , $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'product_id' => $data['product_id']]);

        }
    }
     // delete Product
     public function deleteProduct($id)
     {
        // Product::where('id' ,$id )->delete();
        //  $message = "Product has been deleted successfully ";
        //  return redirect()->back()->with('success_message' , $message);

         //to delete product from dashboard and frontend but not actually from database
         $products = Product::find($id);
         $products->status = "2";
         $products->update();
         return redirect()->back()->with('success_message' , 'Product has been deleted successfully');
     }

     public function addEditProduct(Request $request , $id = null)
     {
        if($id == ""){
            $title = "Add Product";
            $products = new Product();
            $message =  "Product Added Sucessfully";
        }
        else{
            $title = "Edit Product";
            $products = Product::find($id);
            //dd($product);
            $message =  "Product Updated Sucessfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>" ; print_r(Auth::guard('admin')->user()); die;

            $rules = [
                'category_id' => 'required',
                'product_name' => 'required',
                'product_code' => 'required',
                'product_color' => 'required',
                'offer_price' => 'required',
                'original_price' => 'required',
            ];
            $this->validate($request , $rules);

            //upload product image after resize -> small : 260 * 250 , medium : 500 * 500 ,large : 1000 * 1000

            if ($request->hasFile('product_image')) {
                $image_tmp = $request->file('product_image');
                    if($image_tmp->isValid()){
                        //upload image after resize
                        //Get Image Extension
                     $extension = $image_tmp->getClientOriginalExtension();

                     //Generate new image name
                     $imageName = rand(1111,99999).'.'.$extension;
                     $largeimagepath = 'front/images/product_images/large/'.$imageName;
                     $mediumimagepath = 'front/images/product_images/medium/'.$imageName;
                     $smallimagepath = 'front/images/product_images/small/'.$imageName;

                     //upload the Large , Medium , Small image after resize
                     Image::make($image_tmp)->resize(1000,1000)->save($largeimagepath);
                     Image::make($image_tmp)->resize(500,500)->save($mediumimagepath);
                     Image::make($image_tmp)->resize(250,250)->save($smallimagepath);
                        //insert Image Name in Product table
                     $products->product_image = $imageName;
                    }

            }


             //save product detail in product table
        $categoryDetails = Category::find($data['category_id']);
        $products->section_id = $categoryDetails['section_id'];
        $products->category_id = $data['category_id'];
        $products->brand_id = $data['brand_id'];

        $adminType = Auth::guard('admin')->user()->type;
        $seller_id = Auth::guard('admin')->user()->seller_id;
        $admin_id = Auth::guard('admin')->user()->id;

        $products->admin_type = $adminType;
        $products->admin_id = $admin_id;
        if($adminType = "seller")
        {
            $products->seller_id = $seller_id;
        }
        else{
            $products->seller_id = 0;
        }
        $products->product_name = $data['product_name'];
        $products->product_code = $data['product_code'];
        $products->product_color = $data['product_color'];
        $products->original_price = $data['original_price'];
        $products->offer_price = $data['offer_price'];
        $products->product_discount = $data['product_discount'];
        $products->product_weight = $data['product_weight'];
        $products->product_description = $data['product_description'];
        $products->meta_title = $data['meta_title'];
        $products->meta_description = $data['meta_description'];
        $products->meta_keyword = $data['meta_keyword'];
        if (!empty($data['is_featured'])) {
            $products->is_featured = $data['is_featured'];
        }
        else{
            $products->is_featured = "No";
        }

        $products->status = 1;
        $products->save();
        return redirect('admin/products')->with('success_message' , $message);


        }
        //Get section with catgories and sub categories
        $categories = Section::with('categories')->get()->toArray();
       // dd($categories);

       //Get All the brands
       $brands  = Brand::where('status' , 1)->get()->toArray();

        return view('admin.products.add_edit_products')->with(compact('title' , 'categories' , 'brands' , 'products'));

     }

     public function deleteProductImage($id)
     {
        //Get Product image from the product model
        $productImage = Product::select('product_image')->where('id' , $id)->first();

        //get Product image paths
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';

        //delete product small image if exist in small folder
        if(file_exists($small_image_path.$productImage->product_image)){
            unlink($small_image_path.$productImage->product_image);
        }

        //delete product Medium image if exist in small folder
        if(file_exists($medium_image_path.$productImage->product_image)){
            unlink($medium_image_path.$productImage->product_image);
        }

        //delete product Large image if exist in small folder
        if(file_exists($large_image_path.$productImage->product_image)){
            unlink($large_image_path.$productImage->product_image);
        }

        //Delete product image from table
        Product::where('id' , $id)->update(['product_image' => '']);

        $message = "Product Image has been deleted successfully";
        return redirect()->back()->with('success_message' , $message);
     }


      //to restore the deleted Product
    public function deletedProduct()
    {
        $products = Product::where('status' , '2')->get();
        return view('admin.products.deleted_products')->with(compact('products'));
    }
    public function restoreProduct($id)
    {
        $products = Product::find($id);
        $products->status = "1"; //0->inactive 1->active 2->delete
        $products->update();
        return redirect('admin/products')->with('success_message' , 'Product Restored successfully');

    }


    //Add Multiple Product Image
    public function addImages($id , Request $request)
    {
         $products = Product::select('id' ,'product_name' , 'product_code' , 'original_price' , 'product_color' , 'product_image')->with('images')->find($id);
        //dd($product);

        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>";  print_r($data); die;
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                // echo "<pre>";  print_r($images); die;
                foreach ($images as $key => $image)
                {
                     //echo "<pre>";  print_r($image); die;
                    //Generate Temp Image
                     $image_tmp = Image::make($image);
                    //Get the Image name
                     $image_name  = $image->getClientOriginalName();

                    //Get Image Extension
                    $extension = $image->getClientOriginalExtension();
                    //Generate new image name
                    $imageName = $image_name.rand(1111,99999).'.'.$extension;
                    $largeimagepath = 'front/images/product_images/large/'.$imageName;
                    $mediumimagepath = 'front/images/product_images/medium/'.$imageName;
                    $smallimagepath = 'front/images/product_images/small/'.$imageName;

                    //upload the Large , Medium , Small image after resize
                    Image::make($image_tmp)->resize(1000,1000)->save($largeimagepath);
                    Image::make($image_tmp)->resize(500,500)->save($mediumimagepath);
                    Image::make($image_tmp)->resize(250,250)->save($smallimagepath);
                       //insert Image Name in Product table
                    $image = new ProductsImage;
                    $image->image = $imageName;
                    $image->product_id = $id;
                    $image->status = 1;
                    $image->save();

                }
            }
            return redirect()->back()->with('success_message' , 'Product Image has been added successfully');

        }
        return view('admin.productImages.add_images')->with(compact('products'));
    }

    //update Image status
    public function updateImageStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active") {
                $status = 0;
            }
            else{
                $status = 1;
            }
            Product::where('id' , $data['image_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'image_id' => $data['image_id']]);

        }
    }


    // Delete function for multiple images
    public function deleteImage($id)
     {
        //Get Product image from the product model
        $productImage = ProductsImage::select('image')->where('id' , $id)->first();

        //get Product image paths
        $small_image_path = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path = 'front/images/product_images/large/';

        //delete product small image if exist in small folder
        if(file_exists($small_image_path.$productImage->image)){
            unlink($small_image_path.$productImage->image);
        }

        //delete product Medium image if exist in small folder
        if(file_exists($medium_image_path.$productImage->image)){
            unlink($medium_image_path.$productImage->image);
        }

        //delete product Large image if exist in small folder
        if(file_exists($large_image_path.$productImage->image)){
            unlink($large_image_path.$productImage->image);
        }

        //Delete product image from product_images table
        ProductsImage::where('id' , $id)->delete();

        $message = "Product Image has been deleted successfully";
        return redirect()->back()->with('success_message' , $message);
     }



}
