<div id="pagination" class="pagination justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">

            <?php
                 
            ?>
            <?php
            if ($current_page > 3) {
                $first_page = 1;
            ?>
                <a class="page-link" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>

            <?php
            }
            if ($current_page > 1) {
                $prev_page = $current_page - 1;
            ?>
                <a class="page-link" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
            <?php }
            ?>

            <?php for ($num = 1; $num <= $totalPages; $num++) {  ?>
                <?php if ($num != $current_page) { ?>
                    <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                    
                        <a class="page-link" href="<?=$page?><?=$key."="?><?= $value ?>&page=<?= $num ?>"><?= $num ?></a>
                    
                    <?php }  ?>

                <?php } else { ?>
                    <strong class="current_page page-link"><?= $num ?></strong>
                <?php } ?>
            <?php } ?>
            <?php
            if ($current_page < $totalPages - 1) {
                $next_page = $current_page + 1; ?>
                <a class="page-link" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>

            <?php  }
            if ($current_page < $totalPages - 3) {
                $end_page = $totalPages;
            ?>
                <a class="page-link " href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>