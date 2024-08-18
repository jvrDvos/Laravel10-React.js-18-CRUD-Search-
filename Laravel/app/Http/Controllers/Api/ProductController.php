<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $articlesQuery = Article::query()->orderByDesc('id');

        // Apply search filters
        if ($request->has('name')) {
            $articlesQuery->where('title', 'like', '%' . $request->input('name') . '%');
        }

        // Total Articles
        $articleCount = $articlesQuery->count();

        // Change the value of the variables
        $articles = $articlesQuery->get()->map(function ($article) {
            return [
                'id' => $article->id,
                'name' => $article->title,
                'description' => $article->details,
                'price' => $article->total,
                'stock' => $article->cost
            ];
        });

        return response()->json([
            'article' => $articles,
            'articleCount' => $articleCount,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Article();
        $product->title = $request->name;
        $product->details = $request->description;
        $product->total = $request->price;
        $product->cost = $request->stock;

        $product->save();

        return response()->json([
            'message' => 'success',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            // Id
            $id = $request->input('id');

            // Actualizar el producto en la base de datos
            $product = Article::find($id);
            $product->id = $id;
            $product->title = $request->input('name');
            $product->details = $request->input('description');
            $product->total = $request->input('stock');
            $product->cost = $request->input('price');
            $product->save();


            // Devolver una respuesta de éxito
            return response()->json(['message' => 'success']);
        } catch (\Exception $e) {
            // Devolver una respuesta de error
            return response()->json(['message' => 'Error al actualizar el producto'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Article::destroy($id);
        return $product;
    }
}
