<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Product;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\ItemDetail;

class ProductController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $products = Product::all();   
     }
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function showall()
    {
        //     $user = $this->getUserByUsername($username);
        // } catch (ModelNotFoundException $exception) {
        //     abort(404);
        // }

        $all_products = Product::all();
        $data = [
            'all_products'      => $all_products
            
        ];
        // var_dump($all_products);die;
        return view('home')->with($data);
    }

    public function deleteproduct(Request $request)
    {
        
        $id = $request->proid;
        DB::table('products')->where('_id', '=', $id)->delete();
        return redirect('/');
        
    }


    public function edit($id)
    {
        
        $edit= DB::table('products')->where('_id', $id)->get();
        $category = Category::all();

        $data = ['edit'=> $edit,
                 'category' => $category];

        return view("edit",$data);
        
    }

    
    public function save(Request $request)
    {
        $default_image_path = url('/')."/images/default.jpg";

        $this->validate($request, [
            'name' => 'required',
            'category'=>'required',
            ]);


        // $uploadedFile = $request->file('image'); 
        // if ($uploadedFile->isValid()) {
        //     $uploadedFile->move(destinationPath, $fileName);
        // }

        if($request->hasFile('mainImage'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $file = $request->file('mainImage');
            $destinationPath = 'uploads/image/products/'.$request->category;
            $filename = $file->getClientOriginalName();

           

            $image = $destinationPath.'/'.$filename;
            $file->move($destinationPath, $filename);
            // Product::where('_id' ,$request->id)->update(['image' => $image]);
            
            
            

        }
        else {
           $image = $request->mainImageValue;
        }


        if($request->hasFile('others')){

            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('others');
            // $product = Product::create($request->all());
            $i = 0;
            $image_other = [];
            foreach($files as $file){
                $i = $i + 1;
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads/image/products/'.$request->category.'/'.$request->id;
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                
                
                if($check)
                    {
                       
                            $image_other[$i] = $destinationPath.'/'.$filename;
                            
                            $file->move($destinationPath,$filename);
                        
                            
                      
                        
                    }
                else {
                    
                }




            }
            if($i == 0){$image_other[1]=' ';$image_other[2]=' ';$image_other[3]=' ';}
            elseif($i==1){$image_other[2]=' ';$image_other[3]=' ';}
            elseif($i==2){$image_other[3]=' ';}
           


           
           
        }
        else {
           $image_other[1] = $request->otherImageHidden1;
           $image_other[2] = $request->otherImageHidden2;
           $image_other[3] = $request->otherImageHidden3;
        }
       
        $tds = $request->tds;
        $sds = $request->sds;
        $category = Category::where('category',$request->category)->get()->toArray();

      
       

        Product::where('_id', $request->id)->update(['image'=>$image,'image1'=>$image_other[1], 'image2'=>$image_other[2], 'image3'=>$image_other[3], 'name'=>$request->name, 'description'=>$request->description, 'category'=>$category[0]['_id'],'sds'=>$sds, 'tds'=>$tds, 'idea'=>$request->idea]);
     
       

        return redirect('/');
        
        
    }


    public function new(){

        $category = Category::all();
        $data = ['category'=>$category];
        return(view('new' ,$data));

    }


    public function newsave(Request $request){


        $default_image_path = url('/')."/images/default.jpg";

        $this->validate($request, [
            'name' => 'required',
            'category'=>'required',
            ]);


      

        if($request->hasFile('main-image'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $file = $request->file('main-image');
            $destinationPath = 'uploads/image/products/'.$request->category;
            $filename = $file->getClientOriginalName();

            //save or edit

            
                $file->move($destinationPath, $filename);
                $image = $destinationPath.'/'.$filename;
           
            
            

        }
        else {
           
        }


        if($request->hasFile('others')){

            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('others');
            // $product = Product::create($request->all());
            $i = 0;
            $image_other = [];
            foreach($files as $file){
                $i = $i + 1;
                $filename = $file->getClientOriginalName();
                $destinationPath = 'uploads/image/products/'.$request->category.'/'.$request->id;
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                
                
                if($check)
                    {
                       
                            $file->move($destinationPath,$filename);
                            $image_other[$i] = $destinationPath.$filename;
                       
                        
                    }
                else {
                    
                }
            }
            if($i == 0){$image_other[1]=' ';$image_other[2]=' ';$image_other[3]=' ';}
            elseif($i==1){$image_other[2]=' ';$image_other[3]=' ';}
            elseif($i==2){$image_other[3]=' ';}
           
        }
        else {
            $image_other[1] = $default_image_path;
            $image_other[2] = $default_image_path;
            $image_other[3] = $default_image_path;
        }
       
        

        // if($request->hasFile('sds'))
        // {
        //     $allowedfileExtension=['pdf','jpg','png','docx'];
        //     $file = $request->file('sds');
        //     $filename = $file->getClientOriginalName();
        //     $destinationPath = 'uploads/sds/'.$request->category;
            
        //         $file->move($destinationPath,$filename);
               
            
            
        //     $sds = $destinationPath.'/'.$filename;

        // }
        // else {
        //     $sds = $default_image_path;
        // }


            $sds = $request->sds;
            $tds = $reqeust->tds;


        // if($request->hasFile('tds'))
        // {
        //     $allowedfileExtension=['pdf','jpg','png','docx'];
        //     $file = $request->file('tds');
        //     $filename = $file->getClientOriginalName();
        //     $destinationPath = 'uploads/tds/'.$request->category;
            
        //         $file->move($destinationPath,$filename);
                
           
           
                 
        //     $tds = $destinationPath.'/'.$filename;
          
        // }
        // else {
        //     $tds = $default_image_path;
        // }

        $category = Category::where('category',$request->category)->get()->toArray();
        $qr = url('/').'api/getProduct/'.$request->id;

        $data=array('image'=>$image, 'image1'=>$image_other[1], 'image2'=>$image_other[2], 'image3'=>$image_other[3] ,'qr'=>$qr, 'name'=>$request->name, 'description'=>$request->description, 'category'=>$category[0]['_id'],'sds'=>$sds, 'tds'=>$tds, 'idea'=>$request->idea);
      
      
            DB::table('products')->insert($data);
      

       
       

        return redirect('/');
        
       
    }

    // public function updateProduct(Request $request)

    // {

    //     Product::find($request->pk)->update([$request->name => $request->value]);

    //     return response()->json(['success'=>'done']);

    // }




}

    // {

    //     Product::find($request->pk)->update([$request->name => $request->value]);

    //     return response()->json(['success'=>'done']);

    // }





