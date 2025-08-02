import React from 'react';
import { useNavigate } from 'react-router-dom';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import Header from '../components/Header';
import Footer from '../components/Footer';
import { useLanguage } from '../context/LanguageContext';
import { useAuth } from '../context/AuthContext';
import { useToast } from "@/hooks/use-toast";
import { LogOut, User, Mail } from 'lucide-react';

const Dashboard = () => {
  const navigate = useNavigate();
  const { t } = useLanguage();
  const { toast } = useToast();
  const { user, logout, isAuthenticated } = useAuth();

  // Redirect if not authenticated
  React.useEffect(() => {
    if (!isAuthenticated) {
      navigate('/login');
    }
  }, [isAuthenticated, navigate]);

  const handleLogout = async () => {
    await logout();
    toast({
      title: t('logoutSuccess') || 'Logged out successfully',
      description: t('comeBackSoon') || 'Come back soon!',
    });
    navigate('/');
  };

  if (!user) {
    return <div>Loading...</div>;
  }

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="container mx-auto px-4 py-8">
        <div className="max-w-4xl mx-auto">
          <div className="mb-8">
            <h1 className="text-4xl font-bold text-foreground mb-2">
              {t('dashboard') || 'Dashboard'}
            </h1>
            <p className="text-muted-foreground">
              {t('welcomeBack') || 'Welcome back!'}
            </p>
          </div>

          <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            {/* User Info Card */}
            <Card>
              <CardHeader>
                <CardTitle className="flex items-center gap-2">
                  <User className="h-5 w-5" />
                  {t('userInfo') || 'User Information'}
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="space-y-3">
                  <div className="flex items-center gap-2">
                    <User className="h-4 w-4 text-muted-foreground" />
                    <span className="font-medium">{user.name}</span>
                  </div>
                  <div className="flex items-center gap-2">
                    <Mail className="h-4 w-4 text-muted-foreground" />
                    <span className="text-muted-foreground">{user.email}</span>
                  </div>
                </div>
              </CardContent>
            </Card>

            {/* Quick Actions Card */}
            <Card>
              <CardHeader>
                <CardTitle>{t('quickActions') || 'Quick Actions'}</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="space-y-3">
                  <Button 
                    onClick={() => navigate('/booking')} 
                    className="w-full"
                  >
                    {t('bookNow') || 'Book Now'}
                  </Button>
                  <Button 
                    onClick={() => navigate('/booking-history')} 
                    variant="outline" 
                    className="w-full"
                  >
                    {t('bookingHistory') || 'Booking History'}
                  </Button>
                </div>
              </CardContent>
            </Card>

            {/* Account Actions Card */}
            <Card>
              <CardHeader>
                <CardTitle>{t('accountActions') || 'Account Actions'}</CardTitle>
              </CardHeader>
              <CardContent>
                <div className="space-y-3">
                  <Button 
                    onClick={handleLogout} 
                    variant="destructive" 
                    className="w-full"
                  >
                    <LogOut className="h-4 w-4 mr-2" />
                    {t('logout') || 'Logout'}
                  </Button>
                </div>
              </CardContent>
            </Card>
          </div>

          {/* Recent Activity Section */}
          <Card className="mt-8">
            <CardHeader>
              <CardTitle>{t('recentActivity') || 'Recent Activity'}</CardTitle>
            </CardHeader>
            <CardContent>
              <p className="text-muted-foreground">
                {t('noRecentActivity') || 'No recent activity to display.'}
              </p>
            </CardContent>
          </Card>
        </div>
      </main>

      <Footer />
    </div>
  );
};

export default Dashboard; 