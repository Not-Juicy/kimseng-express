# Kimseng Express Backend API

A Laravel-based REST API for the Kimseng Express logistics and transportation services platform.

## Features

- **User Authentication** - Register, login, logout with Laravel Sanctum
- **Booking Management** - Create, read, update, delete bookings
- **Destination Management** - Manage transportation destinations and pricing
- **Contact Form** - Handle customer inquiries and messages
- **Database** - SQLite database with proper relationships
- **API Documentation** - Complete API documentation included

## Tech Stack

- **Laravel 12** - PHP framework
- **Laravel Sanctum** - API authentication
- **SQLite** - Database (can be easily switched to MySQL/PostgreSQL)
- **RESTful API** - Standard REST endpoints

## Database Schema

### Tables
- `users` - User accounts and authentication
- `bookings` - Transportation bookings with user relationships
- `destinations` - Available destinations with pricing
- `contact_messages` - Customer contact form submissions
- `personal_access_tokens` - API authentication tokens

### Relationships
- User has many Bookings
- Destination has many Bookings
- All tables include timestamps and proper indexing

## Installation

### Prerequisites
- PHP 8.2+
- Composer
- Node.js (for frontend assets if needed)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd backend
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed --class=DestinationSeeder
   ```

5. **Start the server**
   ```bash
   php artisan serve
   ```

The API will be available at `http://localhost:8000/api`

## API Endpoints

### Authentication
- `POST /api/register` - Register new user
- `POST /api/login` - Login user
- `POST /api/logout` - Logout user (requires auth)
- `GET /api/user` - Get current user (requires auth)

### Bookings
- `GET /api/bookings` - Get user's bookings (requires auth)
- `POST /api/bookings` - Create new booking (requires auth)
- `GET /api/bookings/{id}` - Get specific booking (requires auth)
- `PUT /api/bookings/{id}` - Update booking (requires auth)
- `DELETE /api/bookings/{id}` - Delete booking (requires auth)

### Destinations
- `GET /api/destinations` - Get all destinations
- `GET /api/destinations/{id}` - Get specific destination
- `POST /api/destinations` - Create destination (requires auth)
- `PUT /api/destinations/{id}` - Update destination (requires auth)
- `DELETE /api/destinations/{id}` - Delete destination (requires auth)

### Contact
- `POST /api/contact` - Send contact message
- `GET /api/contact-messages` - Get all messages (requires auth)
- `GET /api/contact-messages/{id}` - Get specific message (requires auth)
- `PATCH /api/contact-messages/{id}/read` - Mark as read (requires auth)

## Sample Data

The database comes pre-seeded with 7 Cambodian destinations:
- Phnom Penh
- Siem Reap
- Battambang
- Sihanoukville
- Kampot
- Kep
- Mondulkiri

Each destination includes pricing for express, standard, and economy services.

## Testing

### Manual Testing
Use tools like Postman, Insomnia, or curl to test the API endpoints.

### Example curl commands
```bash
# Register a user
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{"name":"John Doe","email":"john@example.com","password":"password123","password_confirmation":"password123"}'

# Login
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"john@example.com","password":"password123"}'

# Get destinations
curl -X GET http://localhost:8000/api/destinations
```

## Deployment

### Railway (Recommended)
1. Connect your GitHub repository to Railway
2. Set environment variables in Railway dashboard
3. Deploy automatically

### Heroku
1. Create Heroku app
2. Add PostgreSQL addon
3. Set environment variables
4. Deploy using Git

### VPS/Shared Hosting
1. Upload files to server
2. Set up database
3. Configure web server (Apache/Nginx)
4. Set environment variables

## Environment Variables

Key environment variables to configure:
- `APP_KEY` - Laravel application key
- `DB_CONNECTION` - Database connection (sqlite, mysql, pgsql)
- `DB_DATABASE` - Database name
- `DB_USERNAME` - Database username
- `DB_PASSWORD` - Database password
- `APP_ENV` - Environment (local, production)
- `APP_DEBUG` - Debug mode (false in production)

## Security Features

- **Laravel Sanctum** for secure API authentication
- **CSRF protection** for web routes
- **Input validation** on all endpoints
- **SQL injection protection** through Eloquent ORM
- **XSS protection** through Laravel's built-in features
- **Rate limiting** can be added easily

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## License

This project is part of the Kimseng Express application.

## Support

For support, please contact the development team or refer to the API documentation in `API_DOCUMENTATION.md`.
