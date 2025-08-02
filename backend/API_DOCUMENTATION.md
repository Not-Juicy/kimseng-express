# Kimseng Express API Documentation

## Base URL
```
http://localhost:8000/api
```

## Authentication Endpoints

### Register User
```
POST /register
```
**Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

### Login User
```
POST /login
```
**Body:**
```json
{
    "email": "john@example.com",
    "password": "password123"
}
```

### Logout User
```
POST /logout
```
**Headers:** `Authorization: Bearer {token}`

### Get Current User
```
GET /user
```
**Headers:** `Authorization: Bearer {token}`

## Booking Endpoints

### Get All Bookings (User)
```
GET /bookings
```
**Headers:** `Authorization: Bearer {token}`

### Create Booking
```
POST /bookings
```
**Headers:** `Authorization: Bearer {token}`
**Body:**
```json
{
    "destination": "Phnom Penh",
    "service_type": "express",
    "pickup_date": "2024-01-15",
    "pickup_time": "14:30",
    "pickup_address": "123 Main St, Phnom Penh",
    "delivery_address": "456 Central Ave, Siem Reap",
    "description": "Fragile items",
    "weight": 25.5
}
```

### Get Single Booking
```
GET /bookings/{id}
```
**Headers:** `Authorization: Bearer {token}`

### Update Booking
```
PUT /bookings/{id}
```
**Headers:** `Authorization: Bearer {token}`
**Body:** Same as create booking

### Delete Booking
```
DELETE /bookings/{id}
```
**Headers:** `Authorization: Bearer {token}`

## Destination Endpoints

### Get All Destinations
```
GET /destinations
```

### Get Single Destination
```
GET /destinations/{id}
```

### Create Destination (Admin)
```
POST /destinations
```
**Headers:** `Authorization: Bearer {token}`
**Body:**
```json
{
    "name": "New Destination",
    "description": "Description here",
    "image_url": "https://example.com/image.jpg",
    "express_price": 50.00,
    "standard_price": 35.00,
    "economy_price": 25.00
}
```

### Update Destination (Admin)
```
PUT /destinations/{id}
```
**Headers:** `Authorization: Bearer {token}`

### Delete Destination (Admin)
```
DELETE /destinations/{id}
```
**Headers:** `Authorization: Bearer {token}`

## Contact Endpoints

### Send Contact Message
```
POST /contact
```
**Body:**
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "subject": "Inquiry",
    "message": "Hello, I have a question..."
}
```

### Get All Contact Messages (Admin)
```
GET /contact-messages
```
**Headers:** `Authorization: Bearer {token}`

### Get Single Contact Message (Admin)
```
GET /contact-messages/{id}
```
**Headers:** `Authorization: Bearer {token}`

### Mark Message as Read (Admin)
```
PATCH /contact-messages/{id}/read
```
**Headers:** `Authorization: Bearer {token}`

## Response Format

All API responses follow this format:

**Success:**
```json
{
    "message": "Success message",
    "data": {...}
}
```

**Error:**
```json
{
    "message": "Error message",
    "errors": {...}
}
```

## Authentication

Most endpoints require authentication using Bearer tokens. Include the token in the Authorization header:

```
Authorization: Bearer {your_token_here}
```

## Testing the API

You can test the API using tools like:
- Postman
- Insomnia
- curl
- Thunder Client (VS Code extension)

## Sample Test Data

The database comes pre-seeded with 7 destinations:
- Phnom Penh
- Siem Reap
- Battambang
- Sihanoukville
- Kampot
- Kep
- Mondulkiri 