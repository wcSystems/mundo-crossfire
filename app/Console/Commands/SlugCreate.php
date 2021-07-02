<?php

namespace App\Console\Commands;

use App\Models\Producto;
use Illuminate\Console\Command;
use Illuminate\Support\Str;


class SlugCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'slug:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Slug Product';

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
        $products = Producto::get();
        foreach ($products as $value) {
            $producto = Producto::find($value->id);
            $slug = Str::slug($producto->titulo, '-');
            $nro = random_int(0, 20);
            $exist =  Producto::where('slug',$slug )->exists() ? $slug.'-'.$nro : $slug;
            $producto->slug = $exist ;
            $producto->save();
        }

        $message = "Slug Success";
        $this->info($message);
    }
}
