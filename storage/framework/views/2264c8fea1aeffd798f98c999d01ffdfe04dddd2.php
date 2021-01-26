<html lang = "en">
<head><?php echo $__env->yieldContent('title'); ?></head>
<body>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div align="center">
     <?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>