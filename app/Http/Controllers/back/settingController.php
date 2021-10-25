<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Image;

class settingController extends Controller
{
    public function edit(){
   $page_name = "Site Setting";
   $data = Setting::first();

   return view('admin.setting.edit', compact('page_name','data'));
}
    public function update(Request $request, $id){
        $setting = Setting::find($id);
        $setting->system_name = $request->siteName;

        if($file = $request->file('fabIcon')){
            @unlink(public_path('/setting'.'/'.$setting->fabIcon));

            $extension = $file->getClientOriginalExtension();
            $main_image = 'fab.'.$extension;
            Image::make($file)->save(public_path('/setting'.'/'.$main_image));
            $setting->fabIcon = $main_image;
        }
        if($file = $request->file('fontLogo')){

            @unlink(public_path('/setting'.'/'.$setting->fontLogo));
            
            $extension = $file->getClientOriginalExtension();
            $main_image = 'fontlogo.'.$extension;
            Image::make($file)->save(public_path('/setting'.'/'.$main_image));
            $setting->fontLogo = $main_image;
        }
        if($file = $request->file('adminLogo')){
            @unlink(public_path('/setting'.'/'.$setting->adminLogo));
            
            $extension = $file->getClientOriginalExtension();
            $main_image = 'adminlogo.'.$extension;
            Image::make($file)->save(public_path('/setting'.'/'.$main_image));
            $setting->adminLogo = $main_image;
        }

        $setting->save();

        $page_name = "Site Setting";
        $data =  $setting;
        return view('admin.setting.edit', compact('page_name','data'));
     
  
    }
}