<form method="<?php echo $config["struct"]["method"] ?>" action="<?php echo $config["struct"]["action"] ?>">

    <?php foreach($config["data"] as $name => $attributes): ?>

        <?php if($attributes["type"] == "email" || $attributes["type"] == "text" || $attributes["type"] == "password") :?>
            <?php if (isset($attributes["label"])): ?>
                <label for="<?php echo $name?>"><?php echo $attributes['label'] ?></label>
            <?php endif; ?>
                <input class="<?php echo isset($attributes["class"])?$attributes["class"]:''?>" type="<?php echo $attributes["type"];?>" name="<?php echo $name;?>" placeholder="<?php echo $attributes["placeholder"];?>" <?php echo (isset($attributes["required"]))?"required='required'":"";?> autocomplete="off">
        <?php endif; ?>

    <?php endforeach; ?>
    <input class="<?php echo isset($config["struct"]["class"])?$config["struct"]["class"]:''?>"  type="submit" value="<?=$config["struct"]["submit"];?>"">
</form>