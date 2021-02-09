<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Crypt;
use App\Crd;
use App\ApiToken;

class AddCrdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $crd = new Crd();
        $crd->id = 1;
        $crd->user_id = 1;
        $crd->num_serie = 333344441;
        $crd->name_machine = 'Angry birds';
        $crd->nick_name = 'Crd_1';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 2;
        $crd->user_id = 1;
        $crd->num_serie = 333344442;
        $crd->name_machine = 'Bean bag toss';
        $crd->nick_name = 'Crd_2';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 3;
        $crd->user_id = 1;
        $crd->num_serie = 333344443;
        $crd->name_machine = 'Black hole';
        $crd->nick_name = 'Crd_3';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 4;
        $crd->user_id = 1;
        $crd->num_serie = 333344444;
        $crd->name_machine = 'Candy fall';
        $crd->nick_name = 'Crd_4';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 5;
        $crd->user_id = 1;
        $crd->num_serie = 333344445;
        $crd->name_machine = 'Cartooon coaster';
        $crd->nick_name = 'Crd_5';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 6;
        $crd->user_id = 1;
        $crd->num_serie = 333344446;
        $crd->name_machine = 'Crazy animals';
        $crd->nick_name = 'Crd_6';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 7;
        $crd->user_id = 1;
        $crd->num_serie = 333344447;
        $crd->name_machine = 'Crazy Canoe';
        $crd->nick_name = 'Crd_7';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 8;
        $crd->user_id = 1;
        $crd->num_serie = 333344448;
        $crd->name_machine = 'Cross y road';
        $crd->nick_name = 'Crd_8';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 9;
        $crd->user_id = 1;
        $crd->num_serie = 333344449;
        $crd->name_machine = 'Deal or no Deal';
        $crd->nick_name = 'Crd_9';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        /*$crd = new Crd();
        $crd->id = 10;
        $crd->user_id = 3;
        $crd->name_machine = 'Dino battle';
        $crd->nick_name = 'Crd_10';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 11;
        $crd->user_id = 4;
        $crd->name_machine = 'Down the clown';
        $crd->nick_name = 'Crd_11';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 12;
        $crd->user_id = 4;
        $crd->name_machine = 'Fishbowl frenzy';
        $crd->nick_name = 'Crd_12';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 13;
        $crd->user_id = 4;
        $crd->name_machine = 'Fishing island';
        $crd->nick_name = 'Crd_13';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 14;
        $crd->user_id = 4;
        $crd->name_machine = 'Fishing Wheel';
        $crd->nick_name = 'Crd_14';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 15;
        $crd->user_id = 4;
        $crd->name_machine = 'Fishing Wheel';
        $crd->nick_name = 'Crd_15';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 16;
        $crd->user_id = 4;
        $crd->name_machine = 'Flying tickets';
        $crd->nick_name = 'Crd_16';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 17;
        $crd->user_id = 4;
        $crd->name_machine = 'Football league';
        $crd->nick_name = 'Crd_17';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 18;
        $crd->user_id = 4;
        $crd->name_machine = 'Gold fishing';
        $crd->nick_name = 'Crd_18';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 19;
        $crd->user_id = 4;
        $crd->name_machine = 'Golden gear';
        $crd->nick_name = 'Crd_19';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 20;
        $crd->user_id = 4;
        $crd->name_machine = 'Happy scooter';
        $crd->nick_name = 'Crd_20';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();


        $crd = new Crd();
        $crd->id = 21;
        $crd->user_id = 4;
        $crd->name_machine = 'Ice ball';
        $crd->nick_name = 'Crd_21';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 22;
        $crd->user_id = 4;
        $crd->name_machine = 'Ice ball';
        $crd->nick_name = 'Crd_22';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 23;
        $crd->user_id = 4;
        $crd->name_machine = 'Ice ball';
        $crd->nick_name = 'Crd_23';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 24;
        $crd->user_id = 4;
        $crd->name_machine = 'Knock out';
        $crd->nick_name = 'Crd_24';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 25;
        $crd->user_id = 4;
        $crd->name_machine = 'Kung fun panda';
        $crd->nick_name = 'Crd_25';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 26;
        $crd->user_id = 4;
        $crd->name_machine = 'Lane master';
        $crd->nick_name = 'Crd_26';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 27;
        $crd->user_id = 4;
        $crd->name_machine = 'Milk jug toss';
        $crd->nick_name = 'Crd_27';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 28;
        $crd->user_id = 4;
        $crd->name_machine = 'Monopoly';
        $crd->nick_name = 'Crd_28';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 29;
        $crd->user_id = 4;
        $crd->name_machine = 'Monster drop';
        $crd->nick_name = 'Crd_29';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 30;
        $crd->user_id = 4;
        $crd->name_machine = 'MVP basket';
        $crd->nick_name = 'Crd_30';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 31;
        $crd->user_id = 4;
        $crd->name_machine = 'MVP basket';
        $crd->nick_name = 'Crd_31';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 32;
        $crd->user_id = 4;
        $crd->name_machine = 'Naughty builder';
        $crd->nick_name = 'Crd_32';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 33;
        $crd->user_id = 4;
        $crd->name_machine = 'Nerf';
        $crd->nick_name = 'Crd_33';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 34;
        $crd->user_id = 4;
        $crd->name_machine = 'Paw patrol';
        $crd->nick_name = 'Crd_34';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 35;
        $crd->user_id = 4;
        $crd->name_machine = 'Pink panther';
        $crd->nick_name = 'Crd_35';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 36;
        $crd->user_id = 4;
        $crd->name_machine = 'Pirates fall';
        $crd->nick_name = 'Crd_36';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 37;
        $crd->user_id = 4;
        $crd->name_machine = 'Saving any';
        $crd->nick_name = 'Crd_37';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 38;
        $crd->user_id = 4;
        $crd->name_machine = 'Soccer bob sponge';
        $crd->nick_name = 'Crd_38';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 39;
        $crd->user_id = 4;
        $crd->name_machine = 'Space frenzy';
        $crd->nick_name = 'Crd_39';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 40;
        $crd->user_id = 4;
        $crd->name_machine = 'Spin n dolphin';
        $crd->nick_name = 'Crd_40';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        
        $crd = new Crd();
        $crd->id = 41;
        $crd->user_id = 4;
        $crd->name_machine = 'Spinner';
        $crd->nick_name = 'Crd_41';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 42;
        $crd->user_id = 4;
        $crd->name_machine = 'Tight the rope';
        $crd->nick_name = 'Crd_42';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 43;
        $crd->user_id = 4;
        $crd->name_machine = 'Treasure Quest';
        $crd->nick_name = 'Crd_43';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 44;
        $crd->user_id = 4;
        $crd->name_machine = 'Ultimate fight';
        $crd->nick_name = 'Crd_44';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 45;
        $crd->user_id = 4;
        $crd->name_machine = 'Wacamole bob sponge';
        $crd->nick_name = 'Crd_45';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 46;
        $crd->user_id = 4;
        $crd->name_machine = 'Whack n win';
        $crd->nick_name = 'Crd_46';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 47;
        $crd->user_id = 4;
        $crd->name_machine = 'Zombie land';
        $crd->nick_name = 'Crd_47';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 48;
        $crd->user_id = 4;
        $crd->name_machine = 'Triki_trake';
        $crd->nick_name = 'Crd_48';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 49;
        $crd->user_id = 4;
        $crd->name_machine = 'Moto gp';
        $crd->nick_name = 'Crd_49';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 50;
        $crd->user_id = 4;
        $crd->name_machine = 'Moto gp';
        $crd->nick_name = 'Crd_50';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();


        $crd = new Crd();
        $crd->id = 51;
        $crd->user_id = 4;
        $crd->name_machine = 'Over take';
        $crd->nick_name = 'Crd_51';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 52;
        $crd->user_id = 4;
        $crd->name_machine = 'Over take';
        $crd->nick_name = 'Crd_52';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 53;
        $crd->user_id = 4;
        $crd->name_machine = 'Storm racer';
        $crd->nick_name = 'Crd_53';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 54;
        $crd->user_id = 4;
        $crd->name_machine = 'Storm racer';
        $crd->nick_name = 'Crd_54';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 55;
        $crd->user_id = 4;
        $crd->name_machine = 'Super bikes';
        $crd->nick_name = 'Crd_55';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 56;
        $crd->user_id = 4;
        $crd->name_machine = 'Super bikes';
        $crd->nick_name = 'Crd_56';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 57;
        $crd->user_id = 4;
        $crd->name_machine = 'Jurassic park';
        $crd->nick_name = 'Crd_57';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 58;
        $crd->user_id = 4;
        $crd->name_machine = 'Piratas';
        $crd->nick_name = 'Crd_58';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 59;
        $crd->user_id = 4;
        $crd->name_machine = 'Pump it up';
        $crd->nick_name = 'Crd_59';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 60;
        $crd->user_id = 4;
        $crd->name_machine = 'Transformers';
        $crd->nick_name = 'Crd_60';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();


        $crd = new Crd();
        $crd->id = 61;
        $crd->user_id = 4;
        $crd->name_machine = 'Walking dead';
        $crd->nick_name = 'Crd_61';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 62;
        $crd->user_id = 4;
        $crd->name_machine = 'Around the world';
        $crd->nick_name = 'Crd_62';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 63;
        $crd->user_id = 4;
        $crd->name_machine = 'Big machine';
        $crd->nick_name = 'Crd_63';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 64;
        $crd->user_id = 4;
        $crd->name_machine = 'Dinning bus';
        $crd->nick_name = 'Crd_64';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 65;
        $crd->user_id = 4;
        $crd->name_machine = 'Fire truck';
        $crd->nick_name = 'Crd_65';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 66;
        $crd->user_id = 4;
        $crd->name_machine = 'Lifting plane';
        $crd->nick_name = 'Crd_66';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
        
        $crd = new Crd();
        $crd->id = 67;
        $crd->user_id = 4;
        $crd->name_machine = 'Peppa pig';
        $crd->nick_name = 'Crd_67';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 68;
        $crd->user_id = 4;
        $crd->name_machine = 'Police D&A';
        $crd->nick_name = 'Crd_68';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();
       
        $crd = new Crd();
        $crd->id = 69;
        $crd->user_id = 4;
        $crd->name_machine = 'Power truck';
        $crd->nick_name = 'Crd_69';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 70;
        $crd->user_id = 4;
        $crd->name_machine = 'Twister';
        $crd->nick_name = 'Crd_70';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 71;
        $crd->user_id = 4;
        $crd->name_machine = 'Vintage car';
        $crd->nick_name = 'Crd_71';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 72;
        $crd->user_id = 4;
        $crd->name_machine = 'Barber cut';
        $crd->nick_name = 'Crd_72';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 73;
        $crd->user_id = 4;
        $crd->name_machine = 'Barber peluche';
        $crd->nick_name = 'Crd_73';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 74;
        $crd->user_id = 4;
        $crd->name_machine = 'Chocolate factory';
        $crd->nick_name = 'Crd_74';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 75;
        $crd->user_id = 4;
        $crd->name_machine = 'Super Star';
        $crd->nick_name = 'Crd_75';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 76;
        $crd->user_id = 4;
        $crd->name_machine = 'Peluchitos';
        $crd->nick_name = 'Crd_76';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 77;
        $crd->user_id = 4;
        $crd->name_machine = 'Peluchitos';
        $crd->nick_name = 'Crd_77';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 78;
        $crd->user_id = 4;
        $crd->name_machine = 'Peluchitos';
        $crd->nick_name = 'Crd_78';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 79;
        $crd->user_id = 4;
        $crd->name_machine = 'Super star';
        $crd->nick_name = 'Crd_79';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 80;
        $crd->user_id = 4;
        $crd->name_machine = 'Peluchitos';
        $crd->nick_name = 'Crd_80';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 81;
        $crd->user_id = 4;
        $crd->name_machine = 'Hockey Baby';
        $crd->nick_name = 'Crd_81';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 82;
        $crd->user_id = 4;
        $crd->name_machine = 'Mesa Evo';
        $crd->nick_name = 'Crd_82';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 83;
        $crd->user_id = 4;
        $crd->name_machine = 'Mesa EVO 220';
        $crd->nick_name = 'Crd_83';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 84;
        $crd->user_id = 4;
        $crd->name_machine = 'Mecanico chocones 100';
        $crd->nick_name = 'Crd_84';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 85;
        $crd->user_id = 4;
        $crd->name_machine = 'Play ground 100';
        $crd->nick_name = 'Crd_85';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 86;
        $crd->user_id = 4;
        $crd->name_machine = 'VR eagle fly';
        $crd->nick_name = 'Crd_86';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();

        $crd = new Crd();
        $crd->id = 87;
        $crd->user_id = 4;
        $crd->name_machine = 'VR eggs';
        $crd->nick_name = 'Crd_87';
        $crd->password = Crypt::encrypt('crd123');
        $crd->api_token = ApiToken::GenerateToken32();
        $crd->save();*/
    }
}
