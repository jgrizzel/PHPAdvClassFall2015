<?php if (isset($message) && count($message)) : ?>
    <?php foreach ($message as $value): ?>
        <p class="bg-success"><?php echo $value; ?></p>
    <?php endforeach; ?>
<?php endif; ?>
