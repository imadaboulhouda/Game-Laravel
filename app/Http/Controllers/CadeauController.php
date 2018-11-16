<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CadeauController extends Controller
{

    function code(Request $request)
    {
        $this->validate($request,array(
            'code'=>'required'
        ));
        $code = $request->code;
         $cadeau = \App\Cadeau::where('code',$code)->first();
         if(isset($cadeau->nom))
            echo $cadeau->nom;
            else
            echo "Aucun Cadeau";
         die;
    }
   function index()
   {
       $cadeau = \App\Cadeau::all();

        return view('cadeau.list',['cadeaux'=>$cadeau]);
   }
   function add(Request $request)
   {

       if($request->isMethod('post'))
       {
    $this->validate(
            $request,
            array(
                'nom'=>'required',
                'image'=>'required|file',


            )
            );
        $p = new \App\Cadeau;
        if($request->hasFile('image'))
        {

            $ext = $request->file('image')->extension();
            $ext = strtolower($ext);

            if(in_array($ext,array('jpg','png','bmp','jpeg')))
            {
               $file = $request->file('image')->store('a');

                $p->image = $file;
            }
        }
        $p->code = "A".rand(0,9999).str_random(10);
        $p->nom = $request->nom;
        $p->ajouter_par = auth()->user()->id;
        $p->save();


        return redirect("/cadeau/index");
       }
       return view('cadeau.add');
   }


   function editF($id,Request $request)
   {

    $cadeau = \App\Cadeau::find($id);
    if(empty($cadeau))
    return abort(404);
        if($request->isMethod('post'))
       {
    $this->validate(
            $request,
            array(
                'nom'=>'required',



            )
            );
        $p = \App\Cadeau::find($id);
        if($request->hasFile('image'))
        {

            $ext = $request->file('image')->extension();
            $ext = strtolower($ext);

            if(in_array($ext,array('jpg','png','bmp','jpeg')))
            {
               $file = $request->file('image')->store('a');

                $p->image = $file;
            }
        }
        //$p->code = "A".rand(0,9999).str_random(10);
        $p->nom = $request->nom;
        $p->ajouter_par = auth()->user()->id;
        $p->save();


        return redirect("/cadeau/index");
       }
       return view('cadeau.edit',['cadeau'=>$cadeau]);
   }

   function delete(Request $request)
   {
       if($request->has('id'))
       {
           $p = \App\Cadeau::find($request->id);
           $p->delete();
           echo "ok";
           die;
       }
   }
}
