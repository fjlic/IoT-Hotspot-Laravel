<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chapter;

class AddChapterTableSeeder extends Seeder
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
        $chapter = new Chapter();
        $chapter->id = 1;
        $chapter->chapter_name = 'Preface';
        $chapter->chapter_num = 1;
        $chapter->pages = 7;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 2;
        $chapter->chapter_name = 'Chapter 1';
        $chapter->chapter_num = 2;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 3;
        $chapter->chapter_name = 'Chapter 2';
        $chapter->chapter_num = 3;
        $chapter->pages = 10;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 4;
        $chapter->chapter_name = 'Chapter 3';
        $chapter->chapter_num = 4;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 5;
        $chapter->chapter_name = 'Chapter 4';
        $chapter->chapter_num = 5;
        $chapter->pages = 10;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 6;
        $chapter->chapter_name = 'Chapter 5';
        $chapter->chapter_num = 6;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 7;
        $chapter->chapter_name = 'Chapter 6';
        $chapter->chapter_num = 7;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 8;
        $chapter->chapter_name = 'Chapter 7';
        $chapter->chapter_num = 8;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 9;
        $chapter->chapter_name = 'Chapter 8';
        $chapter->chapter_num = 9;
        $chapter->pages = 12;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 10;
        $chapter->chapter_name = 'Chapter 9';
        $chapter->chapter_num = 10;
        $chapter->pages = 8;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 11;
        $chapter->chapter_name = 'Appendix A';
        $chapter->chapter_num = 11;
        $chapter->pages = 8;
        $chapter->save();
        
        $chapter = new Chapter();
        $chapter->id = 12;
        $chapter->chapter_name = 'Appendix B';
        $chapter->chapter_num = 12;
        $chapter->pages = 8;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 13;
        $chapter->chapter_name = 'Appendix C';
        $chapter->chapter_num = 13;
        $chapter->pages = 20;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 14;
        $chapter->chapter_name = 'Appendix D';
        $chapter->chapter_num = 14;
        $chapter->pages = 14;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 15;
        $chapter->chapter_name = 'Appendix E';
        $chapter->chapter_num = 15;
        $chapter->pages = 18;
        $chapter->save();

        $chapter = new Chapter();
        $chapter->id = 16;
        $chapter->chapter_name = 'Appendix F';
        $chapter->chapter_num = 16;
        $chapter->pages = 12;
        $chapter->save();
    }
}
