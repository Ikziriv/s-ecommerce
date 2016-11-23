<?php

namespace App\Policies;

use App\Cart;
use App\Product;
use App\User;

class ProductPolicy
{
    /**
     * Grant all abilities to administrator.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return bool
     */
	public function before(User $user, $ability)
	{
	    if (session('status') === 'admin') {
	        return true;
	    }
	}

    /**
     * Determine if the given post can be changed by the user.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    public function change(User $user, Product $product)
    {
        return $user->id === $product->user_id;
    }

}
