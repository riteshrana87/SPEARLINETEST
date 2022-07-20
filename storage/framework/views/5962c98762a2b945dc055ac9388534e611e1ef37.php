

<?php $__env->startSection('content'); ?>
<!-- Page-header start -->
<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Monthliy Report</h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"> <i class="fa fa-home"></i> </a></li>
            <li class="breadcrumb-item">Monthliy Report Listing</li>
        </ul>
    </div>
</div>
<!-- Page-header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card page-content">
                <div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<h5 class="mb-0">Monthliy Report Listing</h5>
						</div>
						<div class="col-md-8 text-right">

						</div>
					</div>
                </div>
                <!-- Filter start -->
                <dev class="select-filter ">
                    <div class="select-filter-list scrollbar-dynamic">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3" id="structure-level-1">
                                    <div class="search-box">
                                        <div class="form-group search-wrapper">
                                            <label>Start</label>
                                            <input type="text" id="start" name="start" class="form-control strcture-search" placeholder="Start Date" id="myInput">
                                        </div>
                                        <div class="search-list ">
                                            <span class="loader hide">Loading...</span>
                                            <ul class="scrollbar-dynamic 11">
                                                <div id="filter-list-group1"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" id="structure-level-1">
                                    <div class="search-box">
                                        <div class="form-group search-wrapper">
                                            <label>End</label>
                                            <input type="text" id="end" name="end" class="form-control strcture-search" placeholder="End Date" id="myInput">
                                        </div>
                                        <div class="search-list ">
                                            <span class="loader hide">Loading...</span>
                                            <ul class="scrollbar-dynamic 11">
                                                <div id="filter-list-group1"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" id="structure-level-2">
                                    <div class="search-box">
                                        <div class="form-group search-wrapper">
                                        <label>Company</label>
                                        <select class="form-control strcture-search" name="company-data" id="companyData" name="evaluation_type">
                                                <option value="">Select Company</option>
                                                <?php $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" id="structure-level-3">
                                    <div class="search-box">
                                        <div class="form-group search-wrapper">
                                        <label>Country</label>
                                            <select class="form-control strcture-search" name="countryData" id="countryData" name="evaluation_type">
                                                <option value="">Select Country</option>
                                                <?php $__currentLoopData = $countrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row filter-btn">
                                <div class="form-group bottom-buttons text-right mar-b-0">
                                    <button type="button" class="btn btn-primary btn-gradient" id="scard-filter-by-stcr">Apply Filter</button>
                                    <button type="button" class="btn btn-primary btn-cancel" id="filter-cancel">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </dev>
                <!-- Filter end -->
                 <!-- Table Start -->
                <div class="sp_table">
                    <div class="table-responsive">
                        <table id="tblMonthlyReport" class="table table-bordered">
                            <thead>
		                        <tr>
		                            <th>Id</th>
		                            <th>Company Name</th>
		                            <th>Country Name</th>
                                    <th>Number of Fails</th>
                                    <th>Number of Test</th>
                                    <th>Connection Rate</th>
                                    <th>Post Dial Delay</th>
                                    <th>Created Date</th>
                                </tr>
		                    </thead>
                        </table>
                    </div>
                </div>
                 <!-- Table end -->
            </div>
        </div>
    </div>
</div>
<!-- Page body end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SpearlineTest\resources\views/monthlyReport/monthly_report_list.blade.php ENDPATH**/ ?>