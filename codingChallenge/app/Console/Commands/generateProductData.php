<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;

class generateProductData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:new-product {name} {description} {price} {image}  {category_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product = new Product;
        $product->name = $this->argument('name');
        $product->description = $this->argument('description');
        $product->price = $this->argument('price');
        $product->image = $this->argument('image');

        $product->save();      
        $cat_ids= explode(",",$this->argument('category_id'));
        $category = Category::find($cat_ids);
        $product->categories()->attach($category);

        return 'Success';
    }
}
