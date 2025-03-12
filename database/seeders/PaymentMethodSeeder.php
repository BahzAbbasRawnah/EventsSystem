<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentMethods = [
            [
                'name_en' => 'Visa Card',
                'name_ar' => 'فيزا كارد',
                'image' => 'payment_methods/visa.png',
                'code' => 'CC',
            ],
            [
                'name_en' => 'PayPal',
                'name_ar' => 'باي بال',
                'image' => 'payment_methods/paypal.png',
                'code' => 'PP',
            ],
            [
                'name_en' => 'Master Card',
                'name_ar' => 'ماستر كارد',
                'image' => 'payment_methods/mastercard.png',
                'code' => 'AP',
            ],
            [
                'name_en' => 'Bank Transfer',
                'name_ar' => 'تحويل بنكي',
                'image' => 'payment_methods/bank.png',
                'code' => 'BT',
            ],
            [
                'name_en' => 'Cash on Delivery',
                'name_ar' => 'الدفع عند الاستلام',
                'image' => 'payment_methods/cash_on_delivery.png',
                'code' => 'COD',
            ],
        ];

        // Insert data into the payment_methods table
        foreach ($paymentMethods as $method) {
            DB::table('payment_methods')->insert([
                'name_en' => $method['name_en'],
                'name_ar' => $method['name_ar'],
                'image' => $method['image'],
                'code' => $method['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}