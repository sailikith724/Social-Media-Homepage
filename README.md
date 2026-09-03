# SocialNova - Social Media Homepage

A modern **Social Media Homepage** developed using **PHP, MySQL, HTML, and CSS**.

SocialNova provides a social-media-style interface where users can create posts, view posts from other users, like posts, browse stories, view trending topics, and see suggested friends.

## 📌 Project Overview

The **SocialNova Social Media Homepage** demonstrates the basic functionality and user interface of a social networking platform.

The application contains:

* Left navigation sidebar
* Hero section
* Stories section
* Create Post form
* Social media feed
* Like functionality
* User profile section
* Trending topics
* Suggested friends
* Responsive layout

## ✨ Features

* Create and publish posts
* Store posts in MySQL
* Display latest posts first
* Like posts
* Display like count
* Optional image URL field
* Display post images when available
* User name and username display
* Stories section
* Profile card
* Trending topics
* Suggested friends
* Explore, Messages and Notifications UI
* Responsive design
* Mobile-friendly layout

## 🛠️ Technologies Used

* **PHP** – Backend processing
* **MySQL** – Database management
* **MySQLi** – PHP database connectivity
* **HTML5** – Page structure
* **CSS3** – Interface design
* **XAMPP** – Apache and MySQL local server

## 📂 Project Structure

```text
social_media_homepage/
│
├── index.php
├── db.php
├── style.css
│
└── images/
    ├── profile.jpg
    ├── user1.jpg
    ├── user2.jpg
    ├── user3.jpg
    └── user4.jpg
```

## 📄 Main Files

### `index.php`

The main page of the SocialNova application.

It handles:

* Creating posts
* Retrieving posts
* Increasing likes
* Displaying the social feed
* Stories
* Navigation
* User profile
* Trending topics
* Suggested friends

### `db.php`

Creates the connection between PHP and MySQL.

```php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "social_media_homepage"
);

if (!$conn) {
    die("Connection Failed");
}
```

### `style.css`

Contains the complete design of the SocialNova interface.

It styles:

* Three-column layout
* Navigation sidebar
* SocialNova logo
* Hero section
* Stories
* Create Post form
* Post cards
* Profile pictures
* Post images
* Like/Comment/Share actions
* Right sidebar
* Profile card
* Trending topics
* Suggested friends
* Responsive mobile layout

## 🗄️ Database Setup

Create the database:

```sql
CREATE DATABASE social_media_homepage;
```

Select it:

```sql
USE social_media_homepage;
```

## 👤 Users Table

Create a table for users:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL UNIQUE
);
```

Add a sample user:

```sql
INSERT INTO users (name, username)
VALUES ('Sai Likith', '@sailikith');
```

## 📝 Posts Table

Create the `posts` table:

```sql
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    image_url VARCHAR(500) DEFAULT NULL,
    likes INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

## ➕ Create Post

Users can enter their post content using:

```text
What's on your mind?
```

An optional image URL can also be entered.

The post form contains:

```html
<textarea
    name="content"
    placeholder="What's on your mind?"
    required>
</textarea>

<input
    type="text"
    name="image_url"
    placeholder="Image URL (optional)">
```

The **Publish Post** button submits the form.

## 💾 Saving Posts

The PHP code inserts a post into MySQL using:

```php
if (isset($_POST['post'])) {

    $content = $_POST['content'];

    mysqli_query(
        $conn,
        "INSERT INTO posts(user_id,content)
         VALUES(1,'$content')"
    );
}
```

The current application assigns new posts to:

```text
User ID = 1
```

## ❤️ Like Functionality

Users can like a post by clicking:

```text
❤️ Like
```

The application increases the like count using:

```sql
UPDATE posts
SET likes = likes + 1
WHERE id = POST_ID;
```

The updated like count is displayed beside the Like button.

Example:

```text
❤️ Like (5)
```

## 📰 Social Feed

Posts are retrieved using a join between the `posts` and `users` tables:

```sql
SELECT posts.*, users.name, users.username
FROM posts
JOIN users
ON posts.user_id = users.id
ORDER BY posts.id DESC;
```

This allows every post to display:

* User's name
* Username
* Post content
* Post image
* Like count

The latest posts are displayed first.

## 🖼️ Post Images

If a post contains an `image_url`, the application displays the image:

```php
if (!empty($post['image_url'])) {
```

The image is displayed using the `post-img` CSS class.

## 📖 Stories

The homepage contains a Stories section.

Current story users include:

```text
+ Add Story
Arjun
Rahul
Priya
Ananya
```

Story profile pictures are loaded from the `images` folder.

## 🧭 Navigation Menu

The left sidebar contains:

