

<?php $__env->startSection('content'); ?>

	
	<div class="text-center">
		<img class="auth-logo" src="<?php echo e(asset('backend/assets/images/logo.png')); ?>" alt="logo.png">
	</div>
	<div>			
		<div class="container mt-5 pt-5">
			<div class="alert alert-danger text-center">
				<h2 class="display-3">404</h2>
				<p class="display-5">Page not found!</p>
			</div>
		</div>
		<div class="col-md-12">
			<a href="<?php echo e(url('/')); ?>">
				<button type="button" class="btn-hover color-9 m-b-20"><span class="ti-angle-left"></span> <?php echo e(__('Go to Home')); ?></button>
			</a>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SpearlineTest\resources\views/errors/404.blade.php ENDPATH**/ ?>