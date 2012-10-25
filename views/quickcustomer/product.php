<li class="product">
    <h3><?php echo $product->name ?></h3>
    <p><?php echo $product->description ?></p>
    <?php echo Form::input("produits[$product->id][quantity]", $product->quantity) ?>
    <?php echo Form::checkbox("produits[$product->id][selected]", $product->id, Auth::instance()->get_user()->order->has("products", $product)) ?>
</li>