```text
🏠 Home
🔥 Explore
💬 Messages
🔔 Notifications
👤 Profile
⚙️ Settings
```

It also contains:

```text
Create Post
```

## 👤 Profile Section

The right sidebar displays a profile card containing:

```text
Sai Likith
@sailikith
```

with a:

```text
View Profile
```

button.

## 🔥 Trending Topics

The homepage displays:

```text
#PHP
#MySQL
#WebDevelopment
#SocialMedia
```

## 👥 Suggested Friends

The Suggested Friends section contains:

```text
Kiran Kumar
Akhil Raj
Meera
```

## 💬 Post Actions

Every post displays three social actions:

```text
❤️ Like
💬 Comment
📤 Share
```

The **Like** action is connected to PHP/MySQL.

The **Comment** and **Share** options are currently interface elements and do not have backend functionality in the provided `index.php`.

## 📱 Responsive Design

The application uses CSS media queries.

For screens below `1000px`, the right sidebar is hidden.

```css
@media(max-width:1000px) {
    .layout {
        grid-template-columns:220px 1fr;
    }

    .rightbar {
        display:none;
    }
}
```

For screens below `768px`, the website changes to a single-column layout.

```css
@media(max-width:768px) {
    .layout {
        grid-template-columns:1fr;
    }

    .sidebar {
        position:static;
    }

    .comment-form {
        flex-direction:column;
    }

    .hero h1 {
        font-size:24px;
    }
}
```

## ⚙️ Installation

### Step 1: Install XAMPP

Install **XAMPP** with:

* Apache
* MySQL
* PHP

### Step 2: Create Project Folder

Copy the project into:

```text
xampp/htdocs/social_media_homepage/
```

### Step 3: Add Project Files

The folder should contain:

```text
index.php
db.php
style.css
images/
```

### Step 4: Start XAMPP

Start:

```text
Apache
MySQL
```

### Step 5: Create Database

Open **phpMyAdmin** and create:

```text
social_media_homepage
```

Create the `users` and `posts` tables using the SQL provided above.

### Step 6: Check Database Connection

Make sure `db.php` uses:

```php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "social_media_homepage"
);
```

### Step 7: Run the Project

Open:

```text
http://localhost/social_media_homepage/
```

## 🔄 Application Workflow

```text
Open SocialNova
       ↓
Connect to MySQL
       ↓
Load User Posts
       ↓
Display Social Feed
       ↓
 ┌─────────────┬─────────────┐
 ↓             ↓             ↓
Create Post   Like Post    View Feed
 ↓             ↓
Save Post    Increase Likes
 ↓             ↓
 └──────→ MySQL Database
              ↓
       Refresh Social Feed
```

## 📊 Database Relationship

The project uses a relationship between users and posts:

```text
USERS
  │
  │ 1
  │
  │ Many
  ↓
POSTS
```

The relationship is:

```text
users.id
   ↓
posts.user_id
```

One user can therefore have multiple posts.

## 🎨 User Interface

The website uses a three-column desktop layout:

```text
┌──────────────┬──────────────────────────┬──────────────────┐
│              │                          │                  │
│ Navigation   │       Main Feed          │     Profile      │
│              │                          │                  │
│ Home         │ Hero                     │ User Profile     │
│ Explore      │ Stories                  │                  │
│ Messages     │ Create Post              │ Trending Topics  │
│ Notification │ Posts                    │                  │
│ Profile      │                          │ Suggested Friends│
│ Settings     │                          │                  │
│              │                          │                  │
└──────────────┴──────────────────────────┴──────────────────┘
```

## 🔐 Security Improvements

For a production application, the PHP code should be improved by:

* Using prepared statements
* Escaping output using `htmlspecialchars()`
* Validating post content
* Validating image URLs
* Adding user authentication
* Adding CSRF protection
* Preventing users from repeatedly liking the same post

## 🚀 Future Enhancements

The project can be expanded with:

* User registration
* User login/logout
* User profiles
* Profile editing
* Profile picture uploads
* Follow/unfollow system
* Functional stories
* Image uploads
* Comments
* Replies
* Share functionality
* Post editing
* Post deletion
* Notifications
* Private messages
* Search
* Hashtags
* Saved posts
* Dark mode
* Admin dashboard

## 🎯 Project Objective

The objective of this project is to develop a basic **Social Media Homepage using PHP and MySQL**.

The project demonstrates:

* PHP and MySQL integration
* Database relationships
* Creating posts
* Retrieving posts
* Like functionality
* Dynamic social feed
* HTML forms
* CSS Grid
* Responsive web design
* Social media user-interface development

## 👨‍💻 Project Type

**PHP & MySQL Social Media Mini Project**

## 📜 License

This project is created for **educational and academic purposes**.
