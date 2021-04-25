## Insider Project - Ecommerce Website

### Modules
 
- Custom Login and Registration for User.
- Home Page Product Slider.
- Product Listing on Home Page.
- Search Filter for searching any product.
- Product Details Page with category.
- Add to Cart Functionality with login user.
- Total Items on Cart while adding product.
- Remove Product Item from cart list.
- Place order functionality.
- Order details Page.



## Installation

#### Project setup
- Used seeder for Products and categories. Run  ```php artisan db:seed --class=ProductSeeder``` and ```php artisan db:seed --class=CategorySeeder```
- Go to project directory and run database migration with ```php artisan migrate```


### Run

- Hit url http://127.0.0.1:8000/ to view home page

### Technical details
- Developed in Laravel 7

### Api url
- http://127.0.0.1:8000/api/login 
- http://127.0.0.1:8000/api/logout
- http://127.0.0.1:8000/api/register
- http://127.0.0.1:8000/api/getUserCart 
- http://127.0.0.1:8000/api/addToCart 

- http://127.0.0.1:8000/api/categories
- http://127.0.0.1:8000/api/all_products
- http://127.0.0.1:8000/api/product_detail/3
- http://127.0.0.1:8000/api/category/4



### Result Screenshot

Please see following video and screenshot - Result of Ecommerce  ( https://drive.google.com/drive/folders/1nfMPn0mKX1e_PLkvv_h_ZzCYOPqWAbMr)