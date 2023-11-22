-- initializes basic database for SQLI
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('admin', 'admin');

-- Simple database for IDOR
CREATE TABLE members (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    info TEXT
);

INSERT INTO members (id, username, password, info) VALUES (01, 'admin', 'admin', 'This is the admin session, special super secret flag : S3cr3t_M3mb3r_p4g3_15_53cr3t');
INSERT INTO members (id, username, password, info) VALUES (02, 'user1', 'user1', 'Your secret informations will appear here !');

-- Simple database for CSRF
CREATE TABLE bank_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    balance DECIMAL(10,2) DEFAULT 0.00
);

-- Inserting users into the 'bank_users' table
INSERT INTO bank_users (username, password, balance) VALUES ('alice', 'password123', 1000.00);
INSERT INTO bank_users (username, password, balance) VALUES ('jack', 'securepass', 750.50);
INSERT INTO bank_users (username, password, balance) VALUES ('daniel', 'pass1234', 1200.75);
INSERT INTO bank_users (username, password, balance) VALUES ('evil_user', 'evilpass', 500.00);