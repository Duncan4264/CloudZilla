<?php
?>

<?php $__env->startSection('title', 'Time Clock'); ?>

<?php $__env->startSection('content'); ?>


<h3>Time Card Page.</h3>


<form action = "doclockin" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" />
<input type = "submit"  formaction="doclockin" value = "Clock In" /><form action = "doclockout" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" /><button type="submit" formaction="doclockout">Clock Out</button>
<?php if($errors->count() != 0): ?>
<h1>List of Errors</h1>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($message); ?> <br/>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>	
</form>
</form>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cloudmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>