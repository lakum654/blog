<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
class CrudController extends Controller
{
    function insert(Request $request){

    	$data  = new Crud();
    	$data->name = $request->name;
    	$data->city = $request->city;
    	if($data->save()){
    	return response()->json(['msg'=>"Data Inserted Successfully."]);
    }else{
    	return response()->json(['msg'=>"Data Inserted Error."]);    	
    }
    }
    function loaddata(){
    	$data = Crud::get();
    	return json_encode(array('data'=>$data));    	
    }
    function test(){
        // $array1 = ['Hello','How','Are','You','Bro'];
        // $string = implode(' ',$array1);
        // echo $string;
        // $array2 = explode(' ',$string);
        // print_r($array2);

        $users = [
               'kishan'=>['id'=>'2','city'=>'Rajkot'],
               'haresh'=>['id'=>'3','city'=>'Surat'],
               'hitesh'=>['id'=>'4','city'=>'Chotila'],
        ];
        foreach ($users as $key => $value) {
            foreach($value as $value2){
                echo $value2;
            }
        }


    }
    function edit($id){
        $data = Crud::find($id)->get();
        return json_encode(['data'=>$data]);
    }
    function delete($id){
        if(Crud::find($id)->delete()){
            return response()->json(['msg'=>"Record Deleted Successfully."]);
        }
    }
}
