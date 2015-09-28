<?php
$a = 0;
$queryPager = $_GET;
unset($queryPager['pager']);
?>
<!-- Pagination -->
<div class="center">
    <ul class="pagination">
        <?php if($itemsCount/$config['items_per_page'] > 1) for($i=0; $i<$itemsCount/$config['items_per_page']; $i++) : ?>
            <li class="<?php $a++; if($a == $_GET['pager']) echo('active'); ?>"><a href="<?php $queryPager['pager'] = $i+1; echo('index.php?' . http_build_query($queryPager)) ?>"><?= htmlspecialchars($i+1) ?></a></li>
        <?php endfor ?>
    </ul><!-- /.pagination-->
</div><!-- /.center-->
<!-- end Pagination -->
