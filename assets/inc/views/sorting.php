<?php
if( isset($_POST['sorting']) ){
    $includePath = '';
    include_once('connect_db.php');
    $sorting = Db::queryAll('SELECT sorting_option, sorting_option_title FROM sorting_options_table');
    $querySorting = $_GET;
    $querySorting['sort_by'] = $_POST['sorting'];
    header('Location: index.php?'.http_build_query($querySorting));
}
else {
    $sorting = Db::queryAll('SELECT sorting_option, sorting_option_title FROM sorting_options_table');
}

?>
<form role="form" id="form-sorting" method="post" action="">
    <div class="form-group">
        <select name="sorting" id="item-sorting">
            <?php for($i=0; $i<count($sorting); $i++) : ?>
                <?php if(isset($_GET['sort_by'])) : ?>
                    <?php if($_GET['sort_by'] == $sorting[$i]['sorting_option']) : ?>
                        <option value="<?= $sorting[$i]['sorting_option'] ?>"> <?= $sorting[$i]['sorting_option_title'] ?> </option>
                        <?php for($a=0; $a<count($sorting); $a++) : ?>
                            <?php if($_GET['sort_by'] != $sorting[$a]['sorting_option']) : ?>
                                <option value="<?= $sorting[$a]['sorting_option'] ?>"> <?= $sorting[$a]['sorting_option_title'] ?> </option>
                            <?php endif ?>
                        <?php endfor ?>
                    <?php endif ?>
                <?php else : ?>
                    <?php if( $sorting[$i]['sorting_option'] == 'date_newest_first') : ?>
                        <option value="<?= $sorting[$i]['sorting_option'] ?>"> <?= $sorting[$i]['sorting_option_title'] ?> </option>
                        <?php for($a=0; $a<count($sorting); $a++) : ?>
                            <?php if($sorting[$a]['sorting_option'] != 'date_newest_first') : ?>
                                <option value="<?= $sorting[$a]['sorting_option'] ?>"> <?= $sorting[$a]['sorting_option_title'] ?> </option>
                            <?php endif ?>
                        <?php endfor ?>
                    <?php endif ?>
                <?php endif ?>
            <?php endfor ?>
        </select>
    </div><!-- /.form-group -->
</form>