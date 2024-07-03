# Dokter API Spec

## List Dokter

Endpoint : GET /api/dokter

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": [
        {
            "id": 1,
            "nama": "Dr. jhon",
            "email": "sample@mail.com",
            "nomor_hp": "082196506900",
            "foto": "www.dokter-images.com/path/to/photo.jpg",
            "nomor_str": "123132123123",
            "nomor_sip": "123132123123",
            "spesialisasi": "bedah otak",
            "poli": {
                "id": 2,
                "nama": "bedah"
            }
        },
        {
            "id": 2,
            "nama": "Dr. doe",
            "email": "sample@mail.com",
            "nomor_hp": "082196506900",
            "foto": "www.dokter-images.com/path/to/photo.jpg",
            "nomor_str": "123132123122",
            "nomor_sip": "123132123444",
            "spesialisasi": "umum",
            "poli": {
                "id": 1,
                "nama": "umum"
            },
            "jadwal": [
                {
                    "hari": "senin",
                    "mulai": "08:00",
                    "selesai": "11:00"
                },
                {
                    "hari": "selasa",
                    "mulai": "08:00",
                    "selesai": "11:00"
                },
            ]
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

## Get Dokter

Endpoint : GET /api/dokter/:id

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": {
        "id": 1,
        "nama": "Dr. jhon",
        "email": "sample@mail.com",
        "nomor_hp": "082196506900",
        "foto": "www.dokter-images.com/path/to/photo.jpg",
        "nomor_str": "123132123123",
        "nomor_sip": "123132123123",
        "spesialisasi": "bedah otak",
        "poli": {
            "id": 2,
            "nama": "bedah"
        }
    }
}
```

Response Body Errors :

```json
{
    "errors": "Data Not Found !!"
}
```
