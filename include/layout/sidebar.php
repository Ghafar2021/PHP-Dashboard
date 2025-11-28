<?php
$query = "SELECT * FROM categories";
$categories = $db->query($query);
?>

<!-- Sidebar Section -->
<div class="col-lg-4">
    <!-- Search Section -->
    <div class="card">
        <div class="card-body">
            <p class="fw-bold fs-6"> Search the blog</p>
            <form action="search.php" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="search ..." />
                    <button class="btn btn-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="card mt-4">
        <div class="fw-bold fs-6 card-header">Categories</div>
        <ul class="list-group list-group-flush p-0">
            <?php if ($categories->rowCount() > 0) : ?>
                <?php foreach ($categories as $category) : ?>
                    <li class="list-group-item">
                        <a class="link-body-emphasis text-decoration-none" href="index.php?category=<?= $category['id'] ?>"><?= $category['title'] ?></a>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
    </div>

    <!-- Subscribers Section -->
    <div class="card mt-4">
        <div class="card-body">
            <p class="fw-bold fs-6">Subscribe newsletter</p>

            <?php
            $invalidInputName = '';
            $invalidInputEmail = '';
            $message = '';

            if (isset($_POST['subscribe'])) {
                if (empty(trim($_POST['name']))) {
                    $invalidInputName = 'Name-Field is Necessary!';
                } elseif (empty(trim($_POST['email']))) {
                    $invalidInputEmail = 'Email-Field is Necessary!';
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    $subscribeInsert = $db->prepare("INSERT INTO subscribers (name, email) VALUES (:name, :email)");
                    $subscribeInsert->execute(['name' => $name, 'email' => $email]);

                    $message = "Yor are successfully registered!";
                }
            }

            ?>

            <div class="text-success"><?= $message ?></div>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" />
                    <div class="form-text text-danger"><?= $invalidInputName ?></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control" />
                    <div class="form-text text-danger"><?= $invalidInputEmail ?></div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="subscribe" class="btn btn-secondary">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- About Section -->
    <div class="card mt-4">
        <div class="card-body">
            <p class="fw-bold fs-6"> About Us</p>
            <p class="text-justify">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard.
                when an unknown printer took a galley of type and scrambled it to make
                a type specimen book.
            </p>
        </div>
    </div>
</div>