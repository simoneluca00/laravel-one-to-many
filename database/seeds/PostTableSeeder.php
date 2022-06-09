<?php

use Illuminate\Database\Seeder;

use App\Models\Post;

use Illuminate\Support\Str;

use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //

        for ($i=0; $i < 10; $i++) { 
            
            $post = new Post();
            
            $post->title = $faker->text(10);
            $post->content = $faker->paragraph(2);
            $post->image = $faker->imageUrl(250, 250);
            $post->slug = Str::slug($post->title, '-');

            $post->save();
        }
    }
}
