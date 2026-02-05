-- =========================================
-- CREACIÓ BASE DE DADES
-- =========================================

CREATE DATABASE IF NOT EXISTS projecte1
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE projecte;

-- =========================================
-- TAULA D’USUARIS
-- =========================================

-- CREATE TABLE usuaris (
    --id INT AUTO_INCREMENT PRIMARY KEY,
   -- nom_usuari VARCHAR(50) NOT NULL UNIQUE,
    --email VARCHAR(100) UNIQUE,
    --password_hash VARCHAR(255) NOT NULL,
    --data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
--);

-- =========================================
-- TAULA TEMPERATURA
-- =========================================

CREATE TABLE temperatura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(5,2) NOT NULL,      -- ºC
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_temp_data (data_registre)
);

-- =========================================
-- TAULA HUMITAT
-- =========================================

CREATE TABLE humitat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(5,2) NOT NULL,      -- %
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_hum_data (data_registre)
);

-- =========================================
-- TAULA PRESSIÓ ATMOSFÈRICA
-- =========================================

CREATE TABLE pressio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(7,2) NOT NULL,      -- hPa
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_pres_data (data_registre)
);

-- =========================================
-- TAULA VELOCITAT DEL VENT
-- =========================================

CREATE TABLE vent (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(5,2) NOT NULL,      -- km/h o m/s
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_vent_data (data_registre)
);

-- =========================================
-- TAULA PRECIPITACIÓ
-- =========================================

CREATE TABLE precipitacio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    valor DECIMAL(6,2) NOT NULL,      -- mm
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_prec_data (data_registre)
);

-- =========================================
-- TAULA FAVORITS
-- =========================================

CREATE TABLE preferits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuari_id INT NOT NULL,
    data DATE NOT NULL,
    data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uniq_favorit (usuari_id, data),
    FOREIGN KEY (usuari_id) REFERENCES usuaris(id) ON DELETE CASCADE
);

CREATE TABLE estacio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    utmx INT NOT NULL,
    utmy INT NOT NULL
);

INSERT INTO estacio (nom, utmx, utmy)
VALUES ('Estació principal', 430123, 4589123);

-- =========================================
-- FI DE L’SCRIPT
-- =========================================