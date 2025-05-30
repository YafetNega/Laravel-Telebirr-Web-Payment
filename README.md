# Laravel Telebirr Web Payment Integration

This is a Laravel-based web application that integrates the **Telebirr** payment gateway, allowing users to process payments seamlessly using Telebirr.

## 📦 Features

- Laravel-based implementation
- Telebirr payment request and handling
- Easy integration with your existing Laravel project
- Configurable with your own credentials

## ⚙️ Configuration

Before using the system, you **must configure** your Telebirr credentials.

Open the configuration file (typically in the controller or `.env` if you refactor) and replace the placeholder strings with your actual values:

```php
$PUBLICKEY = "";    // Your Telebirr Public Key
$APPKEY = "";       // Your Telebirr App Key
$APPID = "";        // Your Telebirr App ID
$SHORTCODE = "";    // Your Business Short Code
$NOTIFYURL = "";    // Your callback URL for asynchronous updates
$RETURNURL = "";    // The URL to redirect users after payment
⚠️ Make sure the NOTIFYURL is publicly accessible if you're testing on a local server.
🚀 Installation

Clone the repository:
git clone https://github.com/YafetNega/Laravel-Telebirr-Web-Payment.git
cd Laravel-Telebirr-Web-Payment
Install dependencies:
composer install
Copy .env.example to .env and configure your environment:
cp .env.example .env
php artisan key:generate
Set your database credentials and other configuration as needed.
Serve the app:
php artisan serve
🧪 Testing

After setting the required keys and running the application, you can test the Telebirr payment by submitting the payment form on your app.

🤝 Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Contact Me: yafetnega1997@gmail.com
