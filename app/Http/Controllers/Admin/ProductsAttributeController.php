<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductsAttribute;

class ProductsAttributeController extends Controller
{
    public function addAttributes(Request $request, $id)
    {
        $products = Product::select('id' ,'product_name' , 'product_code' , 'original_price' , 'product_color' , 'product_image')->with('attributes')->find($id);
        //dd($product);
        if($request->isMethod('post'))
        {
            $data = $request->all();
            //echo "<pre>" ; print_r($data); die;
                foreach ($data['sku'] as $key => $value) {
                    if (!empty($value)) {

                        //SKU duplicate check
                        $skuCount = ProductsAttribute::where('sku' , $value)->count();
                        if ($skuCount > 0 ) {
                            return redirect()->back()->with('error_message' , 'SKU already exist ! Please add another SKU' );
                        }
                        //Size duplicate check
                        $sizeCount = ProductsAttribute::where('size' , $data['size'][$key])->count();
                        if ($sizeCount > 0 ) {
                            return redirect()->back()->with('error_message' , 'Size already exist ! Please add another Size' );
                        }

                        $attribute = new ProductsAttribute();
                        $attribute->product_id = $id;
                        $attribute->size = $data['size'][$key];
                        $attribute->original_price = $data['original_price'][$key];
                        $attribute->stock = $data['stock'][$key];
                        $attribute->sku = $value;
                        $attribute->status = 1;
                        $attribute->save();
                    }
                }
                return redirect()->back()->with('success_message' , 'Product Attribute has been added successfully');
        }
        return view('admin.attributes.add_edit_attributes')->with(compact('products'));
    }

    public function updateAttributeStatus(Request $request)
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
            ProductsAttribute::where('id' , $data['attribute_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'attribute_id' => $data['attribute_id']]);

        }


    }
    public function editAttribute(Request $request)
        {
            if ($request->isMethod('post')) {
                $data = $request->all();
                foreach ($data['attributeId'] as $key => $attribute) {
                    if(!empty($attribute))
                    {
                        ProductsAttribute::where(['id' => $data['attributeId'][$key]])->update(['original_price'=> $data['original_price'][$key] , 'stock' => $data['stock'][$key]]);
                    }
                }
            }
            return redirect()->back()->with('success_message' , 'Product Attribute has been Updated successfully');
        }

}
