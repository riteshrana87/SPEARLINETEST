<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">


        <ul class="pcoded-item pcoded-left-item mt-4">
            <li class="<?php echo e((request()->is('/*') || request()->is('/')) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('daily-report')); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Daily Report</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?php echo e((request()->is('monthly-report*')) ? 'active' : ''); ?>">
                <a href="<?php echo e(route('monthly-report')); ?>">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Monthly Report</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

     

</nav><?php /**PATH C:\xampp\htdocs\SpearlineTest\resources\views/layouts/include/sidebar/superadmin.blade.php ENDPATH**/ ?>