// API Configuration
const API_BASE_URL = import.meta.env.VITE_API_URL || 'https://kimseng-express-production.up.railway.app/api';

// API Utility Functions
export const apiConfig = {
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
};

// Helper function to get auth headers
export const getAuthHeaders = (token?: string) => {
  const headers = { ...apiConfig.headers };
  if (token) {
    headers['Authorization'] = `Bearer ${token}`;
  }
  return headers;
};

// API endpoints
export const endpoints = {
  // Authentication
  register: '/register',
  login: '/login',
  logout: '/logout',
  user: '/user',
  
  // Bookings
  bookings: '/bookings',
  
  // Destinations
  destinations: '/destinations',
  
  // Contact
  contact: '/contact',
};

// API request helper
export const apiRequest = async (endpoint: string, options: RequestInit = {}) => {
  const url = `${apiConfig.baseURL}${endpoint}`;
  const config = {
    ...options,
    headers: {
      ...apiConfig.headers,
      ...options.headers,
    },
  };

  try {
    const response = await fetch(url, config);
    const data = await response.json();
    
    if (!response.ok) {
      throw new Error(data.message || 'API request failed');
    }
    
    return data;
  } catch (error) {
    console.error('API request error:', error);
    throw error;
  }
}; 