<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'adminfordiskus@gmail.com',
            'password' => bcrypt('admin2828'),
            'is_admin' => true
        ]);


        // User::create([
        //     'name' => 'Ronal Galang',
        //     'email' => 'ronalga12@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programing',
            'slug' => 'web-programing'
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

         Category::create([
         'name' => 'Q & A',
         'slug' => 'qna'
         ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium.',

        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium. Error animi ab inventore? Animi, sapiente. Tempora, unde dolores a voluptatem non deserunt, numquam repellat quia corporis laborum laudantium enim doloremque facere qui quod dolore tempore beatae iure vero. <p>Esse sit laboriosam suscipit sint tempora officia error est mollitia, nihil quae dolor? Dolores ratione enim id debitis ipsam perferendis eaque aperiam perspiciatis consequuntur quia odio deleniti sequi molestias ad nulla expedita odit dolorem impedit, reiciendis fuga provident ducimus facilis architecto fugit? Eaque vitae dignissimos esse impedit, accusamus architecto dolorem nesciunt unde voluptatem eveniet alias perferendis aliquam dolore temporibus, voluptatum qui quibusdam laborum tempora rem in cumque quasi aliquid.</p>  Sint nesciunt, ea fuga reiciendis hic at atque doloremque? Voluptates odit delectus expedita, minima sequi iure mollitia nihil consequatur ad deleniti, tempora, atque officiis reprehenderit aut asperiores voluptatem nemo esse? Dicta at neque iste libero voluptate incidunt, voluptatibus aliquam molestias officia natus laudantium fugiat a quod qui excepturi ad vitae cum. Et, nostrum facilis similique debitis, ratione asperiores, veritatis consequatur magnam quisquam possimus exercitationem quis. Eligendi aperiam aliquam commodi accusantium ex!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium.',

        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium. Error animi ab inventore? Animi, sapiente. Tempora, unde dolores a voluptatem non deserunt, numquam repellat quia corporis laborum laudantium enim doloremque facere qui quod dolore tempore beatae iure vero. <p>Esse sit laboriosam suscipit sint tempora officia error est mollitia, nihil quae dolor? Dolores ratione enim id debitis ipsam perferendis eaque aperiam perspiciatis consequuntur quia odio deleniti sequi molestias ad nulla expedita odit dolorem impedit, reiciendis fuga provident ducimus facilis architecto fugit? Eaque vitae dignissimos esse impedit, accusamus architecto dolorem nesciunt unde voluptatem eveniet alias perferendis aliquam dolore temporibus, voluptatum qui quibusdam laborum tempora rem in cumque quasi aliquid.</p>  Sint nesciunt, ea fuga reiciendis hic at atque doloremque? Voluptates odit delectus expedita, minima sequi iure mollitia nihil consequatur ad deleniti, tempora, atque officiis reprehenderit aut asperiores voluptatem nemo esse? Dicta at neque iste libero voluptate incidunt, voluptatibus aliquam molestias officia natus laudantium fugiat a quod qui excepturi ad vitae cum. Et, nostrum facilis similique debitis, ratione asperiores, veritatis consequatur magnam quisquam possimus exercitationem quis. Eligendi aperiam aliquam commodi accusantium ex!</p>',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium.',

        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium. Error animi ab inventore? Animi, sapiente. Tempora, unde dolores a voluptatem non deserunt, numquam repellat quia corporis laborum laudantium enim doloremque facere qui quod dolore tempore beatae iure vero. <p>Esse sit laboriosam suscipit sint tempora officia error est mollitia, nihil quae dolor? Dolores ratione enim id debitis ipsam perferendis eaque aperiam perspiciatis consequuntur quia odio deleniti sequi molestias ad nulla expedita odit dolorem impedit, reiciendis fuga provident ducimus facilis architecto fugit? Eaque vitae dignissimos esse impedit, accusamus architecto dolorem nesciunt unde voluptatem eveniet alias perferendis aliquam dolore temporibus, voluptatum qui quibusdam laborum tempora rem in cumque quasi aliquid.</p>  Sint nesciunt, ea fuga reiciendis hic at atque doloremque? Voluptates odit delectus expedita, minima sequi iure mollitia nihil consequatur ad deleniti, tempora, atque officiis reprehenderit aut asperiores voluptatem nemo esse? Dicta at neque iste libero voluptate incidunt, voluptatibus aliquam molestias officia natus laudantium fugiat a quod qui excepturi ad vitae cum. Et, nostrum facilis similique debitis, ratione asperiores, veritatis consequatur magnam quisquam possimus exercitationem quis. Eligendi aperiam aliquam commodi accusantium ex!</p>',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium.',

        //     'body' => '<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, iste! Aut, accusantium obcaecati optio vitae nesciunt ab porro velit nisi, voluptatum voluptatem architecto a vel est quaerat ullam earum, cumque laudantium. Error animi ab inventore? Animi, sapiente. Tempora, unde dolores a voluptatem non deserunt, numquam repellat quia corporis laborum laudantium enim doloremque facere qui quod dolore tempore beatae iure vero. <p>Esse sit laboriosam suscipit sint tempora officia error est mollitia, nihil quae dolor? Dolores ratione enim id debitis ipsam perferendis eaque aperiam perspiciatis consequuntur quia odio deleniti sequi molestias ad nulla expedita odit dolorem impedit, reiciendis fuga provident ducimus facilis architecto fugit? Eaque vitae dignissimos esse impedit, accusamus architecto dolorem nesciunt unde voluptatem eveniet alias perferendis aliquam dolore temporibus, voluptatum qui quibusdam laborum tempora rem in cumque quasi aliquid.</p>  Sint nesciunt, ea fuga reiciendis hic at atque doloremque? Voluptates odit delectus expedita, minima sequi iure mollitia nihil consequatur ad deleniti, tempora, atque officiis reprehenderit aut asperiores voluptatem nemo esse? Dicta at neque iste libero voluptate incidunt, voluptatibus aliquam molestias officia natus laudantium fugiat a quod qui excepturi ad vitae cum. Et, nostrum facilis similique debitis, ratione asperiores, veritatis consequatur magnam quisquam possimus exercitationem quis. Eligendi aperiam aliquam commodi accusantium ex!</p>',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
