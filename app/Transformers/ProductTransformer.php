<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Product $contact
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'id'            => $product->id,
            'nome'          => $product->nome,
            'descricao'     => $product->descricao,
            'valor'         => $product->valor,
            'estoque'       => $product->estoque,
            'hora_cadastro' => $product->created_at,
            'categoria'     => [
                'id'        => $product->id,
                'nome'      => $product->category->nome,
                'descricao' => $product->category->descricao
            ]
        ];
    }
}
