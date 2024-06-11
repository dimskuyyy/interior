<div class="row">
    <div class="col-lg-12" aria-label="<?= lang('Pager.pageNavigation') ?>">
        <div class="blog__pagination">
            <?php if ($pager->hasPreviousPage()) : ?>
                <a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            <?php endif ?>
            <?php foreach ($pager->links() as $link) : ?>
                <a href="<?= $link['uri'] ?>" <?= $link['active'] ? 'class="active"' : '' ?>>
                    <?= $link['title'] ?>
                </a>
            <?php endforeach ?>
            <?php if ($pager->hasNextPage()) : ?>
                <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>"><i class="fa fa-angle-double-right"></i>
                </a>
            <?php endif ?>
        </div>
    </div>
</div>