# Coalition Technologies

### What is this repository?
It is an exercice for the company Coalition Technologies.

### How to run it?
* Clone this repository
* `cd` in the newly created directory
* Run a `composer install`
* Run a `cp .env.example .env`
* Run a `php artisan key:generate`
* Set your database in the `.env` file
* Run a `php artisan migrate --seed`
* Run a `npm install`
* Run a `npm run watch` to create the necessary css and js files
* Run a `php -S localhost:80 -t public\`
* Go to `localhost` in browser

### Optionnal settings
- You can change the app name from your `.env` file using the `APP_NAME` variable.

And that's it. :ok_hand:
