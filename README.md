# FRONT-END
- Responsive
- Shopping Cart
- Coupons, Discounts
- Product attributes: cost price, promotion price, stock, ...
- Blog: category, tag, content, web page 
- Module/Extension: Shipping, payment, discount, ...
- Upload manager: banner, images,..
- Contact forms
- A Product search form
- Order Tracking system

# ADMIN
- Admin roles, permission
- Product manager
- Media manager using unisharp laravel file manager
- Banner manager
- Order management
- Category management
- Brand management
- Shipping Management
- Review Management
- Blog, Category & Tag manager
- User Management
- Coupon Management
- System config: email setting, info shop, maintain status,...
- Generate order in pdf form...
- Profile Settings

# USER DASHBOARD
- Order management
- Review Management
- Comment Management
- Profile Settings

### Set up :
1. Clone the repo and cd into it
2. In your terminal ```composer install```
3. RENAME / COPY ```.env.example``` file to ``.env``
4. ```php artisan key:generate```
5. Set your database credentials in your ```.env``` file
6. Set your Braintree credentials in your ```.env``` file if you want to use PayPal
7. Import db file(```database/e-shop.sql```) into your database (```mysql,sql```)
8. ```npm install```
9. ```npm run watch```
10. run command[laravel file manager]:-  ```php artisan storage:link```
11. Edit ```.env``` file :- remove APP_URL
10. ```php artisan serve``` or use virtual host
11. Visit ```localhost:8000``` in your browser
12. Visit /admin if you want to access the admin panel. Admin Email/Password: ```admin@email.com```/```dashboard```. User Email/Password: ```user@email.com```/```useruser```
