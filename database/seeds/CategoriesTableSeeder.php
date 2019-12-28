<?php

use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\User;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user_id = User::where('email','sbnibro256@gmail.com')->first()->id;

        $cats = [
        	[
        		'name'			=> 'central-uganda',
	        	'type'			=> 'company',
	        	'display_name'	=> 'Central Uganda',
	        	'description'	=> 'Based in central Uganda',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'western-uganda',
	        	'type'			=> 'company',
	        	'display_name'	=> 'Western Uganda',
	        	'description'	=> 'Based in western Uganda',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'nothern-uganda',
	        	'type'			=> 'company',
	        	'display_name'	=> 'Northern Uganda',
	        	'description'	=> 'Based in northern Uganda',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'eastern-uganda',
	        	'type'			=> 'company',
	        	'display_name'	=> 'Eastern Uganda',
	        	'description'	=> 'Based in eastern Uganda',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'children-salon',
	        	'type'			=> 'salon-gender',
	        	'display_name'	=> 'Children Salon',
	        	'description'	=> 'A salon for children',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'men-salon',
	        	'type'			=> 'salon-gender',
	        	'display_name'	=> 'Men Salon',
	        	'description'	=> 'A salon for men services',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'women-salon',
	        	'type'			=> 'salon-gender',
	        	'display_name'	=> 'Women Salon',
	        	'description'	=> 'A salon for women services',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'unisex-salon',
	        	'type'			=> 'salon-gender',
	        	'display_name'	=> 'Unisex Salon',
	        	'description'	=> 'A unisex salon for unisex services',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'party-dressing',
	        	'type'			=> 'salon-gender',
	        	'display_name'	=> 'Party Dressing',
	        	'description'	=> 'A salon for ceremony and parties like events',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'hair-salon',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Hair Salon',
	        	'description'	=> 'A salon providing hair services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'face-salon',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Face Salon',
	        	'description'	=> 'A salon providing face services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'nails-salon',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Nails Salon',
	        	'description'	=> 'A salon providing nail services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'hand-body',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Hand & Body',
	        	'description'	=> 'A salon providing hands, legs and a few body services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'full-body',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Full Body',
	        	'description'	=> 'A salon providing full body services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'massage-salon',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Massage Service',
	        	'description'	=> 'A salon providing massage services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'tattoo-service',
	        	'type'			=> 'salon-style',
	        	'display_name'	=> 'Tattoo Service',
	        	'description'	=> 'A salon providing tattoo services and more',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'children-products',
	        	'type'			=> 'products-gender',
	        	'display_name'	=> 'Children Products',
	        	'description'	=> 'Children salon and fashion products sold and are available',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'men-products',
	        	'type'			=> 'products-gender',
	        	'display_name'	=> 'Male Products',
	        	'description'	=> 'Men salon and fashion products sold and are available',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'female-products',
	        	'type'			=> 'products-gender',
	        	'display_name'	=> 'Women Products',
	        	'description'	=> 'Women salon and fashion products sold and are available',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'unisex-products',
	        	'type'			=> 'products-gender',
	        	'display_name'	=> 'Unisex Products',
	        	'description'	=> 'Other products sold for unisex salon and fashion services',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'children',
	        	'type'			=> 'children-style',
	        	'display_name'	=> 'Children Styles',
	        	'description'	=> 'Fashion styles for children',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'male-styles',
	        	'type'			=> 'male-style',
	        	'display_name'	=> 'Men Styles',
	        	'description'	=> 'Fashion styles for men',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'female-styles',
	        	'type'			=> 'female-style',
	        	'display_name'	=> 'Women Styles',
	        	'description'	=> 'Fashion Styles for women',
	        	'user_id' 		=> $user_id,
        	],
        	[
        		'name'			=> 'unisex-styles',
	        	'type'			=> 'unisex-style',
	        	'display_name'	=> 'Other Styles',
	        	'description'	=> 'Fashion styles for unisex and others',
	        	'user_id' 		=> $user_id,
        	],
        ];

        foreach ($cats as $key => $value) {
        	Categories::create($value);
        }
    }
}
