<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Recipe $recipe
     * @return bool
     */
    
    public function checkRecipeOwner(User $user, Recipe $recipe){
        return $user->id === $recipe->creator_id;
    }

    public function destroy(User $user, Recipe $recipe){
        return $user->id === $recipe->creator_id;
    }
}
