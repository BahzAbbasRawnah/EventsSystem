# Event Ticketing System Demo Data

This package includes demo data for the Event Ticketing System with real events in Saudi Arabia (KSA) and actual images.

## Setup Instructions

Follow these steps to set up the demo data in your Laravel application:

### 1. Download Event Images

Run the provided shell script to download all event images:

```bash
chmod +x download_event_images.sh
./download_event_images.sh
```

This will download all the event images to the `public/Assets/events/` directory.

### 2. Run the Database Seeder

The demo data is set up to be seeded using Laravel's seeder system. Run the following command:

```bash
php artisan db:seed --class=DemoDataSeeder
```

Alternatively, you can run all seeders (which will include the demo data):

```bash
php artisan db:seed
```

### 3. What's Included

The demo data includes:

- **Categories**: 8 event categories (Concerts, Conferences, Sports, Cultural, Entertainment, Technology, Business, Food & Dining)
- **Countries**: Saudi Arabia
- **Cities**: 9 major cities in Saudi Arabia (Riyadh, Jeddah, Dammam, Mecca, Medina, Al Khobar, Tabuk, NEOM, AlUla)
- **Districts**: 21 districts across these cities
- **Users**: Admin user and 4 event organizers
- **Events**: 20 real events in Saudi Arabia with detailed information
- **Event Images**: 45 real images for these events

### 4. Demo Accounts

You can log in with the following demo accounts:

- **Admin User**:
  - Email: admin@eventre.com
  - Password: password

- **Event Organizer (Saudi Entertainment Authority)**:
  - Email: sea@events.sa
  - Password: password

- **Event Organizer (Riyadh Season)**:
  - Email: riyadhseason@events.sa
  - Password: password

- **Event Organizer (MDLBEAST)**:
  - Email: info@mdlbeast.com
  - Password: password

- **Regular User**:
  - Email: user@example.com
  - Password: password

### 5. Featured Events

The following events are marked as featured and will appear in the featured section:

- SOUNDSTORM 2023
- Mariah Carey Live in Riyadh
- LEAP Tech Conference
- Future Investment Initiative
- Formula 1 Saudi Arabian Grand Prix
- AlUla Moments
- Riyadh Season Boulevard World
- Winter Wonderland Riyadh
- Riyadh Food Festival

## Customization

If you need to modify the demo data:

1. Edit the `database/seeders/demo_data.sql` file to change the database records
2. Edit the `download_event_images.sh` script to add or modify image URLs

## Troubleshooting

- If you encounter issues with the SQL file, you may need to modify the TRUNCATE statements based on your database constraints
- If images fail to download, you can manually download them from the URLs in the script
- Make sure the `public/Assets/events/` directory is writable by your web server

## Credits

The demo data includes real events from Saudi Arabia and images from various sources including Arab News and official event websites. All data is used for demonstration purposes only.
