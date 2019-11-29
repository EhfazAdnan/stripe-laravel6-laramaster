<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class PaymentController extends Controller
{
    public function store(Request $request){
       try{
           $charge = Stripe::charges()->create([
               'amount' => 100,
               'currency' => "USD",
               'source' => $request->stripeToken,
               'description' => 'Order',
               'receipt_email' => "admin@email.com",
               'metadata' => [
                   'quantity' => 3,
               ],
           ]);
       }catch(Exception $e){

       }
       return "ok";
    }
}
