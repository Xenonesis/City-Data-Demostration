# 🌆 City Data Demonstration

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![Tests](https://img.shields.io/github/actions/workflow/status/Xenonesis/City-Data-Demostration/tests.yml?branch=master&style=for-the-badge)](https://github.com/Xenonesis/City-Data-Demostration/actions)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

A beautiful and interactive web application built with Laravel that showcases comprehensive city data across India. Explore population statistics, state-wise distributions, and detailed city information through an elegant, responsive interface.

## ✨ Features

- 🏙️ **Comprehensive City Database** - Detailed information about cities including population, state, district, and classification
- 🔍 **Advanced Search & Filtering** - Search cities by name, state, or district with real-time filtering
- 📊 **Rich Statistics Dashboard** - View population statistics, top cities, and state-wise distributions
- 📱 **Responsive Design** - Beautiful, mobile-friendly interface that works on all devices
- 🚀 **Fast & Efficient** - Optimized queries and caching for smooth performance
- 🎨 **Modern UI** - Clean, intuitive design with Bootstrap styling

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM (for frontend assets)
- MySQL or SQLite database

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Xenonesis/City-Data-Demostration.git
   cd city-data-demonstration
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   - Configure your database settings in `.env`
   - Run migrations:
     ```bash
     php artisan migrate
     ```

6. **Seed the database** (if seeders are available)
   ```bash
   php artisan db:seed
   ```

7. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to view the application!

## 📖 Usage

### Browsing Cities
- Navigate to the cities page to view all cities
- Use the search bar to find specific cities
- Filter cities by state using the dropdown
- Click on any city to view detailed information

### Viewing Statistics
- Check the dashboard for population statistics
- View top cities by population
- Explore cities grouped by state

## 🗄️ Database Structure

The application uses a `city_masters` table with the following key fields:
- `city` - City name
- `state_ut` - State/Union Territory code
- `MSTR1` - State name
- `MSTR2` - Population in thousands (K)
- `MSTR3` - Exact population
- `MSTR4` - Urban population
- `MSTR5` - City classification
- `MSTR6` - District name
- And more demographic data...

## 🧪 Testing

Run the test suite:
```bash
composer test
# or
php artisan test
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com) - The PHP framework for web artisans
- Styled with [Bootstrap](https://getbootstrap.com) - The most popular HTML, CSS, and JS library
- Data sourced from official Indian census and administrative records

---

<p align="center">Made with ❤️ using Laravel</p>
