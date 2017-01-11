<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Siebe Vanden Eynden',
                'email' => 'mexican.monkey@live.be',
                'password' => '$2y$10$Lb8L.N4K/Y1.1AoPMSyNYOPMrRJxgXpOXE6vB2Lj1TrgdHno5eKnG',
                'remember_token' => 'XF5qqi47KBDEJWDN8RgAp7Z2pbWUsXPBimrEsg54SCyZ0DSc4aZJudSq4h3L',
                'created_at' => '2017-01-11 21:27:36',
                'updated_at' => '2017-01-11 22:01:54',
            ),
        ));
        
        
    }
}