#laravel 8.83.4 #php 8.1
<p>1. Copy .env.example to .env </p>
<p>2. Run "php artisan key:generate" </p>
<p>3. Create DB "fitpass" </p>
<p>4. Run "composer install" </p>
<p>5. Run "php artisan migrate" </p>
<p>6. Run "php artisan db:seed" </p>
<p>7. Run application  "php artisan serve" </p>
<pre>
Route for test api: http://127.0.0.1:8000/api/reception/endpoint
Examples:
#1
{
    "object_uuid": "8696ce03-a36d-4929-9f63-73d4a3bc57c9",
    "card_uuid": "1a41a367-c062-4f8c-8429-21c1a0d288e7"
}
#2
{
    "object_uuid": "8696ce03-a36d-4929-9f63-73d4a3bc57c9",
    "card_uuid": "f1a27d82-bfef-4a72-a834-71ca35d8e54f"
}
#3
{
    "object_uuid": "97c04ea9-9ba3-4963-9a80-2d2d0f5fe4f7",
    "card_uuid": "6b608c8c-0e09-4b32-9ea2-19a2c6db4429"
}
</pre>
