<!-- Connection to our database -->
<?php
    include "includes/db.php";
?>

<!-- Header -->
<?php
    include "includes/header.php";
?>

<!-- Navigation -->
<?php
    include "includes/navigation.php";
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Our posts query -->
            <?php

                if (isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    $the_post_author = $_GET['author'];
                }
            /* ---------------------------------------------------------
            Connecting a query to our posts table
            --------------------------------------------------------- */
                $query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' ";

                $select_all_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_user'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
            ?>

                <!-- Dynamic data repeated from our while loop -->
                <h1 class="page-header">
                    All posts related to "<?php echo $post_author; ?>"
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"> <?php echo $post_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author; ?>&p_id=<?php echo $post_id; ?>"> <?php echo $post_author; ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?> </p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p> <?php echo $post_content; ?> </p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php
                }
            ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php
            include "includes/sidebar.php"
        ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php
        include "includes/footer.php";
    ?>
