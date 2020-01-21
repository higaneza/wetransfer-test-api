# WeTransfer-Test API

This API is intented for testing purpose only, production use of this repo is strongly discouraged.

## API Endpoints

POST api/transfer
GET api/download

## Expected [POST api/transfer] headers

Content-Type: application/x-www-form-urlencoded

## Submitted data structure example | Request

### Type

FormData

### Attributes

...

file: all selected files/folders compressed in one [file.gz | file.zip | file.zip]

from_email: [
{
"email": "johndoe@example.com"
}
]

to_email: [
{
"email": "anonymous@example.com"
},
{
"email": "janedoe@example.com"
}
]

items: [
{
"name": "file1.jpg",
"size": "1000",
"type": "file"
},
{
"name": "file2.jpg",
"size": "2000",
"type": "file"
},
{
"name": "file3.jpg",
"size": "3000",
"type": "file"
}
]

message: "sender example message"

...
