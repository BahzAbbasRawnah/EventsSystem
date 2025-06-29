# Events Management System

This project is an Events Management System built with Laravel, designed to manage events, bookings, tickets, vendors, and more. It provides a robust backend for event organizers and a user-friendly interface for attendees.

## Features
- Event creation and management
- Booking and ticketing system
- Vendor and subscription management
- Payment integration
- Multi-language support
- Admin dashboard (Filament)
- User authentication and authorization
- Responsive design with Tailwind CSS

## Technologies Used
- **Backend:** Laravel (PHP Framework)
- **Frontend:** Blade templates, Tailwind CSS, Vite
- **Database:** SQLite (default), MySQL supported
- **Admin Panel:** Filament
- **Other:** Livewire, Composer, NPM

## Installation Requirements
- PHP >= 8.1
- Composer
- Node.js & NPM
- SQLite (default) or MySQL
- XAMPP/WAMP/LAMP (for local development)

## Installation Steps

1. **Clone the repository:**
   ```sh
   git clone <repository-url>
   cd Events
   ```

2. **Install PHP dependencies:**
   ```sh
   composer install
   ```

3. **Install Node.js dependencies:**
   ```sh
   npm install
   ```

4. **Copy and configure environment file:**
   ```sh
   cp .env.example .env
   # Edit .env to set your database and mail settings
   ```

5. **Generate application key:**
   ```sh
   php artisan key:generate
   ```

6. **Run migrations and seeders:**
   ```sh
   php artisan migrate --seed
   ```

7. **Build frontend assets:**
   ```sh
   npm run build
   # For development: npm run dev
   ```

8. **Start the development server:**
   ```sh
   php artisan serve
   ```

9. **Access the application:**
   - Frontend: [http://localhost:8000](http://localhost:8000)
   - Admin Panel: [http://localhost:8000/admin](http://localhost:8000/admin)

## Useful Commands
- `php artisan migrate:fresh --seed` — Reset and reseed the database
- `php artisan make:model ModelName -m` — Create a new model with migration
- `php artisan make:controller ControllerName` — Create a new controller
- `npm run dev` — Start Vite development server
- `npm run build` — Build frontend assets for production

## Demo Data
To load demo data, see `README_DEMO_DATA.md` and run the provided SQL or seeders.

## Default Admin Credentials
- **Email:** admin@gmail.com
- **Password:** 123456789

## Project Structure
- `app/` — Application logic (Models, Controllers, etc.)
- `resources/views/` — Blade templates
- `public/` — Public assets
- `routes/` — Route definitions
- `database/` — Migrations, seeders, and SQLite database

## Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

## License
This project is open-source and available under the [MIT License](LICENSE).

