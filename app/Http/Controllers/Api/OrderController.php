<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        return response()->json(Order::with('items')->get());
    }
    public function show(Order $order)
    {
        $order->load('items'); // eager load

        return $this->successResponse($order);
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|string',
        ]);

        $order->update($data);
        return response()->json($order);
    }
}
