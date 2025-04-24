

-- Categories
INSERT INTO categories (id, name, icon, created_at, updated_at) VALUES
(1, 'Concerts', 'music', NOW(), NOW()),
(2, 'Conferences', 'microphone', NOW(), NOW()),
(3, 'Sports', 'futbol', NOW(), NOW()),
(4, 'Cultural', 'landmark', NOW(), NOW()),
(5, 'Entertainment', 'theater-masks', NOW(), NOW()),
(6, 'Technology', 'laptop-code', NOW(), NOW()),
(7, 'Business', 'briefcase', NOW(), NOW()),
(8, 'Food & Dining', 'utensils', NOW(), NOW());

-- Countries
INSERT INTO countries (id, name, code, created_at, updated_at) VALUES
(1, 'Saudi Arabia', 'SA', NOW(), NOW());

-- Cities in Saudi Arabia
INSERT INTO cities (id, name, country_id, created_at, updated_at) VALUES
(1, 'Riyadh', 1, NOW(), NOW()),
(2, 'Jeddah', 1, NOW(), NOW()),
(3, 'Dammam', 1, NOW(), NOW()),
(4, 'Mecca', 1, NOW(), NOW()),
(5, 'Medina', 1, NOW(), NOW()),
(6, 'Al Khobar', 1, NOW(), NOW()),
(7, 'Tabuk', 1, NOW(), NOW()),
(8, 'NEOM', 1, NOW(), NOW()),
(9, 'AlUla', 1, NOW(), NOW());

-- Districts
INSERT INTO districts (id, name, city_id, created_at, updated_at) VALUES
-- Riyadh Districts
(1, 'Al Olaya', 1, NOW(), NOW()),
(2, 'Al Malaz', 1, NOW(), NOW()),
(3, 'Diplomatic Quarter', 1, NOW(), NOW()),
(4, 'King Abdullah Financial District', 1, NOW(), NOW()),
-- Jeddah Districts
(5, 'Al Hamra', 2, NOW(), NOW()),
(6, 'Al Andalus', 2, NOW(), NOW()),
(7, 'Al Shati', 2, NOW(), NOW()),
-- Dammam Districts
(8, 'Al Faisaliyah', 3, NOW(), NOW()),
(9, 'King Fahd District', 3, NOW(), NOW()),
-- Mecca Districts
(10, 'Al Aziziyah', 4, NOW(), NOW()),
(11, 'Al Hajlah', 4, NOW(), NOW()),
-- Medina Districts
(12, 'Quba', 5, NOW(), NOW()),
(13, 'Al Haram', 5, NOW(), NOW()),
-- Al Khobar Districts
(14, 'Al Khobar Corniche', 6, NOW(), NOW()),
(15, 'Al Ulaya', 6, NOW(), NOW()),
-- Tabuk Districts
(16, 'Al Wurud', 7, NOW(), NOW()),
(17, 'Al Faisaliyah', 7, NOW(), NOW()),
-- NEOM Districts
(18, 'The Line', 8, NOW(), NOW()),
(19, 'Oxagon', 8, NOW(), NOW()),
-- AlUla Districts
(20, 'Old Town', 9, NOW(), NOW()),
(21, 'Hegra', 9, NOW(), NOW());

