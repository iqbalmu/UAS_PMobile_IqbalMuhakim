# Rekam Medik API Spec

## List Rekam Medik

Endpoint : GET /api/rekam-medik

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": [
        {
            "mrn": "RM-xxxxxxxxxxx",
            "keluhan_utama": "xxxxxxx",
            "diagnosis": "xxxxx",
            "penatalaksanaan": "xxxxx",
            "catatan_dokter": "xxxxx",
            "created_at": "xxxxx",            
        },
        {
            "mrn": "RM-xxxxxxxxxxx",
            "keluhan_utama": "xxxxxxx",
            "diagnosis": "xxxxx",
            "penatalaksanaan": "xxxxx",
            "catatan_dokter": "xxxxx",
            "created_at": "xxxxx",            
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

## Get Rekam Medik

Endpoint : GET /api/rekam-medik/:id

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "mrn": "RM-xxxxxxxxxxx",
    "keluhan_utama": "xxxxxxx",
    "riwayat_kesehatan": "xxxxxxx",
    "riwayat_obat": "xxxx",
    "diagnosis": "xxxxx",
    "penatalaksanaan": "xxxxx",
    "catatan_dokter": "xxxxx",
    "created_at": "xxxxx",
    "dokter": {
        "nomor_str": "xxxxxxxxxxx",
        "nomor_sip": "xxxxxxxxxxx",
        "spesialisasi": "xxxx"
    },
    "pemeriksaan": {
        "suhu": "xx",
        "tekanan_darah": "xx",
        "nadi": "xx",
        "pernapasan": "xx",
        "tinggi": "xx",
        "berat": "xx"
    },
    "resep": {
        "id_resep": "xxx",
        "status": "xxxx",
        "keterangan": "xxxxxxxxx"
    }
}
```
