<?php $__env->startSection('title', 'Login Page'); ?>

<?php $__env->startSection('content'); ?>
<form action = "doregister" method="POST">
<input type="hidden" name = "_token" value = "<?php echo csrf_token()?>" />
<h2>Register Page</h2>
<table>
<tr>
<td>First Name: </td>
<td><input type = "text" name = "firstname" /><?php echo e($errors->first('password')); ?></td>
</tr>
<tr>
<td>Last Name: </td>
<td><input type = "text" name = "lastname" /><?php echo e($errors->first('password')); ?></td>
</tr>
<tr>
<td>User Name: </td>
<td><input type = "text" name = "username" /><?php echo e($errors->first('username')); ?></td>
</tr>
<tr>
<td>Password: </td>
<td><input type = "password" name = "password" /><?php echo e($errors->first('password')); ?></td>
</tr>
<tr>
<td>Email: </td>
<td><input type = "email" name = "email" /><?php echo e($errors->first('password')); ?></td>
</tr>
<tr>
<td colspan = "2" align = "center">
<input type = "submit" value = "Register" />
<?php if($errors->count() != 0): ?>
<h1>List of Errors</h1>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php echo e($message); ?> <br/>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>	
</td>
</tr>
</table>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.cloudmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>