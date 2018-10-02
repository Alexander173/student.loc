<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function getImage(Request $request,$id){
       $ext=$request->file('photo')->getClientOriginalExtension();//расширение файла(указанное но не реальное)
        $type_photo=array('jpeg','jpg','png');
        $file=$request->file('photo');
        if(in_array($file->extension(),$type_photo)){
            $image=new Image;
            $image->student_id=$id;

            $name_file=date('Y-m-d_H:i:s').'_'.$image->student->first_name.'_'.$id.'.'.$ext;
            Storage::putFileAs("public/img_lk",$file,$name_file);//path для поля таблицы для asset
            Image::create(['student_id'=>$id,'img_src'=>$name_file]);
            return back();

        }
        else{
            $string="File must be .jpeg .jpg .png";
            return back()->with('string',$string);
        }
    }
    public function updateImage(Request $request,$id){
        $ext=$request->file('photo')->getClientOriginalExtension();//расширение файла(указанное но не реальное)
        $type_photo=array('jpeg','jpg','png');
        $file=$request->file('photo');
        if(in_array($file->extension(),$type_photo)){
            $image=Image::find($id);
            Storage::delete('public/img_lk/'.$image->img_src);
            $name_file=date('Y-m-d_H:i:s').'_'.$image->student->first_name.'_'.$image->student->id.'.'.$ext;
            Storage::putFileAs("public/img_lk",$file,$name_file);//path для поля таблицы для asset
            $image->img_src=$name_file;
            $image->save();
            return back();

        }
        else{
            $string="File must be .jpeg .jpg .png";
            return back()->with('string',$string);
        }
    }
}
