<?php

function handleUpload($inputName, $model = null)
{

    if (request()->hasFile($inputName)) {
        try {
            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);
            $filePath = "/uploads/" . $fileName;
            return $filePath;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}

// Delete File
function deleteFileIfExist($filePath){
   
   try{
     if(\File::exist(public_path($filePath))){
        \File::delete(public_path($filePath));
    }
   }
   catch(\Exception $e){
        throw $e;
   }
   
}


// get dynamic colors

function getColors($index){
    $colors = ['#558bff','#fecc90','#ff885e','#282828','#190844'];
    return $colors[$index % count($colors)];
}


function setSidebarActive ($route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}