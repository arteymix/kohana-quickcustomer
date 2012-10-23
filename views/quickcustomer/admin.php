<h3>Spécifications</h3>

<ul id="specifications">
    <?php foreach (ORM::factory("specification")->find_all() as $specification) : ?>
        <li class="specification">
            <?php echo Form::input("specifications[$specification->id][name]", $specification->name) ?>
            <?php echo Form::input("specifications[$specification->id][description]", $specification->description) ?>
            <?php echo Form::input("specifications[$specification->id][price]", $specification->price) ?>        
        </li>
    <?php endforeach; ?>
    <li><?php echo Form::button("add", "Ajouter") ?></li>
</ul>

<h3>Disponibilités</h3>

<ul id="disponibilites">
    <?php foreach (ORM::factory("disponibility")->find_all() as $disponibility) : ?>
        <li class="disponibility">
            <?php echo Form::input("disponibilities[$disponibility->id][name]", $disponibility->name) ?>
            <?php echo Form::input("disponibilities[$disponibility->id][description]", $disponibility->description) ?>
        </li>
    <?php endforeach; ?>
    <li><?php echo Form::button("add", "Ajouter") ?></li>
</ul>

