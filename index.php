<?php

include "db.php";

if(isset($_POST['post']))
{
    $content=$_POST['content'];

    mysqli_query($conn,
    "INSERT INTO posts(user_id,content)
    VALUES(1,'$content')");
}

if(isset($_GET['like']))
{
    $id=$_GET['like'];

    mysqli_query($conn,
    "UPDATE posts
    SET likes=likes+1
    WHERE id=$id");

    header("Location:index.php");
}

$posts=mysqli_query($conn,
"SELECT posts.*,users.name,users.username
FROM posts
JOIN users
ON posts.user_id=users.id
ORDER BY posts.id DESC");

?>

<!DOCTYPE html>

<html>

<head>

<title>Social Media Homepage</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="layout">

    <!-- Sidebar -->

    <aside class="sidebar">

        <h2 class="brand">
            Social<span>Nova</span>
        </h2>

        <a class="nav active">🏠 Home</a>
        <a class="nav">🔥 Explore</a>
        <a class="nav">💬 Messages</a>
        <a class="nav">🔔 Notifications</a>
        <a class="nav">👤 Profile</a>
        <a class="nav">⚙️ Settings</a>

        <button class="post-btn">
            Create Post
        </button>

    </aside>

    <!-- Main Content -->

    <main class="main">

        <div class="hero">

            <p class="tag">
                Premium Social Platform
            </p>

            <h1>
                Connect With Friends & Share Moments
            </h1>

            <p class="hero-text">
                A modern social media homepage built using
                PHP and MySQL with posts, likes, comments,
                trending topics and responsive design.
            </p>

        </div>

        <!-- Stories -->

        <section class="stories">

            <div class="story add">+</div>

            <div class="story">
                <img src="images/user1.jpg">
                <p>Arjun</p>
            </div>

            <div class="story">
                <img src="images/user2.jpg">
                <p>Rahul</p>
            </div>

            <div class="story">
                <img src="images/user3.jpg">
                <p>Priya</p>
            </div>

            <div class="story">
                <img src="images/user4.jpg">
                <p>Ananya</p>
            </div>

        </section>

        <!-- Create Post -->

        <section class="create-box">

            <form method="POST">

                <textarea
                name="content"
                placeholder="What's on your mind?"
                required></textarea>

                <input
                type="text"
                name="image_url"
                placeholder="Image URL (optional)">

                <button
                type="submit"
                name="post">
                Publish Post
                </button>

            </form>

        </section>

        <!-- Posts -->

        <?php while($post=mysqli_fetch_assoc($posts)){ ?>

        <div class="post">

            <div class="post-head">

                <img src="images/user1.jpg">

                <div>

                    <h3>
                        <?php echo $post['name']; ?>
                    </h3>

                    <p>
                        <?php echo $post['username']; ?>
                    </p>

                </div>

                <span class="more">•••</span>

            </div>

            <p class="content">
                <?php echo $post['content']; ?>
            </p>

            <?php
            if(!empty($post['image_url']))
            {
            ?>

            <img
            class="post-img"
            src="<?php echo $post['image_url']; ?>">

            <?php
            }
            ?>

            <div class="actions">

                <a href="?like=<?php echo $post['id']; ?>">
                    ❤️ Like
                    (<?php echo $post['likes']; ?>)
                </a>

                <span>💬 Comment</span>

                <span>📤 Share</span>

            </div>

        </div>

        <?php } ?>

    </main>

    <!-- Right Sidebar -->

    <aside class="rightbar">

        <div class="profile">

            <img src="images/profile.jpg">

            <h3>Sai Likith</h3>

            <p>@sailikith</p>

            <button>
                View Profile
            </button>

        </div>

        <div class="widget">

            <h3>Trending Topics</h3>

            <p>#PHP</p>

            <p>#MySQL</p>

            <p>#WebDevelopment</p>

            <p>#SocialMedia</p>

        </div>

        <div class="widget">

            <h3>Suggested Friends</h3>

            <p>👤 Kiran Kumar</p>

            <p>👤 Akhil Raj</p>

            <p>👤 Meera</p>

        </div>

    </aside>

</div>

</body>

</html>