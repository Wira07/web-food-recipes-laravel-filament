<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RecipeResource;
use Illuminate\Http\Request;
use App\Models\Recipe;  

class RecipeController extends Controller
{
    //
    public function index()
    {
        $recipes = Recipe::with(['photos', 'category'])->get();
        return RecipeResource::collection($recipes);
    }

    public function show(Recipe $recipe)
    {
        $recipe->load(['category', 'photos', 'author', 'tutorials', 'recipeIngredients.ingredient']);
        return new RecipeResource($recipe);
    }
}
