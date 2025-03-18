# 🚀 EBANX Bank API  

API with basic banking methods, developed for the EBANX technical test.  

## 🛠 Technologies  

- **PHP** with the **Laravel** framework  

## How to Run the Project  

1. Clone this repository:  
   ```sh
   git clone https://github.com/aeduardamariaa/Ebanx-test.git
   cd Ebanx-test
   ```  
2. Install dependencies:  
   ```sh
   composer install
   ```  
3. Set up the environment:  
   - Create a `.env` file based on `.env.example`  
   - Configure environment variables such as database connection and application key  
4. Generate the application key:  
   ```sh
   php artisan key:generate
   ```  
5. Run the database migrations:  
   ```sh
   php artisan migrate
   ```  
6. Start the local server:  
   ```sh
   php artisan serve
   ```  

Now the API is available at `http://127.0.0.1:8000` 