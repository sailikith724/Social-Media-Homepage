CREATE DATABASE IF NOT EXISTS socialnova;
USE socialnova;
CREATE TABLE IF NOT EXISTS posts (
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_name VARCHAR(100) DEFAULT 'Sai Likith',
   user_handle VARCHAR(100) DEFAULT '@sailikith',
   user_avatar VARCHAR(255) DEFAULT 'default_avatar.jpg',
   content TEXT NOT NULL,
   post_image VARCHAR(255) DEFAULT NULL,
   likes INT DEFAULT 0,
   comments INT DEFAULT 0,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Insert dummy data to match the screenshot's initial state
INSERT INTO posts (user_name, user_handle, content, post_image, likes, comments) VALUES
('Sai Likith', '@sailikith', 'Just finished working on my new PHP Social Media Project! Excited to share more updates soon. 😄', 'laptop_code.jpg', 120, 18),
('Priya Sharma','@priya_sharma', 'Enjoying the beautiful sunrise this morning ☀️', 'sunrise.jpg', 98, 12);
