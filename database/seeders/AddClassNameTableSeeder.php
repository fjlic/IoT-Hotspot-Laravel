<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\ClassName;

class AddClassNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  Part Name : SED
     *  Part Size : 5.1
     * @return void
     */
    public function run()
    {
        //
        $classname = new ClassName();
        $classname->id = 1;
        $classname->class_name = 'each_char';
        $classname->class_loc = 18;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 2;
        $classname->class_name = 'string_read';
        $classname->class_loc = 18;
        $classname->num_method = 3;
        $classname->save();
        
        $classname = new ClassName();
        $classname->id = 3;
        $classname->class_name = 'single_character';
        $classname->class_loc = 25;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 4;
        $classname->class_name = 'each_line';
        $classname->class_loc = 31;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 5;
        $classname->class_name = 'single_char';
        $classname->class_loc = 37;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 6;
        $classname->class_name = 'string_builder';
        $classname->class_loc = 82;
        $classname->num_method = 5;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 7;
        $classname->class_name = 'string_manager';
        $classname->class_loc = 82;
        $classname->num_method = 4;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 8;
        $classname->class_name = 'list_clump';
        $classname->class_loc = 87;
        $classname->num_method = 4;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 9;
        $classname->class_name = 'list_clip';
        $classname->class_loc = 89;
        $classname->num_method = 4;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 10;
        $classname->class_name = 'string_decrementer';
        $classname->class_loc = 230;
        $classname->num_method = 10;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 11;
        $classname->class_name = 'Char';
        $classname->class_loc = 85;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 12;
        $classname->class_name = 'Character';
        $classname->class_loc = 87;
        $classname->num_method = 3;
        $classname->save();

        $classname = new ClassName();
        $classname->id = 13;
        $classname->class_name = 'Converter';
        $classname->class_loc = 588;
        $classname->num_method = 10;
        $classname->save();
    }
}
