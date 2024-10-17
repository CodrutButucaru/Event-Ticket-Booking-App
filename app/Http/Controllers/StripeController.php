<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Stripe\Checkout\Session;



class StripeController extends Controller
{
    public function checkout(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Autentificarea cu cheia secretă a API-ului Stripe
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        // Crearea unei liste de produse pentru sesiunea de checkout
        $productItems = [];

        foreach (session('cos') as $id => $details) {
            $nume = $details['nume'];
            $total = $details['pret'];
            $quantity = $details['quantity'];

            $unit_amount = $total * 100; // Convertirea prețului în cenți

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $nume,
                    ],
                    'currency'     => 'RON',
                    'unit_amount'  => $unit_amount,
                ],
                'quantity' => $quantity
            ];
        }

        // Crearea sesiunii de checkout
        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items'           => $productItems,
            'mode'                 => 'payment',
            'success_url'          => route('success'),
            'cancel_url'           => route('cancel'),
        ]);

        // Redirecționarea către pagina de checkout a Stripe
        return redirect()->away($checkoutSession->url);
    }

    public function success(): string
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

    public function cancel(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('cancel');
    }
}
