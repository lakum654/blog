<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;
class FileController extends Controller
{
    function upload(Request $request){    	
    	
    	 if($request->file('image')){
    	// 	$fileName = random_int('1', '1000').'.'.$request->image->extension();
    	// 	if($request->image->move(public_path('uploaded'),$fileName)){
    	// 		$file = new File();
    	// 		$file->image = $fileName;
    	// 		if($file->save()){
    	// 			echo "Image Upload And Store Done";
    	// 		}
    	// 	}

    		$file = File::find(3);
    		echo $file->id;
    		
    	}
    }

    function job(){
        for($i = 5; $i > 1; $i--){
            for($j = 5; $j > $i; $j++){
                echo $j;
            }
            echo "<br>";
        }
    }
}
