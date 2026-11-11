-- Rentalin database for XAMPP / phpMyAdmin
-- Import this file into phpMyAdmin. Database will be created if privileges allow.
CREATE DATABASE IF NOT EXISTS rentalin CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rentalin;

CREATE TABLE IF NOT EXISTS users (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(30) NULL,
  email_verified_at TIMESTAMP NULL DEFAULT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','user') NOT NULL DEFAULT 'user',
  remember_token VARCHAR(100) NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY users_email_unique (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS vehicles (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  type ENUM('motor','mobil') NOT NULL,
  brand VARCHAR(255) NULL,
  plate_number VARCHAR(255) NOT NULL,
  description TEXT NULL,
  price_per_day DECIMAL(12,2) NOT NULL,
  image VARCHAR(255) NULL,
  status ENUM('available','maintenance') NOT NULL DEFAULT 'available',
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY vehicles_plate_number_unique (plate_number)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS bookings (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id BIGINT UNSIGNED NOT NULL,
  vehicle_id BIGINT UNSIGNED NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  total_days INT UNSIGNED NOT NULL,
  total_price DECIMAL(12,2) NOT NULL,
  payment_method ENUM('transfer','cash') NOT NULL,
  payment_status ENUM('unpaid','waiting_verification','paid','rejected') NOT NULL DEFAULT 'unpaid',
  status ENUM('pending','confirmed','ongoing','completed','cancelled') NOT NULL DEFAULT 'pending',
  notes TEXT NULL,
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  KEY bookings_vehicle_dates_index (vehicle_id,start_date,end_date),
  KEY bookings_user_id_index (user_id),
  CONSTRAINT bookings_user_id_foreign FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  CONSTRAINT bookings_vehicle_id_foreign FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Laravel migration repository: marks these matching migration files as already run.
CREATE TABLE IF NOT EXISTS migrations (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  migration VARCHAR(255) NOT NULL,
  batch INT NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO migrations (migration,batch)
SELECT '2026_11_11_000001_create_users_table',1 WHERE NOT EXISTS (SELECT 1 FROM migrations WHERE migration='2026_11_11_000001_create_users_table');
INSERT INTO migrations (migration,batch)
SELECT '2026_11_11_000002_create_vehicles_table',1 WHERE NOT EXISTS (SELECT 1 FROM migrations WHERE migration='2026_11_11_000002_create_vehicles_table');
INSERT INTO migrations (migration,batch)
SELECT '2026_11_11_000003_create_bookings_table',1 WHERE NOT EXISTS (SELECT 1 FROM migrations WHERE migration='2026_11_11_000003_create_bookings_table');

-- Sample vehicles; admin account is created by: php artisan db:seed
INSERT IGNORE INTO vehicles (name,type,brand,plate_number,description,price_per_day,status,created_at,updated_at) VALUES
('Honda Vario 160','motor','Honda','DK 1001 AA','Motor matic nyaman untuk perjalanan dalam kota.',120000,'available',NOW(),NOW()),
('Toyota Avanza','mobil','Toyota','DK 1002 AA','Mobil keluarga untuk perjalanan bersama.',450000,'available',NOW(),NOW());
