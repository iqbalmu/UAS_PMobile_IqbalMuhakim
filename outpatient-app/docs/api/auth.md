# Authentication API Spec

## Login

Endpoint : POST /api/auth/login

Request Body :

```json
{
    "email": "sample@mail.com",
    "password": "password"
}
```

Response Body Success :

```json
{
    "data": {
        "token": "uniq token"
    }
}
```

Response Body Errors :

```json
{
    "errors": "username or password is wrong"
}
```

## Register

Endpoint : POST /api/auth/register

Request Body :

```json
{
    "nama": "jhon doe",
    "email": "sample@mail.com",
    "password": "password",
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
        "nama": "jhon doe",
        "email": "sample@mail.com",
        "nik": "1234567890123456",
        "jenis_kelamin": "L",
        "nomor_hp": "082196506900",
        "profesi": "mahasiswa",
        "alamat": "padang"
    },
    "message": "success create account"
}
```

Response Body Errors :

```json
{
    "errors": "email already exist"
}
```

## Logout

Endpoint : DELETE /api/auth/logout

Response Body Success :

```json
{
    "message": "succes logout user"
}
```

Response Body Errors :

```json
{
    "errors": "unauthorized"
}
```
