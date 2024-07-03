# Antrian API Spec

## Create Antrian

Endpoint : POST /api/antrian

Headers :

-   Authorization : token

Request Body :

```json
{
    "poli_id": 1,
    "tanggal": "25/04/2024"
}
```

Response Body Success :

```json
{
    "data": {
        "mrn": "RM-1231231232141",
        "nomor": 1,
        "status": "menunggu",
        "poli": {
            "id_poli": 1,
            "nama": "umum"
        },
        "tanggal": "25/04/2024"
    },
    "message": "Antrian Created"
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```

## List Antrian

Endpoint : GET /api/antrian

Headers :

-   Authorization : token

Query :

-   tanggal
-   poli

Response Body Success :

```json
{
    "data": [
        {
            "id": 1,
            "mrn": "RM-1231231232141",
            "nomor": 1,
            "status": "menunggu",
            "poli": {
                "id_poli": 1,
                "nama": "umum"
            },
            "tanggal": "25/04/2024"
        },
        {
            "id": 2,
            "mrn": "RM-1231231232142",
            "nomor": 2,
            "status": "menunggu",
            "poli": {
                "id_poli": 1,
                "nama": "umum"
            },
            "tanggal": "30/04/2024"
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
