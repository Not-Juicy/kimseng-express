import React from 'react';
import Header from '../components/Header';
import Footer from '../components/Footer';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { MapPin, Clock, DollarSign } from 'lucide-react';
import { useLanguage } from '../context/LanguageContext';

const Routes = () => {
  const { t } = useLanguage();
  const routes = [
    {
      id: 1,
      from: t('phnomPenh'),
      to: t('kampot'),
      departureTime: "07:00 AM",
      arrivalTime: "10:30 AM",
      duration: "3h 30m",
      price: "$12",
      frequency: "Daily"
    },
    {
      id: 2,
      from: t('phnomPenh'),
      to: t('kep'),
      departureTime: "08:00 AM",
      arrivalTime: "12:00 PM",
      duration: "4h 00m",
      price: "$15",
      frequency: "Daily"
    },
    {
      id: 3,
      from: t('phnomPenh'),
      to: t('mondulkiri'),
      departureTime: "06:00 AM",
      arrivalTime: "01:00 PM",
      duration: "7h 00m",
      price: "$25",
      frequency: "Mon, Wed, Fri"
    },
    {
      id: 4,
      from: t('kampot'),
      to: t('phnomPenh'),
      departureTime: "02:00 PM",
      arrivalTime: "05:30 PM",
      duration: "3h 30m",
      price: "$12",
      frequency: "Daily"
    },
    {
      id: 5,
      from: t('kep'),
      to: t('phnomPenh'),
      departureTime: "01:00 PM",
      arrivalTime: "05:00 PM",
      duration: "4h 00m",
      price: "$15",
      frequency: "Daily"
    },
    {
      id: 6,
      from: t('mondulkiri'),
      to: t('phnomPenh'),
      departureTime: "07:00 AM",
      arrivalTime: "02:00 PM",
      duration: "7h 00m",
      price: "$25",
      frequency: "Tue, Thu, Sat"
    }
  ];

  return (
    <div className="min-h-screen bg-background">
      <Header />
      
      <main className="pt-20">
        {/* Hero Section */}
        <section className="bg-gradient-to-r from-teal-500 to-blue-600 text-white py-16">
          <div className="container mx-auto px-4 text-center">
            <h1 className="text-4xl md:text-5xl font-bold mb-4">{t('ourRoutes')}</h1>
            <p className="text-xl opacity-90">{t('reliableTransportation')}</p>
          </div>
        </section>

        {/* Routes Grid */}
        <section className="py-16">
          <div className="container mx-auto px-4">
            <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
              {routes.map((route) => (
                <Card key={route.id} className="hover:shadow-lg transition-shadow">
                  <CardHeader>
                    <CardTitle className="flex items-center text-lg">
                      <MapPin className="h-5 w-5 text-teal-500 mr-2" />
                      {route.from} → {route.to}
                    </CardTitle>
                  </CardHeader>
                  <CardContent className="space-y-4">
                    <div className="flex items-center justify-between">
                      <div className="flex items-center">
                        <Clock className="h-4 w-4 text-gray-500 mr-2" />
                        <span className="text-sm text-gray-600">{t('departure')}</span>
                      </div>
                      <span className="font-semibold">{route.departureTime}</span>
                    </div>
                    
                    <div className="flex items-center justify-between">
                      <div className="flex items-center">
                        <Clock className="h-4 w-4 text-gray-500 mr-2" />
                        <span className="text-sm text-gray-600">{t('arrival')}</span>
                      </div>
                      <span className="font-semibold">{route.arrivalTime}</span>
                    </div>

                    <div className="flex items-center justify-between">
                      <span className="text-sm text-gray-600">{t('duration')}</span>
                      <span className="font-semibold">{route.duration}</span>
                    </div>

                    <div className="flex items-center justify-between">
                      <span className="text-sm text-gray-600">{t('frequency')}</span>
                      <span className="font-semibold text-teal-600">{route.frequency}</span>
                    </div>

                    <div className="border-t pt-4">
                      <div className="flex items-center justify-between mb-4">
                        <div className="flex items-center">
                          <DollarSign className="h-5 w-5 text-green-500 mr-1" />
                          <span className="text-2xl font-bold text-green-600">{route.price}</span>
                        </div>
                        <Button className="bg-teal-500 hover:bg-teal-600">
                          {t('bookNow')}
                        </Button>
                      </div>
                    </div>
                  </CardContent>
                </Card>
              ))}
            </div>
          </div>
        </section>
      </main>

      <Footer />
    </div>
  );
};

export default Routes;
