<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['HTML', 'CSS', 'Sass', 'Bootstrap', 'JavaScript', 'Vue.js', 'PHP', 'Laravel', 'MySQL', 'Git', 'Framework', 'Libreria'];

        foreach ($tags as $item) {
            $tag = new Tag();

            $tag->name = $item;
            $tag->slug = Str::slug($item, '-');

            $tag->save();
        }
    }
}
