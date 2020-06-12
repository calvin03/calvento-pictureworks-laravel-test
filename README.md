

Hi Im Calvin Calvento

To Set Up The Project

1. clone this repository https://github.com/calvin03/calvento-pictureworks-laravel-test.git

2. connect the project to your postgres database

3. create a database name pictureworks_db

4. composer install

5. php artisan key:generate

6. php artisan migrate:refresh --seed

7. run localhost

8. go to http:localhost:8000/user/1

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

