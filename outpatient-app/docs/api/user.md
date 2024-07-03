# User API Spec

## Get Profile

Endpoint : GET /api/user/profile

Headers :

-   Authorization : token

Response Body Success :

```json
{
    "data": {
        "mrn": "RM-1231231232141",
        "nama": "jhon doe",
        "email": "sample@mail.com",
        "password": "password",
        "nik": "1234567890123456",
        "jenis_kelamin": "L",
        "nomor_hp": "082196506900",
        "profesi": "mahasiswa",
        "alamat": "padang"
    }
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```

## Update Profile

Endpoint : PATCH /api/user/profile

Headers :

-   Authorization : token

Request Body :

```json
{    
    "nama": "jhon doe",
    "email": "sample@mail.com",    
    "nik": "1234567890123456",
    "jenis_kelamin": "L",
    "nomor_hp": "082196506900",
    "profesi": "mahasiswa",
    "alamat": "padang"
}
```

Response Body Success :

```json
{
    "data": {
        "mrn": "RM-1231231232141",
        "nama": "jhon doe",
        "email": "sample@mail.com",        
        "nik": "1234567890123456",
        "jenis_kelamin": "L",
        "nomor_hp": "082196506900",
        "profesi": "mahasiswa",
        "alamat": "padang"
    },
    "message" : "User Profile Updated"
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```


## Change Password

Endpoint : PATCH /api/user/change-password

Headers :

-   Authorization : token

Request Body :

```json
{
    "password" : "password",
    "newPassword" : "new password",
    "confirmPassword" : "new password"
}
```

Response Body Success :

```json
{
    "message" : "password updated"
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```
