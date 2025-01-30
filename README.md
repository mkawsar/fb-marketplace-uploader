# Marketplace Uploader - Proof of Concept

This project consists of two main components:
1. **Chrome Extension** - A browser extension that fetches product details from a Laravel backend and uploads the product to Facebook Marketplace.
2. **Laravel Backend** - A backend built using Laravel that manages API endpoints to handle product data and interact with the Facebook Marketplace API.

## Requirements

- PHP >= 8.3.x
- Laravel >= 11.31
- MySQL or any other database of your choice
- Composer
- Google Chrome (for the Chrome Extension)
---

## Step 1: Setting Up the Laravel Backend

### 1. Clone the repository

Clone this project to your local machine:

```bash
git clone https://github.com/mkawsar/fb-marketplace-uploader.git
cd fb-marketplace-uploader
```
### 2. Install Laravel dependencies
Run the following command to install the required PHP dependencies:
```bash
composer install
```

### 3. Set up the .env file
Copy the .env.example to .env and configure it with your settings:
```bash
cp .env.example .env
```

In the .env file, update the following variables with your Facebook API credentials:

```env
FACEBOOK_PAGE_ID=
FACEBOOK_ACCESS_TOKEN
```

### 4. Set up the database
If you want to use a database to store product details (optional for this PoC), update the .env file with your database credentials and run migrations:
```bash
php artisan migrate --seed
```

### 5. Run the Laravel server
Now, run the Laravel development server:
```bash
php artisan serve
```
By default, this will start the server at http://127.0.0.1:8000. You can modify the port by specifying a different port like so:
```bash
php artisan serve --port=8080
```
---
## Step 2: Setting Up the Chrome Extension
### 1. Install the Chrome Extension
* Navigate to the **chrome-extension** folder:
    ```bash
    cd chrome-extension
    ```
* Open Google Chrome and go to **chrome://extensions/**
* Enable **Developer Mode** at the top-right corner.
* Click on *Load unpacked* and select the *chrome-extension* folder.

### 2. Modify the API Endpoint URL
In *popup.js*, replace the API endpoint URLs with your local Laravel backend API URL:
```js
const response = await fetch('http://127.0.0.1:8000/api/products');
```
Make sure the URL points to where your Laravel backend is running (localhost or the URL of your Laravel backend).

### 3. Test the Chrome Extension
* Click on the extension icon in the Chrome toolbar to open the extension.
* Click **Fetch Product** to retrieve product details from the backend.
* After the details are shown, click **Upload Product** to upload it to Facebook Marketplace.
---
## Step 3: Interacting with Facebook Marketplace API
This Proof of Concept assumes you have access to Facebook's Graph API to upload products to Facebook Marketplace. Here's a quick overview of the Facebook API process:
1. **Get Access Token**: You will need an access token that allows your application to interact with Facebook's Marketplace API. To get this token, you must register a Facebook App in the Facebook Developer Portal and request appropriate permissions (e.g., ads_management, publish_to_groups).
2. **Product Upload**: The backend will make a POST request to the Facebook Marketplace API using the FACEBOOK_API_URL and the access token. The request will include product details like the name, price, description, etc.
---
## Step 4: Running the Application
Once you have both the Laravel Backend and the Chrome Extension set up:
### 1. Run Laravel Backend:
* Open a terminal in the **fb-marketplace-uploader** folder and run:
    ```bash
    php artisan serve
    ```
* Ensure the server is running at **http://127.0.0.1:8000**.
### 2. Load the Chrome Extension:
* Open Google Chrome and load the extension as described earlier.
### 3. Test the Full Flow:
* In the Chrome Extension, click on Fetch Product. This will request product data from the Laravel backend.
* Then, click Upload Product to send the product data to the Facebook Marketplace API.
---
## Step 5: Future Improvements (Optional)
* Error Handling: Improve error handling for invalid API responses and failed uploads.
* Authentication: Secure the Laravel API with authentication (e.g., Passport, JWT).
* Product Details Storage: Instead of hardcoding product data in the backend, store it in a database and allow for CRUD operations.
* Multi-Language Support: Extend the project to handle different languages for different marketplaces (e.g., French).

---
## Step 6. Contributing
Contributions are welcome! Follow these steps to contribute:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature/foo-bar`).
3. Make your changes.
4. Commit your changes (git commit -am `Add some feature`).
5. Push to the branch (`git push origin feature/foo-bar`).
6. Create a new Pull Request.
