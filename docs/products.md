# Eficaz Product Classifier - API.  
Version: 1.0
Last Updated: November 28th 2020

# Payload filtering
This API uses [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder) package for filtering GET requests
for his API endpoints. this package provides the following query parameters:
*filter*: Used to filter for fields that are similar or exactly as the provided.
*sort*: Used to sort for a field ascendenly or descendingly. 

# Endpoints

## Display a listing of the product.

    GET https://localhost:8000/api/product

- Accepts Payload Filtering: Yes
- *Parameter*: None
- *Response Payload*: 
```json
{
    "data": [
    {
        "id": "0b780dfe-7d53-41fe-aa2c-1f37aafd0b3d",
        "nome": "aliquam",
        "descricao": "Aliquam aut id eos consequatur.",
        "valor": 6.9,
        "estoque": 5,
        "hora_cadastro": "2020-11-28T23:07:15.000000Z",
        "categoria": {
            "id": "0b780dfe-7d53-41fe-aa2c-1f37aafd0b3d",
            "nome": "rem",
            "descricao": "Recusandae reprehenderit non."
        }
    },
        ....
    ]
}
```

---

## Store a newly created product in storage.

    POST https://localhost:8000/api/product

- *Parameter*: 
```json 
{
    "nome": "product",
    "descricao": "This is a product description",
    "valor": 1.99,
    "estoque": 100,
    "category_id": "24556a88-44a8-40fb-b74e-46cbadbfbc32"
}
```
- *Response Payload*: 
```json
{
  "data": {
    "id": "aeddf040-f827-4531-9291-474a7c6e59ed",
    "nome": "product",
    "descricao": "This is a product description",
    "valor": 1.99,
    "estoque": 100,
    "hora_cadastro": "2020-11-27T17:33:16.000000Z"
  }
}
```

---

## Display the specified product.
    GET localhost:8000/api/product/aeddf040-f827-4531-9291-474a7c6e59ed

- *Parameters*: None
- *Response Payload*:
```json
{
  "data": {
    "id": "aeddf040-f827-4531-9291-474a7c6e59ed",
    "nome": "product",
    "descricao": "This is a product description",
    "valor": 1.99,
    "estoque": 100,
    "hora_cadastro": "2020-11-27T17:33:16.000000Z"
  }
}
```

---

## Update the specified product in storage.
    PUT localhost:8000/api/product/aeddf040-f827-4531-9291-474a7c6e59ed

- *Parameters* 
```json
{
    "nome": "Updated product",
    "descricao": "This is a product being updated",
    "valor": 6.99,
    "estoque": 10,
    "category_id": "10f42839-5845-4e50-9203-97f917741e17"
}
```
- *Response*:
```json
{
  "data": {
    "id": "aeddf040-f827-4531-9291-474a7c6e59ed"
    "nome": "Updated product",
    "descricao": "This is a product being updated",
    "valor": 6.99,
    "estoque": 10,
    "hora_cadastro": "2020-11-28T23:07:15.000000Z",
    "categoria": {
        "id": "10f42839-5845-4e50-9203-97f917741e17"
        "nome": "rem",
        "descricao": "Recusandae reprehenderit non."
    }
  }
}
```

---

## Remove the specified product from storage.
    DELETE 127.0.0.1:8000/api/product/aeddf040-f827-4531-9291-474a7c6e59ed

- *Parameters*: None
- *Response*: 
```json
{
  "message": "Entity deleted",
  "status_code": 202
}
```
