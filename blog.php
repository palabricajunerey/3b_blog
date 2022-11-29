<?php
$pwede = true;
$blog = true;
include 'header.php';

if(!isset($_SESSION['logged_in'])){
    header("location: login.php");
}

//send data to posts table
if (isset($_POST['create_post'])) {
    $u_id = $_SESSION['user_id'];
    $title = $_POST['title_data']; //input type text
    $content = $_POST['Content_data']; //textarea

    //inserting data to database table posts
    $insert = $conn->prepare("INSERT INTO blogs (blog_title, blog_content, user_id) VALUES (?, ?, ?)");

    $insert->execute([
        //binding
        $title,
        $content,
        $u_id
    ]);

    $msg = "Post Created!";

    // echo '
    //     <script>
    //         alert("Post Created!");
    //     </script>    
    // ';
}


//for update
if (isset($_POST['update_post'])) {
    $id = $_POST['post_id'];
    $title = $_POST['title_update'];
    $content = $_POST['Content_update'];

    $update = $conn->prepare("UPDATE blogs SET blog_title = ?, blog_content = ? WHERE blog_id = ?");

    $update->execute([
        $title,
        $content,
        $id
    ]);

    $msg = "Post Updated!";
}

//delete a post
if(isset($_GET['delete_post'])){
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM blogs WHERE blog_id = ?");

    $delete->execute([
        $id
    ]);

    $msg = "Post Deleted!";
}
?>
<!-- content start -->
<div class="container">
    <div class="row">
        <div class="col-4 shadow mt-4">
            <?php
            if (isset($_GET['edit_post'])) { ?>
                <form method="POST" action="blog.php">
                    <?php
                    $id_update = $_GET['id'];
                    $updates = $conn->query("SELECT * FROM blogs WHERE blog_id = $id_update");

                    foreach ($updates as $update) { ?>
                    <input type="hidden" name="post_id" value="<?= $update['blog_id']?>">
                        <div class="mb-3">
                            <label for="Title" class="form-label">Your Post Title</label>
                            <input type="text" name="title_update" class="form-control" id="Title" placeholder="Required Title" value="<?= $update['blog_title'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Content" class="form-label">Your Post Content</label>
                            <textarea class="form-control" name="Content_update" id="Content" placeholder="Required Content"><?= $update['blog_content'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <a href="blog.php"><button class="btn btn-secondary">Cancel</button></a>
                            <button class="btn btn-success" name="update_post">Update Post</button>
                        </div>
                </form>
            <?php   }   ?>

        <?php   } else { ?>
            <?php
                if (isset($msg)) {
                    echo '
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>' . $msg . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>                
                ';
                }
            ?>
            <form method="POST" action="blog.php">
                <div class="mb-3">
                    <label for="Title" class="form-label">Your Post Title</label>
                    <input type="text" name="title_data" class="form-control" id="Title" placeholder="Required Title" required>
                </div>
                <div class="mb-3">
                    <label for="Content" class="form-label">Your Post Content</label>
                    <textarea class="form-control" name="Content_data" id="Content" placeholder="Required Content" required></textarea>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" name="create_post">Create Post</button>
                </div>
            </form>
        <?php  } ?>
        </div>
        <div class="col m-3">
            <table class="table">
                <tr>
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </thead>
                </tr>
                <?php
                $counter = 1;
                $u_id = $_SESSION['user_id'];
                $rows = $conn->prepare("SELECT * FROM blogs WHERE user_id = ?");
                $rows->execute([$u_id]);
                foreach ($rows as $value) { ?>

                    <tbody>
                        <tr>
                            <td><?= $counter++ ?></td>
                            <td><?= $value['blog_title'] ?></td>
                            <td><?= $value['blog_content'] ?></td>
                            <td><a href="blog.php?edit_post&id=<?= $value['blog_id'] ?>"class="text-decoration-none">✏</a> | <a href="blog.php?delete_post&id=<?= $value['blog_id'] ?>" class="text-decoration-none">❌</a></td>
                        </tr>
                    </tbody>

                <?php  } ?>

            </table>
        </div>
    </div>
</div>
<!-- content end -->
<script>
    document.title = "Blog";
</script>
</body>

</html>