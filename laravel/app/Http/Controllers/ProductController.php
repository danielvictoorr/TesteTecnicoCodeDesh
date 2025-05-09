<?php 

namespace App\Http\Controllers;

use App\Models\ImportHistory;
use App\Models\ProductModel;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function allProducts(Request $request){ 
        try{
            $paginate = $request->input('page') ?? 10;
            $products = ProductModel::allPaginated($paginate);
            return response()->json($products);
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    public function expecificProduct(string $code){ 
        try{
            $products = ProductModel::findByCode($code);
            return response()->json($products);
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    public function deleteProduct(string $code){ 
        try{
            ProductModel::deleteProduct($code);
            return response()->json('Produto deletado com sucesso!');
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    public function updateProduct(Request $request, string $code){ 
        try{
            ProductModel::updateProduct($code, $request->all());
            return response()->json('Produto atualizado com sucesso!');
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    public function statusApiCron(){ 
        try{
            $apiStatus = ImportHistory::all();
            return response()->json($apiStatus);
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }
}