-- Users (including admin and event organizers)
INSERT INTO users (id, name, email, password, role, phone, created_at, updated_at) VALUES
(1, 'Admin User', 'admin@eventre.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '+966501234567', NOW(), NOW()),
(2, 'Saudi Entertainment Authority', 'sea@events.sa', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'organizer', '+966501234568', NOW(), NOW()),
(3, 'Riyadh Season', 'riyadhseason@events.sa', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'organizer', '+966501234569', NOW(), NOW()),
(4, 'MDLBEAST', 'info@mdlbeast.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'organizer', '+966501234570', NOW(), NOW()),
(5, 'Regular User', 'user@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user', '+966501234571', NOW(), NOW());

-- Events
INSERT INTO events (id, name, description, start_date, end_date, ticket_price, available_tickets, is_featured, is_popular, category_id, country_id, city_id, district_id, user_id, created_at, updated_at) VALUES
-- Concerts
(1, 'SOUNDSTORM 2023', 'MDLBEAST SOUNDSTORM is the region's biggest and loudest music festival. Featuring the world's best DJs and artists across multiple stages.', '2023-12-14 16:00:00', '2023-12-16 23:59:00', 399, 5000, true, true, 1, 1, 1, 1, 4, NOW(), NOW()),
(2, 'Mariah Carey Live in Riyadh', 'Experience the legendary voice of Mariah Carey live in concert at the Riyadh Season.', '2023-10-26 20:00:00', '2023-10-26 23:00:00', 750, 2000, true, true, 1, 1, 1, 3, 3, NOW(), NOW()),
(3, 'Jeddah World Fest', 'An international music festival featuring top global artists performing live in Jeddah.', '2023-11-18 18:00:00', '2023-11-18 23:30:00', 450, 3500, false, true, 1, 1, 2, 7, 2, NOW(), NOW()),

-- Conferences
(4, 'LEAP Tech Conference', 'LEAP is a global platform for the most disruptive technology professionals to showcase their innovations.', '2024-02-04 09:00:00', '2024-02-07 18:00:00', 1200, 10000, true, false, 6, 1, 1, 4, 2, NOW(), NOW()),
(5, 'Future Investment Initiative', 'The Future Investment Initiative (FII) is an international platform for expert-led debate between global leaders, investors and innovators.', '2023-10-24 09:00:00', '2023-10-26 18:00:00', 5000, 2000, true, false, 7, 1, 1, 4, 2, NOW(), NOW()),

-- Sports
(6, 'Formula 1 Saudi Arabian Grand Prix', 'Experience the thrill of Formula 1 racing at the Jeddah Corniche Circuit.', '2024-03-08 14:00:00', '2024-03-10 18:00:00', 1500, 40000, true, true, 3, 1, 2, 7, 2, NOW(), NOW()),
(7, 'WWE Crown Jewel', 'WWE Crown Jewel returns to Saudi Arabia with the biggest superstars in sports entertainment.', '2023-11-04 19:00:00', '2023-11-04 23:00:00', 800, 15000, false, true, 3, 1, 1, 1, 3, NOW(), NOW()),
(8, 'Saudi Pro League: Al Hilal vs Al Nassr', 'The biggest match in Saudi football as Al Hilal takes on Al Nassr in this crucial league fixture.', '2023-10-31 20:00:00', '2023-10-31 22:00:00', 200, 60000, false, true, 3, 1, 1, 2, 2, NOW(), NOW()),

-- Cultural
(9, 'AlUla Moments', 'Experience the magic of AlUla with music, art, and cultural performances in this ancient landscape.', '2023-12-21 16:00:00', '2024-03-02 22:00:00', 350, 5000, true, false, 4, 1, 9, 20, 2, NOW(), NOW()),
(10, 'Diriyah Contemporary Art Biennale', 'Saudi Arabia's first contemporary art biennale featuring works from local and international artists.', '2024-01-15 10:00:00', '2024-05-15 20:00:00', 75, 10000, false, false, 4, 1, 1, 3, 3, NOW(), NOW()),

-- Entertainment
(11, 'Riyadh Season Boulevard World', 'Experience cultures from around the world at Boulevard World, featuring replicas of landmarks, cuisines, and entertainment.', '2023-10-28 16:00:00', '2024-03-31 00:00:00', 100, 100000, true, true, 5, 1, 1, 1, 3, NOW(), NOW()),
(12, 'Winter Wonderland Riyadh', 'Experience the magic of winter in the heart of the desert with rides, games, and festive attractions.', '2023-12-01 16:00:00', '2024-01-31 00:00:00', 50, 200000, true, true, 5, 1, 1, 2, 3, NOW(), NOW()),
(13, 'Cirque du Soleil: Messi10', 'A breathtaking performance inspired by the football legend Lionel Messi, combining stunning acrobatics with the beautiful game.', '2023-11-10 20:00:00', '2023-12-10 22:00:00', 350, 8000, false, true, 5, 1, 2, 6, 2, NOW(), NOW()),

-- Technology
(14, 'Saudi IoT Conference', 'The largest IoT exhibition and conference in the Kingdom, showcasing the latest in smart technology.', '2024-02-13 09:00:00', '2024-02-15 18:00:00', 500, 3000, false, false, 6, 1, 1, 4, 2, NOW(), NOW()),
(15, 'Artificial Intelligence Summit', 'Bringing together AI experts, researchers, and businesses to explore the future of artificial intelligence in Saudi Arabia.', '2024-01-22 09:00:00', '2024-01-24 17:00:00', 750, 2000, false, false, 6, 1, 3, 9, 2, NOW(), NOW()),

-- Business
(16, 'Saudi Entrepreneurship Forum', 'Connect with entrepreneurs, investors, and business leaders at Saudi Arabia's premier entrepreneurship event.', '2023-12-05 09:00:00', '2023-12-07 17:00:00', 300, 5000, false, false, 7, 1, 1, 4, 2, NOW(), NOW()),
(17, 'Vision 2030 Business Conference', 'Explore business opportunities aligned with Saudi Arabia's Vision 2030 economic transformation plan.', '2024-01-08 09:00:00', '2024-01-10 17:00:00', 450, 3000, false, false, 7, 1, 2, 5, 2, NOW(), NOW()),

-- Food & Dining
(18, 'Riyadh Food Festival', 'A culinary celebration featuring the best of local and international cuisine, with top chefs and food experiences.', '2023-11-15 16:00:00', '2023-11-30 23:00:00', 75, 20000, true, false, 8, 1, 1, 1, 3, NOW(), NOW()),
(19, 'Saudi Coffee Festival', 'Celebrating Saudi Arabia's rich coffee heritage with tastings, workshops, and cultural performances.', '2024-01-15 10:00:00', '2024-01-20 22:00:00', 50, 15000, false, false, 8, 1, 5, 12, 2, NOW(), NOW()),
(20, 'Jeddah Seafood Market Festival', 'Experience the freshest seafood and culinary delights at this waterfront festival in Jeddah.', '2023-12-10 16:00:00', '2023-12-20 23:00:00', 40, 25000, false, false, 8, 1, 2, 7, 2, NOW(), NOW());

-- Event Images (using real image paths that should be placed in the public/Assets/events/ directory)
INSERT INTO event_images (id, event_id, path, created_at, updated_at) VALUES
-- SOUNDSTORM images
(1, 1, 'events/soundstorm1.jpg', NOW(), NOW()),
(2, 1, 'events/soundstorm2.jpg', NOW(), NOW()),
(3, 1, 'events/soundstorm3.jpg', NOW(), NOW()),

-- Mariah Carey Concert
(4, 2, 'events/mariah1.jpg', NOW(), NOW()),
(5, 2, 'events/mariah2.jpg', NOW(), NOW()),

-- Jeddah World Fest
(6, 3, 'events/jeddahfest1.jpg', NOW(), NOW()),
(7, 3, 'events/jeddahfest2.jpg', NOW(), NOW()),

-- LEAP Tech Conference
(8, 4, 'events/leap1.jpg', NOW(), NOW()),
(9, 4, 'events/leap2.jpg', NOW(), NOW()),

-- Future Investment Initiative
(10, 5, 'events/fii1.jpg', NOW(), NOW()),
(11, 5, 'events/fii2.jpg', NOW(), NOW()),

-- Formula 1
(12, 6, 'events/f1saudi1.jpg', NOW(), NOW()),
(13, 6, 'events/f1saudi2.jpg', NOW(), NOW()),
(14, 6, 'events/f1saudi3.jpg', NOW(), NOW()),

-- WWE Crown Jewel
(15, 7, 'events/wwe1.jpg', NOW(), NOW()),
(16, 7, 'events/wwe2.jpg', NOW(), NOW()),

-- Saudi Pro League
(17, 8, 'events/spl1.jpg', NOW(), NOW()),
(18, 8, 'events/spl2.jpg', NOW(), NOW()),

-- AlUla Moments
(19, 9, 'events/alula1.jpg', NOW(), NOW()),
(20, 9, 'events/alula2.jpg', NOW(), NOW()),
(21, 9, 'events/alula3.jpg', NOW(), NOW()),

-- Diriyah Art Biennale
(22, 10, 'events/artbiennale1.jpg', NOW(), NOW()),
(23, 10, 'events/artbiennale2.jpg', NOW(), NOW()),

-- Boulevard World
(24, 11, 'events/boulevardworld1.jpg', NOW(), NOW()),
(25, 11, 'events/boulevardworld2.jpg', NOW(), NOW()),
(26, 11, 'events/boulevardworld3.jpg', NOW(), NOW()),

-- Winter Wonderland
(27, 12, 'events/winterwonderland1.jpg', NOW(), NOW()),
(28, 12, 'events/winterwonderland2.jpg', NOW(), NOW()),

-- Cirque du Soleil
(29, 13, 'events/cirque1.jpg', NOW(), NOW()),
(30, 13, 'events/cirque2.jpg', NOW(), NOW()),

-- Saudi IoT Conference
(31, 14, 'events/iot1.jpg', NOW(), NOW()),
(32, 14, 'events/iot2.jpg', NOW(), NOW()),

-- AI Summit
(33, 15, 'events/ai1.jpg', NOW(), NOW()),
(34, 15, 'events/ai2.jpg', NOW(), NOW()),

-- Entrepreneurship Forum
(35, 16, 'events/entrepreneur1.jpg', NOW(), NOW()),
(36, 16, 'events/entrepreneur2.jpg', NOW(), NOW()),

-- Vision 2030 Conference
(37, 17, 'events/vision2030_1.jpg', NOW(), NOW()),
(38, 17, 'events/vision2030_2.jpg', NOW(), NOW()),

-- Riyadh Food Festival
(39, 18, 'events/foodfest1.jpg', NOW(), NOW()),
(40, 18, 'events/foodfest2.jpg', NOW(), NOW()),
(41, 18, 'events/foodfest3.jpg', NOW(), NOW()),

-- Saudi Coffee Festival
(42, 19, 'events/coffee1.jpg', NOW(), NOW()),
(43, 19, 'events/coffee2.jpg', NOW(), NOW()),

-- Jeddah Seafood Market
(44, 20, 'events/seafood1.jpg', NOW(), NOW()),
(45, 20, 'events/seafood2.jpg', NOW(), NOW());

-- Set the sequence values to continue from the last inserted IDs
SELECT setval('categories_id_seq', (SELECT MAX(id) FROM categories));
SELECT setval('countries_id_seq', (SELECT MAX(id) FROM countries));
SELECT setval('cities_id_seq', (SELECT MAX(id) FROM cities));
SELECT setval('districts_id_seq', (SELECT MAX(id) FROM districts));
SELECT setval('users_id_seq', (SELECT MAX(id) FROM users));
SELECT setval('events_id_seq', (SELECT MAX(id) FROM events));
SELECT setval('event_images_id_seq', (SELECT MAX(id) FROM event_images));
