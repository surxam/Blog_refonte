<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::where('user_id',auth()->id())->get();
        
        return view('dashboard',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajoutForm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([

            'titre' => 'required|min:8',
            'description'=> 'required|min:8'
        ]);

        $validated['user_id'] = auth()->id();
        Article::create($validated);

        return redirect()->route('dashboard');
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
    public function edit( $id)
    {
          $article = Article::findOrFail($id); 
        
         return view('formulaire', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titre' => 'required|string|max:150',
            'description' => 'required|string'
        ]);

         $validated = Article::findOrFail($id);

         $validated->update([
                'titre' => $request->titre,
                'description' => $request->description
        ]);
        
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $article = Article::findOrFail($id);
        $article->delete();

    return redirect()->route('dashboard')->with('success', 'Article supprimé avec succès');
    }
}
