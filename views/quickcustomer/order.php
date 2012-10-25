<?php
// We show all the products related to the event and the user may choose which product he is interested in.
?>

<ul id="products">
    <?php foreach (Auth::instance()->get_user()->event->products->find_all() as $product) : ?>
        <?php echo View::factory("quickcustomer/product", array("product" => $product)) ?>

    <?php endforeach; ?>
</ul>
