<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @param Product $contact
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id'        => $category->id,
            'nome'      => $category->nome,
            'descricao' => $category->descricao,
        ];
    }
}
