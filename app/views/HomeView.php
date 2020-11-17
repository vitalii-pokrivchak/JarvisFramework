<div class="container w-100 h-100 d-flex justify-content-center align-items-center">
    <div class="row p-0 m-0">
        <?php foreach ($all_books as $book) : ?>

            <div class="col-sm m-3">
                <div class="card p-3 shadow-sm" style="width: 18rem;border-radius: 20px !important;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book->get_title(); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $all_authors[$book->get_author_id()]->get_fio() ?></h6>
                        <p class="card-text"><?= $book->get_preview_text() ?></p>
                        <p class="text-muted"><?= $book->get_price() ?></p>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>