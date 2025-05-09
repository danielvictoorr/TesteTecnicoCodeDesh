<?php

namespace App\Console\Commands;

use App\Models\ImportHistory;
use App\Models\ProductModel;
use Illuminate\Console\Command;

class ImportOpenFood extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:open-food-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa dados do Open Food';

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
        $indexUrl = "https://challenges.coode.sh/food/data/json/index.txt";

        //leitura do conteudo do arquivo linha por linha, retorando um array, ignora linhas vazias e quebra de linhas
        $lines = file($indexUrl, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);$lines = file($indexUrl, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $filename) {
            $jsonUrl = "https://challenges.coode.sh/food/data/json/{$filename}";
            $data = json_decode(file_get_contents($jsonUrl), true);
    
            $count = 0;
    
            foreach ($data['products'] as $product) {
                if ($count >= 100) break; //faz a verificação da quantidade de produtos a serem importados
    
                ProductModel::updateOrCreateFromImport(
                    ['code' => $product['code']],
                    [
                        'status' => $product['status'] ?? 'published',
                        'imported_t' => now(),
                        'url' => $product['url'] ?? null,
                        'creator' => $product['creator'] ?? null,
                        'created_t' => $product['created_t'] ?? null,
                        'last_modified_t' => $product['last_modified_t'] ?? null,
                        'product_name' => $product['product_name'] ?? null,
                        'quantity' => $product['quantity'] ?? null,
                        'brands' => $product['brands'] ?? null,
                        'categories' => $product['categories'] ?? null,
                        'labels' => $product['labels'] ?? null,
                        'cities' => $product['cities'] ?? null,
                        'purchase_places' => $product['purchase_places'] ?? null,
                        'stores' => $product['stores'] ?? null,
                        'ingredients_text' => $product['ingredients_text'] ?? null,
                        'traces' => $product['traces'] ?? null,
                        'serving_size' => $product['serving_size'] ?? null,
                        'serving_quantity' => $product['serving_quantity'] ?? null,
                        'nutriscore_score' => $product['nutriscore_score'] ?? null, 
                        'nutriscore_grade' => $product['nutriscore_grade'] ?? null,
                        'main_category' => $product['main_category'] ?? null,
                        'image_url' => $product['image_url'] ?? null
                    ]
                );
    
                $count++;
            }

            // Log da importação
        ImportHistory::create([
            'file' => $filename,
            'imported_at' => now(),
            'products_count' => $count
        ]);
        }
        
         $this->info('Importação concluída.');
    }
}
