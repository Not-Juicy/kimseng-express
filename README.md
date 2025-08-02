# Kimseng Express - Full Stack Application

A complete logistics and transportation services platform built with React frontend and Laravel backend.

## 🚀 Project Overview

Kimseng Express is a full-stack web application that provides logistics and transportation services. The project consists of:

- **Frontend**: React + TypeScript + Vite + Tailwind CSS + shadcn/ui
- **Backend**: Laravel 12 + Laravel Sanctum + SQLite/MySQL
- **Database**: SQLite (development) / MySQL (production)

## 📁 Project Structure

```
kimseng-express/
├── frontend/                 # React frontend application
│   ├── src/
│   ├── public/
│   ├── package.json
│   └── ...
├── backend/                  # Laravel backend API
│   ├── app/
│   ├── database/
│   ├── routes/
│   ├── composer.json
│   └── ...
└── README.md
```

## ✨ Features

### Frontend Features
- **Modern UI/UX** - Beautiful, responsive design with Tailwind CSS
- **User Authentication** - Login/Register with JWT tokens
- **Booking System** - Create and manage transportation bookings
- **Destination Management** - Browse available destinations
- **Contact Form** - Customer inquiry system
- **Dashboard** - User dashboard with booking history
- **Responsive Design** - Works on all devices

### Backend Features
- **RESTful API** - Complete API with proper endpoints
- **User Authentication** - Laravel Sanctum for secure auth
- **Database Management** - Full CRUD operations
- **Input Validation** - Comprehensive validation rules
- **CORS Support** - Cross-origin resource sharing
- **API Documentation** - Complete endpoint documentation

## 🛠️ Tech Stack

### Frontend
- **React 18** - UI framework
- **TypeScript** - Type safety
- **Vite** - Build tool
- **Tailwind CSS** - Styling
- **shadcn/ui** - UI components
- **React Router** - Navigation
- **React Hook Form** - Form handling
- **Framer Motion** - Animations

### Backend
- **Laravel 12** - PHP framework
- **Laravel Sanctum** - API authentication
- **SQLite/MySQL** - Database
- **Eloquent ORM** - Database operations
- **RESTful API** - Standard API design

## 🚀 Quick Start

### Prerequisites
- **Node.js** 18+ (for frontend)
- **PHP** 8.2+ (for backend)
- **Composer** (for PHP dependencies)
- **Git**

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd kimseng-express
   ```

2. **Setup Backend (Laravel)**
   ```bash
   cd backend
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   php artisan db:seed --class=DestinationSeeder
   php artisan serve
   ```
   Backend will run at: `http://localhost:8000`

3. **Setup Frontend (React)**
   ```bash
   cd frontend  # or just stay in root and run:
   npm install
   npm run dev
   ```
   Frontend will run at: `http://localhost:5173`

4. **Access the Application**
   - Frontend: http://localhost:5173
   - Backend API: http://localhost:8000/api
   - API Documentation: Check `backend/API_DOCUMENTATION.md`

## 📚 API Documentation

The complete API documentation is available in `backend/API_DOCUMENTATION.md`

### Key Endpoints
- **Authentication**: `/api/register`, `/api/login`, `/api/logout`
- **Bookings**: `/api/bookings` (CRUD operations)
- **Destinations**: `/api/destinations` (CRUD operations)
- **Contact**: `/api/contact` (send messages)

## 🗄️ Database Schema

### Tables
- `users` - User accounts
- `bookings` - Transportation bookings
- `destinations` - Available destinations
- `contact_messages` - Customer inquiries
- `personal_access_tokens` - API authentication

### Sample Data
The database comes pre-seeded with 7 Cambodian destinations:
- Phnom Penh, Siem Reap, Battambang
- Sihanoukville, Kampot, Kep, Mondulkiri

## 🧪 Testing

### Frontend Testing
```bash
cd frontend
npm run test
```

### Backend Testing
```bash
cd backend
php artisan test
```

### API Testing
Use tools like Postman, Insomnia, or curl to test the API endpoints.

## 🚀 Deployment

### Option 1: Railway (Recommended)
1. **Backend**: Deploy Laravel to Railway
2. **Frontend**: Deploy React to Railway
3. **Database**: Railway provides MySQL/PostgreSQL

### Option 2: Vercel + Railway
1. **Frontend**: Deploy to Vercel
2. **Backend**: Deploy to Railway
3. **Database**: Railway database

### Option 3: Traditional Hosting
1. **Backend**: Upload to VPS/shared hosting
2. **Frontend**: Build and upload static files
3. **Database**: Set up MySQL on server

## 🔧 Environment Variables

### Frontend (.env)
```env
VITE_API_URL=http://localhost:8000/api
```

### Backend (.env)
```env
APP_NAME="Kimseng Express"
APP_ENV=production
APP_DEBUG=false
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password
```

## 📝 Development

### Frontend Development
```bash
cd frontend
npm run dev          # Start development server
npm run build        # Build for production
npm run preview      # Preview production build
```

### Backend Development
```bash
cd backend
php artisan serve    # Start development server
php artisan migrate  # Run migrations
php artisan tinker   # Interactive shell
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is part of the Kimseng Express application.

## 🆘 Support

- **Frontend Issues**: Check React/Vite documentation
- **Backend Issues**: Check Laravel documentation
- **API Issues**: Refer to `backend/API_DOCUMENTATION.md`
- **Deployment Issues**: Check deployment platform documentation

## 🎯 Project Goals

This project demonstrates:
- Full-stack development skills
- Modern web technologies
- API design and implementation
- Database design and management
- Authentication and security
- Deployment and hosting

Perfect for showcasing to teachers, employers, or as a portfolio project!
