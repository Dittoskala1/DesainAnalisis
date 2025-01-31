<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('email', 'cust@admin.com')->first();

        if ($customer) {
            // Menambahkan beberapa data order untuk customer
            Order::create([
                'customer_id' => $customer->id,
                'product_name' => 'Product A',
                'quantity' => 2,
                'total_price' => 200.00
            ]);

            Order::create([
                'customer_id' => $customer->id,
                'product_name' => 'Product B',
                'quantity' => 1,
                'total_price' => 100.00
            ]);
        }
    }
}
