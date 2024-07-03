# Poli API Spec

## List Poli

Endpoint : GET /api/poli

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": [
        {
            "id_poli": 1,
            "nama": "umum",
            "deskripsi": "umum",            
        },        
        {
            "id_poli": 2,
            "nama": "bedah",
            "deskripsi": "bedah",            
        },        
        {
            "id_poli": 3,
            "nama": "gizi",
            "deskripsi": "gizi",            
        },        
    ]
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```
