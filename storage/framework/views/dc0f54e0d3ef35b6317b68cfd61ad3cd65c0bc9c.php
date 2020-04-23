<?php $__env->startSection('content'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    
<div class="container-fluid app-body">
    <h3>Buffer Postings 
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card" style="width: 100%">
                <div class="card-body"> -->
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="b_search">
                        </div>
                        <div class="col-md-4">
                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" type="text" readonly / name="dob">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dropdown">
                              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown link
                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover"> 
                        <thead> 
                            <tr><th>Group Name</th> <th>Group Type</th> <th>Account Name</th> <th>Post Text</th> <th>Time</th> </tr> 
                        </thead> 
                    </table>
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
<script type="text/javascript">
   $("#datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true
      }).datepicker('update', new Date());
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>