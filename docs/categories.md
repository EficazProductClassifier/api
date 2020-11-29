# Eficaz Product Classifier - API.  
Version: 1.0
Last Updated: November 28th 2020

# Payload filtering
This API uses [spatie/laravel-query-builder](https://github.com/spatie/laravel-query-builder) package for filtering GET requests
for his API endpoints. this package provides the following query parameters:
*filter*: Used to filter for fields that are similar or exactly as the provided.
*sort*: Used to sort for a field ascendenly or descendingly. 

# Endpoints

## Display a listing of the category.

    GET https://localhost:8000/api/category

- Accepts Payload Filtering: Yes
- *Parameter*: None
- *Response Payload*: 
```json
{
    "data": [
    {
        "id": "10f42839-5845-4e50-9203-97f917741e17",
        "nome": "rem",
        "descricao": "Recusandae reprehenderit non."
    },
        ....
    ]
}
```

---

## Store a newly created category in storage.

    POST https://localhost:8000/api/category

- *Parameter*: 
```json 
{
	"nome": "Limpeza1",
	"descricao": "Categoria de limpeza"
}
```
- *Response Payload*: 
```json
{
  "data": {
    "id": "73e77de0-db57-45cd-a9d1-d083d5ab8aaa",
    "nome": "Limpeza1",
    "descricao": "Categoria de limpeza"
  }
}
```

---

## Display the specified category.
    GET localhost:8000/api/category/73e77de0-db57-45cd-a9d1-d083d5ab8aaa

- *Parameters*: None
- *Response Payload*:
```json
{
  "data": {
    "id": "73e77de0-db57-45cd-a9d1-d083d5ab8aaa",
    "nome": "Limpeza1",
    "descricao": "Categoria de limpeza"
  }
}
```

---

## Update the specified category in storage.
    PUT localhost:8000/api/category/73e77de0-db57-45cd-a9d1-d083d5ab8aaa

- *Parameters* 
```json
{
	"nome": "categoria limpa",
	"descricao": "Categoria de limpa"
}
```
- *Response*:
```json
{
  "data": {
    "id": "24556a88-44a8-40fb-b74e-46cbadbfbc32",
    "nome": "categoria limpa",
    "descricao": "Categoria de limpa"
  }
}
```

---

## Remove the specified category from storage.
    DELETE 127.0.0.1:8000/api/category/24556a88-44a8-40fb-b74e-46cbadbfbc32

- *Parameters*: None
- *Response*: 
```json
{
  "message": "Entity deleted",
  "status_code": 202
}
```
