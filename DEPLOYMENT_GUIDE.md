# Kimseng Express - Deployment Guide

This guide will help you deploy your Kimseng Express full-stack application to Railway.

## 🚀 Deployment Overview

We'll deploy:
- **Backend (Laravel)** → Railway
- **Frontend (React)** → Railway  
- **Database** → Railway MySQL

## 📋 Prerequisites

1. **GitHub Account** - Your code should be on GitHub
2. **Railway Account** - Sign up at [railway.app](https://railway.app)
3. **Domain (Optional)** - For custom domain

## 🎯 Step-by-Step Deployment

### Step 1: Prepare Your Repository

Make sure your project structure looks like this:
```
kimseng-express/
├── frontend/          # React app
├── backend/           # Laravel app
├── README.md
└── DEPLOYMENT_GUIDE.md
```

### Step 2: Deploy Backend to Railway

1. **Go to Railway Dashboard**
   - Visit [railway.app](https://railway.app)
   - Click "New Project"
   - Select "Deploy from GitHub repo"

2. **Connect Your Repository**
   - Select your GitHub repository
   - Choose the repository containing your project

3. **Configure Backend Service**
   - **Service Name**: `kimseng-express-backend`
   - **Root Directory**: `backend`
   - **Build Command**: `composer install --no-dev --optimize-autoloader`
   - **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`

4. **Add Environment Variables**
   ```
   APP_NAME="Kimseng Express"
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:your-generated-key
   DB_CONNECTION=mysql
   DB_HOST=${{MySQL.HOST}}
   DB_PORT=${{MySQL.PORT}}
   DB_DATABASE=${{MySQL.DATABASE}}
   DB_USERNAME=${{MySQL.USERNAME}}
   DB_PASSWORD=${{MySQL.PASSWORD}}
   ```

5. **Deploy**
   - Click "Deploy Now"
   - Wait for deployment to complete

### Step 3: Add MySQL Database

1. **Add MySQL Service**
   - In your Railway project, click "New Service"
   - Select "Database" → "MySQL"

2. **Configure Database**
   - **Service Name**: `kimseng-express-db`
   - Railway will automatically create the database

3. **Connect Backend to Database**
   - Go to your backend service
   - Add the MySQL environment variables (Railway will provide them)
   - Redeploy the backend service

### Step 4: Run Database Migrations

1. **Access Railway CLI** (optional)
   ```bash
   npm install -g @railway/cli
   railway login
   railway link
   ```

2. **Run Migrations**
   ```bash
   railway run --service backend php artisan migrate
   railway run --service backend php artisan db:seed --class=DestinationSeeder
   ```

### Step 5: Deploy Frontend to Railway

1. **Add Frontend Service**
   - In your Railway project, click "New Service"
   - Select "Deploy from GitHub repo"
   - Choose the same repository

2. **Configure Frontend Service**
   - **Service Name**: `kimseng-express-frontend`
   - **Root Directory**: `frontend`
   - **Build Command**: `npm install && npm run build`
   - **Start Command**: `npm run preview --host 0.0.0.0 --port $PORT`

3. **Add Environment Variables**
   ```
   VITE_API_URL=https://your-backend-url.railway.app/api
   ```

4. **Deploy**
   - Click "Deploy Now"
   - Wait for deployment to complete

## 🔧 Configuration Files

### Backend: railway.json (Optional)
Create `backend/railway.json`:
```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "php artisan serve --host=0.0.0.0 --port=$PORT",
    "healthcheckPath": "/api/destinations",
    "healthcheckTimeout": 100,
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

### Frontend: railway.json (Optional)
Create `frontend/railway.json`:
```json
{
  "$schema": "https://railway.app/railway.schema.json",
  "build": {
    "builder": "NIXPACKS"
  },
  "deploy": {
    "startCommand": "npm run preview --host 0.0.0.0 --port $PORT",
    "healthcheckPath": "/",
    "healthcheckTimeout": 100,
    "restartPolicyType": "ON_FAILURE",
    "restartPolicyMaxRetries": 10
  }
}
```

## 🌐 Custom Domain Setup

1. **Get Your Railway URLs**
   - Backend: `https://your-backend-url.railway.app`
   - Frontend: `https://your-frontend-url.railway.app`

2. **Update Frontend API URL**
   - Go to frontend service settings
   - Update `VITE_API_URL` to your backend URL

3. **Add Custom Domain (Optional)**
   - Go to your service settings
   - Click "Custom Domains"
   - Add your domain
   - Configure DNS records

## 🔍 Testing Your Deployment

### Test Backend API
```bash
# Test destinations endpoint
curl https://your-backend-url.railway.app/api/destinations

# Test registration
curl -X POST https://your-backend-url.railway.app/api/register \
  -H "Content-Type: application/json" \
  -d '{"name":"Test User","email":"test@example.com","password":"password123","password_confirmation":"password123"}'
```

### Test Frontend
- Visit your frontend URL
- Try to register/login
- Test booking functionality
- Check if API calls work

## 🛠️ Troubleshooting

### Common Issues

1. **Backend Won't Start**
   - Check environment variables
   - Verify database connection
   - Check logs in Railway dashboard

2. **Frontend Can't Connect to Backend**
   - Verify `VITE_API_URL` is correct
   - Check CORS settings
   - Ensure backend is running

3. **Database Connection Issues**
   - Verify MySQL environment variables
   - Check if database service is running
   - Run migrations manually

4. **Build Failures**
   - Check build logs
   - Verify all dependencies are installed
   - Check for syntax errors

### Useful Commands

```bash
# Check backend logs
railway logs --service backend

# Check frontend logs
railway logs --service frontend

# Run commands on Railway
railway run --service backend php artisan migrate
railway run --service backend php artisan tinker

# Redeploy services
railway up --service backend
railway up --service frontend
```

## 📊 Monitoring

### Railway Dashboard
- Monitor service health
- Check resource usage
- View logs
- Track deployments

### Health Checks
- Backend: `/api/destinations`
- Frontend: `/`

## 🔒 Security Considerations

1. **Environment Variables**
   - Never commit sensitive data
   - Use Railway's environment variable system
   - Rotate keys regularly

2. **Database Security**
   - Use strong passwords
   - Enable SSL connections
   - Regular backups

3. **API Security**
   - Enable CORS properly
   - Use HTTPS in production
   - Implement rate limiting

## 📈 Scaling

### Automatic Scaling
Railway automatically scales based on:
- CPU usage
- Memory usage
- Request volume

### Manual Scaling
- Adjust resources in Railway dashboard
- Add more instances if needed
- Monitor performance metrics

## 💰 Cost Optimization

### Railway Pricing
- Free tier available
- Pay per usage
- Monitor resource consumption

### Optimization Tips
- Use appropriate resource limits
- Monitor and adjust as needed
- Consider caching strategies

## 🎉 Success!

Once deployed, you'll have:
- ✅ Full-stack application running
- ✅ Database with sample data
- ✅ API endpoints working
- ✅ Frontend connecting to backend
- ✅ Professional deployment

Your application is now ready to be submitted to your teacher! 🚀 