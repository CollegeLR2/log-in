<!-- displays each post in its own card -->
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
    <div class="card text-bg-dark mb-3 mx-auto">
    <div class="card-body">
        <p class="card-title"><?= $row["user"] ?></p>
        <h4 class="card-text"><?= $row["post"] ?></h4>
    </div>
    </div>
<?php endwhile; ?>
