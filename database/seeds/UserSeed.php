<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table("users")->insert([

        	[	
        		
                "first_name"=>"Christiana",
                "last_name"=>"Ifeanyi",
                "other_names"=>"Vitalis",
                "username"=>"admin101",
                "email"=>"admin@admin.com",
                "phone"=>"08163922749",
                "next_of_kin"=>"Ifeanyi Chukwu",
                "mother_m_name"=>"Chukwu",
                "birthday"=>"July 2000",
                "user_type"=>"admin",

                "res_address"=>"No 10 Nsukka Road Enugu State",
                "home_address"=>"No 10 Nsukka Road Ebonyi State",
                "lga"=>"Ikwo LGA",
                "state"=>"Enugu State",

        		"password"=>bcrypt('admin101'),
        		
            ],

    
        ]);
    }
    
}
