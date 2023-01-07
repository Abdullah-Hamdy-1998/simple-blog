# Simple Blog
## Setup

1. Clone the project:
	``` git clone https://github.com/Abdullah-REPO/simple-blog.git ```
2. Install the project dependencies:
	``` composer install ```
3. Create a copy of the .env file:
	``` cp .env.example .env ```
4. Generate an application key:
	``` php artisan key:generate ```
5. Run the migrations:
	``` php artisan migrate ```
6. Install the frontend dependencies:
	``` npm install ```    
7. Compile the frontend assets:
	``` npm run dev ```
8. Start the development server:
	``` php artisan serve ```
## Description
This is a very basic blog site with two main user roles: Admin and Author.

* Author has a place to submit posts
* Author can see their own posts only
* Author can edit and delete their own posts
* Admin can see all posts

There is also an API endpoint available to list all posts if the user is an admin, or only the author's posts if the user is an normal user.

You can test the API using Postman by logging in at **/api/login** and then using the returned token to access the **/api/posts** route.