<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\FileUploadPublicTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrderFrontController extends Controller
{
    use FileUploadPublicTrait;
    protected $collectionName = 'categories';
    protected $fileFields = ['image'];
    public function create(Request $request)
    {
        // البيانات موجودة في $request->data كـ JSON string
        $data = json_decode($request->input('data'), true);

        if (!$data) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        DB::beginTransaction();

        try {
            // حفظ صورة الدفع لو موجودة
            $paymentProofPath = null;
            if ($request->hasFile('image')) {
                // رفع الملف على disk public داخل folder payments
                $path = $request->file('image')->store('payments', 'public');

                // إنشاء URL كامل يبدأ من الدومين
                $fullUrl = url(Storage::url($path));
                // مثال: https://yourdomain.com/storage/payments/abc123.png

                $paymentProofPath = $fullUrl;
            } else {
                $paymentProofPath = null;
            }

            // إنشاء الطلب
            $order = Order::create([
                'paymentMethod' => $data['paymentMethod'] ?? null,
                'transactionNumber' => $data['transactionNumber'] ?? null,
                'walletPhone' => $data['walletPhone'] ?? null,
                'customerEmail' => $data['shippingInfo']['email'] ?? null,
                'customerFirstName' => $data['shippingInfo']['firstName'] ?? null,
                'customerLastName' => $data['shippingInfo']['lastName'] ?? null,
                'customerAddress' => $data['shippingInfo']['address'] ?? null,
                'customerCity' => $data['shippingInfo']['city'] ?? null,
                'customerState' => $data['shippingInfo']['state'] ?? null,
                'customerZip' => $data['shippingInfo']['zip'] ?? null,
                'subtotal' => $data['subtotal'] ?? 0,
                'shipping' => $data['shipping'] ?? 0,
                'total' => $data['total'] ?? 0,
                'paymentProof' => $paymentProofPath, // هنا تتحط الصورة
            ]);

            // حفظ كل منتجات الطلب
            foreach ($data['cart'] as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function myOrder(Request $request)
    {
        $user = $request->user();

        $order = Order::with('items.product')
            ->where('customerEmail', $user->email)
            ->get();
        return response()->json($order);
    }
}
