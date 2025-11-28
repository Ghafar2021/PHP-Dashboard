<?php
include "./include/layout/header.php";



if(isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])){
    $entity = $_GET['entity'];
    $action = $_GET['action'];
    $id = $_GET['id'];

    if($action == "delete"){
        switch($entity) {
            case "post":
            $query = $db->prepare('DELETE  FROM posts WHERE id = :id');
            break;
            case "comment":
            $query = $db->prepare('DELETE  FROM comments WHERE id = :id');
            break;
            case "category":
            $query = $db->prepare('DELETE  FROM categories WHERE id = :id');
            break;
    }
    } elseif($action == "pending") {
        $query = $db->prepare("UPDATE comments SET status = '1' WHERE id = :id");
    }
    $query->execute(['id' => $id]);
}

$posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 5");
$comments = $db->query("SELECT * FROM comments ORDER BY id DESC LIMIT 5");
$categories = $db->query("SELECT * FROM categories ORDER BY id DESC");


?>


<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Section --> 
        <?php
        include "./include/layout/sidebar.php"
        ?>

        <!-- Main Section -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">Dashboard</h1>
            </div>

            <!-- Recently Posts -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">Recent articles</h4>
                <?php if ($posts->rowCount() > 0) : ?>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post): ?>
                                    <tr>
                                        <th><?= $post['id'] ?></th>
                                        <td><?= $post['title'] ?></td>
                                        <td><?= $post['author'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-dark">Edit</a>
                                            <a  href="index.php?entity=post&action=delete&id=<?= $post['id'] ?>?>" class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php else : ?>;
                    <div class="col">
                        <div class="alert alert-danger">
                                    Do not find a document...
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <!-- Recently Comments -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">Recent comments</h4>
                <?php if ($comments->rowCount() > 0) : ?>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Comment text </th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($comments as $comment): ?>
                                    <tr>
                                        <th><?= $comment['id'] ?></th>
                                        <td> <?= $comment['name'] ?></td>
                                        <td><?= $comment['comment'] ?></td>
                                        <td>
                                            <?php if($comment['status']): ?>
                                            <button class="btn btn-sm btn-outline-dark disabled">approved</button>
                                            <?php else: ?>
                                            <a href="index.php?entity=comment&action=pending&id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-info ">Pending</a>
                                            <?php endif ?>

                                            <a   href="index.php?entity=comment&action=delete&id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <?php else : ?>;
                    <div class="col">
                        <div class="alert alert-danger">
                            Do not find a comment...
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <!-- Categories -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">Category</h4>
                <?php if ($categories->rowCount() > 0) : ?>
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>

                                    <tr>
                                        <th><?= $category['id'] ?></th>
                                        <td><?= $category['title'] ?></td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-dark">Edit</a>
                                            <a
                                                href="index.php?entity=category&action=delete&id=<?= $category['id'] ?>"
                                                class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="col">
                        <div class="alert alert-danger">
                            Do not find a category...
                        </div>
                    </div>

                <?php endif ?>
            </div>
        </main>
    </div>
</div>

<?php
include "./include/layout/footer.php";
?>