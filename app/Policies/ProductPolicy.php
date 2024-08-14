<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the product.
     */
    public function update(User $user, Product $product)
    {
        Log::info('Checking update authorization for user ID: ' . $user->id . ' and product owner ID: ' . $product->user_id);
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the product.
     */
    public function delete(User $user, Product $product)
    {
        // Example: Allow delete if the user is the owner of the product
        return $user->id === $product->user_id;
    }
}
