<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Crypt;
use App\Models\Erb;
use App\Models\ApiToken;

class AddErbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $erb = new Erb();
        $erb->id = 1;
        $erb->user_id = 1;
        $erb->num_serie = 222233331;
        $erb->name_machine = 'Sensor Device';
        $erb->nick_name = 'Erb_1';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        /*$erb = new Erb();
        $erb->id = 2;
        $erb->user_id = 1;
        $erb->num_serie = 222233332;
        $erb->name_machine = 'Bean bag toss';
        $erb->nick_name = 'Erb_2';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 3;
        $erb->user_id = 1;
        $erb->num_serie = 222233333;
        $erb->name_machine = 'Black hole';
        $erb->nick_name = 'Erb_3';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 4;
        $erb->user_id = 1;
        $erb->num_serie = 222233334;
        $erb->name_machine = 'Candy fall';
        $erb->nick_name = 'Erb_4';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 5;
        $erb->user_id = 1;
        $erb->num_serie = 222233335;
        $erb->name_machine = 'Cartooon coaster';
        $erb->nick_name = 'Erb_5';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 6;
        $erb->user_id = 1;
        $erb->num_serie = 222233336;
        $erb->name_machine = 'Crazy animals';
        $erb->nick_name = 'Erb_6';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 7;
        $erb->user_id = 1;
        $erb->num_serie = 222233337;
        $erb->name_machine = 'Crazy Canoe';
        $erb->nick_name = 'Erb_7';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 8;
        $erb->user_id = 1;
        $erb->num_serie = 222233338;
        $erb->name_machine = 'Cross y road';
        $erb->nick_name = 'Erb_8';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 9;
        $erb->user_id = 1;
        $erb->num_serie = 222233339;
        $erb->name_machine = 'Deal or no Deal';
        $erb->nick_name = 'Erb_9';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 10;
        $erb->user_id = 1;
        $erb->num_serie = 222233340;
        $erb->name_machine = 'Dino battle';
        $erb->nick_name = 'Erb_10';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();*/

        /*$erb = new Erb();
        $erb->id = 11;
        $erb->user_id = 4;
        $erb->name_machine = 'Down the clown';
        $erb->nick_name = 'Erb_11';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 12;
        $erb->user_id = 4;
        $erb->name_machine = 'Fishbowl frenzy';
        $erb->nick_name = 'Erb_12';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 13;
        $erb->user_id = 4;
        $erb->name_machine = 'Fishing island';
        $erb->nick_name = 'Erb_13';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 14;
        $erb->user_id = 4;
        $erb->name_machine = 'Fishing Wheel';
        $erb->nick_name = 'Erb_14';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 15;
        $erb->user_id = 4;
        $erb->name_machine = 'Fishing Wheel';
        $erb->nick_name = 'Erb_15';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 16;
        $erb->user_id = 4;
        $erb->name_machine = 'Flying tickets';
        $erb->nick_name = 'Erb_16';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 17;
        $erb->user_id = 4;
        $erb->name_machine = 'Football league';
        $erb->nick_name = 'Erb_17';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 18;
        $erb->user_id = 4;
        $erb->name_machine = 'Gold fishing';
        $erb->nick_name = 'Erb_18';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 19;
        $erb->user_id = 4;
        $erb->name_machine = 'Golden gear';
        $erb->nick_name = 'Erb_19';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 20;
        $erb->user_id = 4;
        $erb->name_machine = 'Happy scooter';
        $erb->nick_name = 'Erb_20';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();


        $erb = new Erb();
        $erb->id = 21;
        $erb->user_id = 4;
        $erb->name_machine = 'Ice ball';
        $erb->nick_name = 'Erb_21';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 22;
        $erb->user_id = 4;
        $erb->name_machine = 'Ice ball';
        $erb->nick_name = 'Erb_22';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 23;
        $erb->user_id = 4;
        $erb->name_machine = 'Ice ball';
        $erb->nick_name = 'Erb_23';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 24;
        $erb->user_id = 4;
        $erb->name_machine = 'Knock out';
        $erb->nick_name = 'Erb_24';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 25;
        $erb->user_id = 4;
        $erb->name_machine = 'Kung fun panda';
        $erb->nick_name = 'Erb_25';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 26;
        $erb->user_id = 4;
        $erb->name_machine = 'Lane master';
        $erb->nick_name = 'Erb_26';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 27;
        $erb->user_id = 4;
        $erb->name_machine = 'Milk jug toss';
        $erb->nick_name = 'Erb_27';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 28;
        $erb->user_id = 4;
        $erb->name_machine = 'Monopoly';
        $erb->nick_name = 'Erb_28';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 29;
        $erb->user_id = 4;
        $erb->name_machine = 'Monster drop';
        $erb->nick_name = 'Erb_29';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 30;
        $erb->user_id = 4;
        $erb->name_machine = 'MVP basket';
        $erb->nick_name = 'Erb_30';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 31;
        $erb->user_id = 4;
        $erb->name_machine = 'MVP basket';
        $erb->nick_name = 'Erb_31';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 32;
        $erb->user_id = 4;
        $erb->name_machine = 'Naughty builder';
        $erb->nick_name = 'Erb_32';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 33;
        $erb->user_id = 4;
        $erb->name_machine = 'Nerf';
        $erb->nick_name = 'Erb_33';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 34;
        $erb->user_id = 4;
        $erb->name_machine = 'Paw patrol';
        $erb->nick_name = 'Erb_34';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 35;
        $erb->user_id = 4;
        $erb->name_machine = 'Pink panther';
        $erb->nick_name = 'Erb_35';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 36;
        $erb->user_id = 4;
        $erb->name_machine = 'Pirates fall';
        $erb->nick_name = 'Erb_36';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 37;
        $erb->user_id = 4;
        $erb->name_machine = 'Saving any';
        $erb->nick_name = 'Erb_37';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 38;
        $erb->user_id = 4;
        $erb->name_machine = 'Soccer bob sponge';
        $erb->nick_name = 'Erb_38';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 39;
        $erb->user_id = 4;
        $erb->name_machine = 'Space frenzy';
        $erb->nick_name = 'Erb_39';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 40;
        $erb->user_id = 4;
        $erb->name_machine = 'Spin n dolphin';
        $erb->nick_name = 'Erb_40';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        
        $erb = new Erb();
        $erb->id = 41;
        $erb->user_id = 4;
        $erb->name_machine = 'Spinner';
        $erb->nick_name = 'Erb_41';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 42;
        $erb->user_id = 4;
        $erb->name_machine = 'Tight the rope';
        $erb->nick_name = 'Erb_42';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 43;
        $erb->user_id = 4;
        $erb->name_machine = 'Treasure Quest';
        $erb->nick_name = 'Erb_43';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 44;
        $erb->user_id = 4;
        $erb->name_machine = 'Ultimate fight';
        $erb->nick_name = 'Erb_44';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 45;
        $erb->user_id = 4;
        $erb->name_machine = 'Wacamole bob sponge';
        $erb->nick_name = 'Erb_45';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 46;
        $erb->user_id = 4;
        $erb->name_machine = 'Whack n win';
        $erb->nick_name = 'Erb_46';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 47;
        $erb->user_id = 4;
        $erb->name_machine = 'Zombie land';
        $erb->nick_name = 'Erb_47';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 48;
        $erb->user_id = 4;
        $erb->name_machine = 'Triki_trake';
        $erb->nick_name = 'Erb_48';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 49;
        $erb->user_id = 4;
        $erb->name_machine = 'Moto gp';
        $erb->nick_name = 'Erb_49';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 50;
        $erb->user_id = 4;
        $erb->name_machine = 'Moto gp';
        $erb->nick_name = 'Erb_50';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();


        $erb = new Erb();
        $erb->id = 51;
        $erb->user_id = 4;
        $erb->name_machine = 'Over take';
        $erb->nick_name = 'Erb_51';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 52;
        $erb->user_id = 4;
        $erb->name_machine = 'Over take';
        $erb->nick_name = 'Erb_52';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 53;
        $erb->user_id = 4;
        $erb->name_machine = 'Storm racer';
        $erb->nick_name = 'Erb_53';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 54;
        $erb->user_id = 4;
        $erb->name_machine = 'Storm racer';
        $erb->nick_name = 'Erb_54';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 55;
        $erb->user_id = 4;
        $erb->name_machine = 'Super bikes';
        $erb->nick_name = 'Erb_55';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 56;
        $erb->user_id = 4;
        $erb->name_machine = 'Super bikes';
        $erb->nick_name = 'Erb_56';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 57;
        $erb->user_id = 4;
        $erb->name_machine = 'Jurassic park';
        $erb->nick_name = 'Erb_57';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 58;
        $erb->user_id = 4;
        $erb->name_machine = 'Piratas';
        $erb->nick_name = 'Erb_58';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 59;
        $erb->user_id = 4;
        $erb->name_machine = 'Pump it up';
        $erb->nick_name = 'Erb_59';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 60;
        $erb->user_id = 4;
        $erb->name_machine = 'Transformers';
        $erb->nick_name = 'Erb_60';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();


        $erb = new Erb();
        $erb->id = 61;
        $erb->user_id = 4;
        $erb->name_machine = 'Walking dead';
        $erb->nick_name = 'Erb_61';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 62;
        $erb->user_id = 4;
        $erb->name_machine = 'Around the world';
        $erb->nick_name = 'Erb_62';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 63;
        $erb->user_id = 4;
        $erb->name_machine = 'Big machine';
        $erb->nick_name = 'Erb_63';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 64;
        $erb->user_id = 4;
        $erb->name_machine = 'Dinning bus';
        $erb->nick_name = 'Erb_64';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 65;
        $erb->user_id = 4;
        $erb->name_machine = 'Fire truck';
        $erb->nick_name = 'Erb_65';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 66;
        $erb->user_id = 4;
        $erb->name_machine = 'Lifting plane';
        $erb->nick_name = 'Erb_66';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
        
        $erb = new Erb();
        $erb->id = 67;
        $erb->user_id = 4;
        $erb->name_machine = 'Peppa pig';
        $erb->nick_name = 'Erb_67';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 68;
        $erb->user_id = 4;
        $erb->name_machine = 'Police D&A';
        $erb->nick_name = 'Erb_68';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();
       
        $erb = new Erb();
        $erb->id = 69;
        $erb->user_id = 4;
        $erb->name_machine = 'Power truck';
        $erb->nick_name = 'Erb_69';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 70;
        $erb->user_id = 4;
        $erb->name_machine = 'Twister';
        $erb->nick_name = 'Erb_70';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 71;
        $erb->user_id = 4;
        $erb->name_machine = 'Vintage car';
        $erb->nick_name = 'Erb_71';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 72;
        $erb->user_id = 4;
        $erb->name_machine = 'Barber cut';
        $erb->nick_name = 'Erb_72';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 73;
        $erb->user_id = 4;
        $erb->name_machine = 'Barber peluche';
        $erb->nick_name = 'Erb_73';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 74;
        $erb->user_id = 4;
        $erb->name_machine = 'Chocolate factory';
        $erb->nick_name = 'Erb_74';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 75;
        $erb->user_id = 4;
        $erb->name_machine = 'Super Star';
        $erb->nick_name = 'Erb_75';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 76;
        $erb->user_id = 4;
        $erb->name_machine = 'Peluchitos';
        $erb->nick_name = 'Erb_76';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 77;
        $erb->user_id = 4;
        $erb->name_machine = 'Peluchitos';
        $erb->nick_name = 'Erb_77';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 78;
        $erb->user_id = 4;
        $erb->name_machine = 'Peluchitos';
        $erb->nick_name = 'Erb_78';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 79;
        $erb->user_id = 4;
        $erb->name_machine = 'Super star';
        $erb->nick_name = 'Erb_79';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 80;
        $erb->user_id = 4;
        $erb->name_machine = 'Peluchitos';
        $erb->nick_name = 'Erb_80';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 81;
        $erb->user_id = 4;
        $erb->name_machine = 'Hockey Baby';
        $erb->nick_name = 'Erb_81';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 82;
        $erb->user_id = 4;
        $erb->name_machine = 'Mesa Evo';
        $erb->nick_name = 'Erb_82';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 83;
        $erb->user_id = 4;
        $erb->name_machine = 'Mesa EVO 220';
        $erb->nick_name = 'Erb_83';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 84;
        $erb->user_id = 4;
        $erb->name_machine = 'Mecanico chocones 100';
        $erb->nick_name = 'Erb_84';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 85;
        $erb->user_id = 4;
        $erb->name_machine = 'Play ground 100';
        $erb->nick_name = 'Erb_85';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 86;
        $erb->user_id = 4;
        $erb->name_machine = 'VR eagle fly';
        $erb->nick_name = 'Erb_86';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();

        $erb = new Erb();
        $erb->id = 87;
        $erb->user_id = 4;
        $erb->name_machine = 'VR eggs';
        $erb->nick_name = 'Erb_87';
        $erb->password = Crypt::encrypt('erb123');
        $erb->api_token = ApiToken::GenerateToken16();
        $erb->save();*/
        
    }
}
