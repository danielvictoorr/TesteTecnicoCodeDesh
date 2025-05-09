<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    public static function allPaginated(int $perPage = 10)
    {
        return self::paginate($perPage);
    }

    public static function findByCode(string $code)
    {
        return self::where('code', $code)->first();
    }

    public static function deleteProduct(string $code)
    {
        $product = self::where('code', $code)->first();

        if ($product) {
            $product->status = 'trash';
            $product->save();
        }

        return $product;
    }

    public static function updateOrCreateFromImport(array $data): self
    {
        return self::updateOrCreate(
            ['code' => $data['code']],
            [
                'status' => $data['status'] ?? 'published',
                'imported_t' => now(),
                'url' => $data['url'] ?? null,
                'creator' => $data['creator'] ?? null,
                'created_t' => $data['created_t'] ?? null,
                'last_modified_t' => $data['last_modified_t'] ?? null,
                'product_name' => $data['product_name'] ?? null,
                'quantity' => $data['quantity'] ?? null,
                'brands' => $data['brands'] ?? null,
                'categories' => $data['categories'] ?? null,
                'labels' => $data['labels'] ?? null,
                'cities' => $data['cities'] ?? null,
                'purchase_places' => $data['purchase_places'] ?? null,
                'stores' => $data['stores'] ?? null,
                'ingredients_text' => $data['ingredients_text'] ?? null,
                'traces' => $data['traces'] ?? null,
                'serving_size' => $data['serving_size'] ?? null,
                'serving_quantity' => $data['serving_quantity'] ?? null,
                'nutriscore_score' => $data['nutriscore_score'] ?? null,
                'nutriscore_grade' => $data['nutriscore_grade'] ?? null,
                'main_category' => $data['main_category'] ?? null,
                'image_url' => $data['image_url'] ?? null,
            ]
        );
    }
}