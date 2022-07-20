<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
	<title><?php if(!empty($page_title)): ?> <?php echo e(config('app.name', 'SixPac')); ?> - <?php echo e($page_title); ?> <?php else: ?> <?php echo e(config('app.name', 'SixPac')); ?> <?php endif; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<!--- Theme related assets file added - start -->
	<link rel="icon" href="<?php echo e(asset('backend/assets/images/favicon.ico')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/css/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/icon/themify-icons/themify-icons.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/icon/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/icon/icofont/css/icofont.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('backend/assets/css/jquery.mCustomScrollbar.css')); ?>">

    <?php echo $__env->yieldPushContent('css'); ?>
	<!--- Theme related assets file added - end -->

    <!--- Page wise cdn url add code start here -->
    <?php if(!empty($cdnurl_css)): ?>
    <?php $__currentLoopData = $cdnurl_css; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdncss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(asset($cdncss)); ?>" type="text/css" >
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!--- Page wise cdn url add add code end here -->

    <!--- Page wise extra css add code start here -->
    <?php if(!empty($extra_css)): ?>
    <?php $__currentLoopData = $extra_css; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherCss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <link rel="stylesheet" href="<?php echo e(asset($otherCss)); ?>" type="text/css" >
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!--- Page wise extra css add code end here -->

    <script type="text/javascript">
    var baseurl = <?php echo json_encode(url('/')); ?>

    var superadmin_url = <?php echo json_encode(url('/')); ?>

    // var csrf_token = <?php echo csrf_token(); ?>

    var csrf_token = <?php echo "'".csrf_token()."';"; ?>;
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('backend/assets/custom/css/custom.css')); ?>">
</head>
<body>
    <?php
        $roleName = 'superadmin';
    ?>
    <!-- Get user role name from logged in users id code start -->
    
    <!-- Get user role name from logged in users id code end -->

    <!-- Pre-loader start -->
    <?php echo $__env->make('backend.layouts.pre-load', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Pre-loader end -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!--- Top header code start --->
             <?php echo $__env->make('layouts.include.topbar.'.$roleName, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--- Top header code end --->

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper1">

                    <!--- Left sidebar code start --->
                    <?php echo $__env->make('layouts.include.sidebar.'.$roleName, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--- Left sidebar code end --->

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php echo $__env->yieldContent('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>

	<!-- Footer assets file added - start -->
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/jquery/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/popper.js/popper.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/modernizr/modernizr.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/modernizr/css-scrollbars.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('backend/assets/js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/pcoded.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/vartical-demo.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/assets/js/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/xcash/bootstrap-autocomplete@v2.3.7/dist/latest/bootstrap-autocomplete.min.js"></script>
	<!-- Footer assets file added - end -->

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script src="<?php echo e(asset('backend/assets/custom/js/custom.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>

<!--- Page wise cdn url js add code start here -->
<?php if(!empty($cdnurl_js)): ?>
  <?php $__currentLoopData = $cdnurl_js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cdnjs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(asset($cdnjs)); ?>"></script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
<!--- Page wise cdn url js add code end here -->

<!--- Page wise js add code start here -->
<?php if(!empty($extra_js)): ?>
  <?php $__currentLoopData = $extra_js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherJs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(asset($otherJs)); ?>"></script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
<!--- Page wise js add code end here -->

<!--- Page wise js add code start here -->
<?php if(!empty($page_js)): ?>
  <?php $__currentLoopData = $page_js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageJs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(asset($pageJs)); ?>"></script>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php endif; ?>
<!--- Page wise js add code end here -->
<script>

  $(document).ready(function() {
    <?php if(!empty($init)): ?>
      <?php $__currentLoopData = $init; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($values); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
});
</script>

<!-- Logout modal code start here -->
<!--<script src="//unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>-->
<script src="//unpkg.com/sweetalert2@11.4.8/dist/sweetalert2.all.js"></script>
<script>
$(".logoutLink").on("click", function() {
	Swal.fire({
		title: 'Do you really want to leave?',
		//type: 'warning',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes',
		cancelButtonText: "No",
		//closeOnConfirm: true,
		//closeOnCancel: true
	}).then((result) => {
		if (result.value===true) {
			$('#logout-form').submit() // this submits the form
		}
	})
})
</script>

<!--
<div class="modal fade" id="LogoutModal">
    <div class="modal-dialog">
		<form action="" id="LogoutForm" method="get">
			<div class="modal-content">
				<div class="modal-header no-bottom-border">
				<h4 class="modal-title">Logout of account</h4>
				</div>
				<div class="modal-body no-top-border">
					<?php echo e(csrf_field()); ?>

					<p class="modal-text">Do you really want to leave?</p>
				</div>
				<div class="modal-footer">
					<button type="button" id="closeBtn" class="btn btn-transparnt" data-dismiss="modal" data-placement="bottom" data-toggle="tooltip" title="Cancel">Cancel</button>
					<button type="submit" name="yesLogoutBtn" id="yesLogoutBtn" class="btn btn-primary" data-dismiss="modal" data-placement="bottom" data-toggle="tooltip" title="Yes, log out">Yes, log out</button>
				</div>
			</div>
		</form>
    </div>
</div>
-->
<!-- Logout modal code end here -->
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SpearlineTest\resources\views/layouts/backend.blade.php ENDPATH**/ ?>