<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * list of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = ['category'];

    /**
     * Turn this item object into a generic array
     *
     * @param Product $contact
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'uuid'          => $product->uuid,
            'nome'          => $product->nome,
            'descricao'     => $product->descricao,
            'valor'         => $product->valor,
            'estoque'       => $product->estoque,
            'hora_cadastro' => $product->created_at
        ];
    }

    /**
     * Include socials 
     *
     * @param Product $product
     * @return \League\Fractal\Resource\Item
     */
    public function includeCategory(Product $product){
        if($product->category === null)
            return null;

        return $this->item($product->category, new CategoryTransformer); 
    }
}
