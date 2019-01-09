<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $author = [
            'Толстой', 'Достоевский', 'Некрасов',
        ];
        $books = [];

        for ($i = 0; $i < 20; ++$i) {
            $books[] = [
                'name' => 'Name ' . str_random(5) . ' #' . $i,
                'isbn' => str_random(20),
                'author' => $author[mt_rand(0, count($author)-1)],
            ];
        }

        DB::table('books')->insert($books);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
