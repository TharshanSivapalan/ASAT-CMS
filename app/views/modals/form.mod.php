<form method="<?php echo $config["struct"]["method"] ?>" action="<?php echo $config["struct"]["action"] ?>">

    <?php foreach($config["data"] as $name => $attributes): ?>
        
        <?php if($attributes["type"] == "email" || $attributes["type"] == "text" || $attributes["type"] == "password") :?>
            <?php if (isset($attributes["label"])): ?>
                <label for="<?php echo $name?>"><?php echo $attributes['label'] ?></label>
            <?php endif; ?>
                <input class="<?php echo isset($attributes["class"])?$attributes["class"]:''?>" type="<?php echo $attributes["type"];?>" name="<?php echo $name;?>" placeholder="<?php echo $attributes["placeholder"];?>" <?php echo (isset($attributes["required"]))?"required='required'":"";?> maxlength="<?php echo isset($attributes["maxlength"])?$attributes["maxlength"]:''?>" minlength="<?php echo isset($attributes["minlength"])?$attributes["minlength"]:''?>">
        <?php endif; ?>

        <?php if($attributes["type"] == "select") : ?>
            <?php if (isset($attributes["fields"])): ?>
                <select name="<?php echo $name ?>" id="" class="<?php echo isset($attributes["class"])?$attributes["class"]:''?>">
                    <?php foreach ($attributes["fields"] as $value => $label): ?>
                        <option value="<?php echo $value ?>"><?php echo $label ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
        <?php endif; ?>

    <?php endforeach; ?>
    <input class="<?php echo isset($config["struct"]["class"])?$config["struct"]["class"]:''?>"  type="submit" value="<?=$config["struct"]["submit"];?>"">
</form>