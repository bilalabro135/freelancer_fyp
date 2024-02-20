<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\PaymentMethod;
use Spatie\Permission\Models\Role;
use App\Models\SubCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_ids = [
            2,3
        ];

        $payment_method = PaymentMethod::create([
            'method_title' => 'Online Payment Method',
            'description' => 'Online payment allows you to pay money via the internet. Buyers will use this type of payment when they purchase goods online or offline. They can use different types of online payment methods, including debit/credit cards, wire transfers, net banking, and digital wallets.'
        ]);

        $printing_cats = [
            'Prototyping and Manufacturing',

            'Rapid Prototyping',
            'End-use Parts',
            'Batch Production',
            'Art and Sculptures',

            'Figurines',
            'Art Installations',
            'Custom Sculptures',
            'Home and Garden',

            'Home Decor',
            'Kitchen Gadgets',
            'Outdoor and Garden Accessories',
            'Educational Models',

            'Scientific Models',
            'Geographical Terrain Models',
            'Historical Artifacts Replicas',
            'Toys and Games',

            'Board Game Pieces',
            'Custom Toys',
            'Educational Toys',
            'Custom Gifts and Personalization',

            'Personalized Figurines',
            'Customized Keychains',
            'Bespoke Jewelry',
            'Medical Models and Prosthetics',

            'Patient-specific Models for Surgical Planning',
            'Custom Prosthetics and Orthotics',
            'Dental Models',
            'Tech Gadgets and Accessories',

            'Smartphone Cases',
            'Computer and Gaming Accessories',
            'Drone Parts',
        ];

        $designing_cats = [
            'Product Design',

            'Consumer Products',
            'Electronics Enclosures',
            'Tools and Equipment',
            'Architectural Design',

            'Residential Buildings',
            'Commercial Buildings',
            'Landscape and Urban Planning',
            'Character and Creature Design',

            'Video Games',
            'Animation',
            'Collectibles',
            'Jewelry Design',

            'Rings',
            'Necklaces',
            'Bracelets',
            'Automotive Design',

            'Vehicle Parts',
            'Custom Car Accessories',
            'Prototyping Components',
            'Industrial Design',

            'Machinery Parts',
            'Prototypes for Manufacturing',
            'Custom Fixtures',
            'Fashion and Apparel',

            'Accessories',
            'Footwear',
            'Wearable Technology',
            'Medical and Dental',

            'Prosthetics',
            'Dental Devices',
            'Anatomical Models',
        ];

        foreach ($role_ids as $value) {
            $roles = Role::where('id',$value)->first();
            if (!empty($roles) && $roles->id == 2) {
                foreach ($designing_cats as $design) {
                    $data   = Category::create([
                        'name' => $design,
                        'role_id' => 2
                    ]);
                }
            }elseif (!empty($roles) && $roles->id == 3) {
                foreach ($printing_cats as $vendor) {
                    $data   = Category::create([
                        'name' => $vendor,
                        'role_id' => 3
                    ]);
                }
            }
        }
    }
}
