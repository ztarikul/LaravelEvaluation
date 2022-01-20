<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;


class adminController extends Controller
{
    public function viewRegistration(){
     return view('viewRegistration');   
        
    }
    
    public function registerControl(Request $request){
        
        $data = $request->input();
       if(DB::table('admin') ->count() == 0 ){
           
        DB::table('admin')->insert(
            
            [
            'username'=>$data['username'],
            'password'=>$data['password']  
                
            ]
            );  
            return redirect()->back()->with('msg','registered Successfully');
           
       } 
       else{
        return redirect()->back()->with('error','Cant register a second admin' );
           
       }
        
        
        
        
        
        
        
        
        
    }  
    
    
    public function login(){
        
        return view('login');
    }
    
    
    public function loginCheck(Request $request){
        $data=$request->input();
         $USERNAME=$data['username'];
         $PASSWORD=$data['password'];
         
       $dataBase= DB::table('admin')->get();
            
        if($dataBase[0]->username == $USERNAME and $dataBase[0]->password == $PASSWORD){
            
            return redirect('/home');
           
            
        }
        else{
            return redirect()->back()->with('error','Invalid login');
        }
            
        
        
    }
    
    
    
    public function addCategory(){
        return view('addCategory');
        
    }
    
    public function insertCategory(Request $request){
        
     $cat=new products;
      $image=$request->file('thumbnail');
      $name_gen=hexdec(uniqid());
      $img_ext = strtolower($image->getClientOriginalExtension());
      $image_name=$name_gen.'.'.$img_ext;
      $up_location='/storage/'.$image_name;
      $image->move($up_location,$image_name);
      
      $data = $request->input();
      
      $cat->title=$data['title'];
      $cat->description=$data['description'];
      $cat->thumbnail=$up_location;
      $cat->subcategory_id=uniqid();
      $cat->price=$data['price'];
      
      $cat->save();
     
     return redirect('/showCat')->with('msg','Successfully added');
    
      
     
        
        
    }
    
    public function showCat(){
        
        if(DB::table('products')->count() != 0){
    
            $products=DB::table('products')->get();
            
            return view('showProduct',compact('products'));
        
                
                
            }
             
        
    }
    
    public function delete($deleteID){
      
      DB::table('products')
      ->where('id','=',$deleteID)
      ->delete();
    return redirect()->back()->with('msg','successfully Deleted');  
        
    }
    
    
    public function catAndSub(){
        
        $catSub = DB::table('categories')
        
        ->join('subcategories', 'categories.id', '=', 'subcategories.category_id')
       
        ->get();
        
        echo $catSub;
    }
    
    public function catAndPro(){
        //proAndSub
        $catAndPro = DB::table('products')
        
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->join('categories','subcategories.category_id','=','categories.id')
        
        ->get();
        
        echo $catAndPro;
        
    }
    
    public function subAndPro(){
        
        $subAndPro = DB::table('products')
        
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id') 
        ->get();
        
        echo $subAndPro;
    }
    
    public function search(Request $req)
    
    {
      
      $products=DB::table('products')->where('title','LIKE','%'.$req->search.'%');
      $output='';
      
      

      
    foreach($products as $key=>$product){
        $output.='<tr>'.
        '<td>'.$product->id.'</td>'.
        '<td>'.$product->title.'</td>'.
        '<td>'.$product->description.'</td>'.
        '<td>'.$product->subcategory_id.'</td>'.
        '<td>'.$product->price.'</td>'.
        '<td>'.$product->thumbnail.'</td>'.
        '</tr>';
        
        
        
    }
    return Response($output);

      
      
        
    }
    
    
    
}

