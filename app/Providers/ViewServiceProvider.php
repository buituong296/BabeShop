<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        view()->composer('partials.header', function ($view) {
            $userId = auth()->id();
            $cartItems = \App\Models\Cart::where('user_id', $userId)->with('variant')->get();
    
            // Calculate the total amount
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->variant->sale_price * $item->quantity;
            });
    
            // Share both cart items and total amount with the view
            $view->with([
                'cartItems' => $cartItems,
                'totalAmount' => $totalAmount,
            ]);
        });
    }
    
}
