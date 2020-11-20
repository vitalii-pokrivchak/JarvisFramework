<?php if (isset($book)) : ?>

    <div class="container mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $book->get_title() ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $author->get_fio() ?></h6>
                <p class="card-text"><?= $book->get_preview_text() ?></p>
            </div>
        </div>
    </div>
<?php else : ?>
    <p class="text-center">Book Not Found</p>
<?php endif; ?>