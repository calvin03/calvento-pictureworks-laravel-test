

Hi Im Calvin Calvento

To Set Up The Project

1. connect your laravel project to your postgres database

2. create a database name pictureworks_db

3. composer install

4. php artisan key:generate

5. run localhost

Documentation

1. Fetch User

URL

"http://localhost:8000/api/user/{id}"

Method:

GET 

URL Params

Required:

id=[integer | required]

Success Response:

Code: 200
Content: "{\"id\":1,\"name\":\"Terrell Funk\",\"created_at\":\"2020-06-12T12:23:35.000000Z\",\"updated_at\":\"2020-06-12T12:23:35.000000Z\",\"comments\":[]}"
Error Response:

Code: 401 UNAUTHORIZED
Content: ""No User Found"
OR

Notes:

Please put existing id



2. Add Comment

URL

"http://localhost:8000/api/user/add_comment"

Method:

POST

URL Params

Required:

id=[integer | required]
password = [required]
comment " [string | required ]

Success Response:

Code: 200
Content: "Add comment successful"

Error Response:

Code: 500 INTERNAL ERROR
Content: {
    "comment": [
        "The comment field is required."
    ]
}


Command Line Execution commands

add comment function

php artisan dispatch:add_comment {id} {comment}

fetch user

php artisan dispatch:user {id}

