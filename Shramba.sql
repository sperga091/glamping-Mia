CREATE DATABASE IF NOT EXISTS glamping_mia;
USE glamping_mia;

CREATE TABLE IF NOT EXISTS podatki (
    ID INT AUTO_INCREMENT PRIMARY KEY,         
    Ime VARCHAR(20) NOT NULL,                 
    Priimek VARCHAR(20) NOT NULL,
    Naslov VARCHAR(100) NOT NULL,
    Postna_stevilka INT(4) NOT NULL,               
    email VARCHAR(50) NOT NULL UNIQUE,
    telefon VARCHAR(15) NOT NULL,                            
    od_dan DATE NOT NULL,                        
    do_dan DATE NOT NULL           
) CHARSET = utf8mb4;