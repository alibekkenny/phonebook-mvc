CREATE TABLE users (
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       name VARCHAR(50),
                       email VARCHAR(50),
                       password VARCHAR(50)
);

CREATE TABLE users_phone_book (
                                  id INT PRIMARY KEY AUTO_INCREMENT,
                                  name VARCHAR(50),
                                  description TEXT,
                                  user_id INT REFERENCES users(id)
);

CREATE TABLE users_phones (
                              id INT PRIMARY KEY AUTO_INCREMENT,
                              name VARCHAR(50),
                              phone VARCHAR(12),
                              phone_book_id INT REFERENCES users_phone_book(id)
);