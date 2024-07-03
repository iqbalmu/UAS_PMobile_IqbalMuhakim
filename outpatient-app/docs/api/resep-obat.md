# Rekam Medik API Spec

## List Resep Obat

Endpoint : GET /api/resep-obat

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": [
        {
            "id_resep": "xx",
            "kode": "xx",
            "keterangan": "xx"
        },
        {
            "id_resep": "xx",
            "kode": "xx",
            "keterangan": "xx"
        }
    ]
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```

## Get Resep Obat

Endpoint : GET /api/resep-obat/:id

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": {
        "id_resep": "xx",
        "kode": "xx",
        "keterangan": "xx",
        "obat": [
            {
                "obat": "xxxx",
                "dosis": "xxxx",
                "frekuensi": "xxxx",
                "durasi": "xxxx",
                "metode": "xxxx",
                "syarat": "xxxx"
            },
            {
                "obat": "xxxx",
                "dosis": "xxxx",
                "frekuensi": "xxxx",
                "durasi": "xxxx",
                "metode": "xxxx",
                "syarat": "xxxx"
            }
        ]
    }
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```
