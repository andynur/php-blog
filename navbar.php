<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">CND Blog</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= empty($_GET['page']) ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item <?= strpos($_GET['page'], 'posts') !== false ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php?page=posts/index">Posts</a>
            </li>
            <li class="nav-item <?= strpos($_GET['page'], 'categories') !== false ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php?page=categories/index">Categories</a>
            </li>
            <li class="nav-item <?= strpos($_GET['page'], 'authors') !== false ? 'active' : ''; ?>">
                <a class="nav-link" href="index.php?page=authors/index">Authors</a>
            </li>
        </ul>
    </div>
</nav>