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
}