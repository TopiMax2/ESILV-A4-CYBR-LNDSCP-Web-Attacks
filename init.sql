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
