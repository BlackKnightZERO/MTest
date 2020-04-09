<?php $__env->startSection('content'); ?>
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<div class="container-fluid app-body">
	<style type="text/css">
		.rss_lists .social-post:first-child .inst:after {
			font: normal normal normal 20px/1 FontAwesome;
		    position: absolute;
		    top: -70px;
		    width: 50px;
		    height: 50px;
		    background: #8492af;
		    color: #fff;
		    line-height: 50px;
		    text-align: center;
		    border-radius: 50%;
		    margin-left: -30px;
		    content: "\f16d";
		}
	</style>
	<div class="row">

<div>
	<p>jquery script load error & datatable full functionality unavailable</p>
<table id="buffer_table" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Group Type</th>
                <th>Account Name</th>
                <th>Post Text</th>
                <th>Time</th>
                
            </tr>
        </thead>
        <tbody>
        	<?php $__currentLoopData = $buffer_posting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->b_name2); ?></td>
                <td><?php echo e($item->b_type); ?></td>
                <td><?php echo e($item->b_name); ?></td>
                <td><?php echo e($item->b_text); ?></td>
                <td><?php echo e($item->b_time); ?></td>
                
            </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
</table>        
</div>

</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	$(document).ready( function () {
    $('#buffer_table').DataTable();
} );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>