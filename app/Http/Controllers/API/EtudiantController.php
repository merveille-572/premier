<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listEtudiant()
    {
        //
        $etudiant=Etudiant::get();
        return response()->json([
            "status"=>1,
            "message"=>"listes des etudiants",
            "date"=>$etudiant

        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       $request->validate([
        "name"=>"required",
        "email"=>"required|email|unique:etudiant",
        "password"=>"required"
       ]) ;
       $etudiant=new Etudiant();
       $etudiant->name=$request->name;
       $etudiant->email=$request->email;
       $etudiant->password=$request->password;
       $etudiant->save();

       return response()->json([         
       "message" => "creation de l'etudiant reussi",         
        "status"=> 1      
   ]);
    }

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
    public function getEtudiant($id)
    {
        //verifier 
        $etudiant=Etudiant::where("id",$id)->exists();
        if($etudiant){
            $info=Etudiant::find($id);
            return response()->json([         
                "message" => "etudiant trouver",         
                 "status"=> 1,
                 "data"=>$info
            ],200);

        }
        else{
            return response()->json([         
                "message" => "aucun etudiant",         
                 "status"=> 0
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //verifier si un etudiant existe
        $etudiant=Etudiant::where("id",$id)->exists();
        if($etudiant){
            $info=Etudiant::find($id);
            $info->name=$request->name;
       $info->email=$request->email;
       $info->password=$request->password;
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
    public function delete( $id)
    {
        //
        $etudiant=Etudiant::where("id",$id)->exists();
        if($etudiant){
            $etudiant=Etudiant::find($id);
            $etudiant->delete();
       
       
            return response()->json([         
                "message" => "etudiant supprimer",         
                 "status"=> 1,
                 "data"=>$etudiant
            ],200);

        }
        else{
            return response()->json([         
                "message" => "etudiant introuvable",         
                 "status"=> 0
            ],404);
        }
    }
}
