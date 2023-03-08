<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listLivre()
    {
        //
        $livre=livre::get();
        return response()->json([
            "status"=>1,
            "message"=>"listes des livres",
            "date"=>$livre

        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create (Request $request)
    {
       $request->validate([
        "name"=>"required",
        "auteur"=>"required|unique:livre",
        "edition"=>"required"
       ]) ;
       $livre=new livre();
       $livre->name=$request->name;
       $livre->auteur=$request->auteur;
       $livre->edition=$request->edition;
       $livre->save();

       return response()->json([         
       "message" => "creation du livre  reussi",         
        "status"=> 1      
   ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
     

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function getEtudiant($id)
    {
        //
                //verifier 
                $livre=livre::where("id",$id)->exists();
                if($livre){
                    $info=livre::find($id);
                    return response()->json([         
                        "message" => "livre trouver",         
                         "status"=> 1,
                         "data"=>$info
                    ],200);
        
                }
                else{
                    return response()->json([         
                        "message" => "aucun livre",         
                         "status"=> 0
                    ],404);
                }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        //verifier si un etudiant existe
        $livre=livre::where("id",$id)->exists();
        if($livre){
            $info=livre::find($id);
            $info->name=$request->name;
       $info->auteur=$request->auteur;
       $info->edition=$request->edition;
       $info->save();
            return response()->json([         
                "message" => "mise a jour effectuer",         
                 "status"=> 1,
                 "data"=>$info
            ],200);

        }
        else{
            return response()->json([         
                "message" => "mise a jour echouer",         
                 "status"=> 0
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $livre=livre::where("id",$id)->exists();
        if($livre){
            $livre=livre::find($id);
            $livre->delete();
       
       
            return response()->json([         
                "message" => "livre supprimer",         
                 "status"=> 1,
                 "data"=>$livre
            ],200);

        }
        else{
            return response()->json([         
                "message" => "livre introuvable",         
                 "status"=> 0
            ],404);
        }
    }
}
