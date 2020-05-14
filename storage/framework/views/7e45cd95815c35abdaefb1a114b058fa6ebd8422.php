<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div class="list-group">
						  	<a class="list-group-item <?php if(\Request::route()->getName()=='admin'): ?> active <?php endif; ?>" href="/admin/">Overview</a>
						  	<a class="list-group-item <?php if(\Request::route()->getName()=='admin/manage-user'): ?> active <?php endif; ?>" href="/admin/manage-user/">Manage User</a>
						  	<a class="list-group-item <?php if(\Request::route()->getName()=='admin/membership-plan'): ?> active <?php endif; ?>" href="/admin/membership-plan">Membership Plan</a>
						  	<a class="list-group-item <?php if(\Request::route()->getName()=='admin/free-sign-up'): ?> active <?php endif; ?>" href="/admin/free-sign-up">Free Sign Up</a>
						</div>
					</div>
					<div class="col-md-9">


					<ul class="list-inline">
						<li>
							<a class="btn btn-primary" href="/admin/manage-user/create"> Create Account</a>
						</li>
						<li>
							<form>
								<input class="form-control" type="text" name="search" placeholder="Search">
								<button class="pull-right" style=" position: relative; margin-top: -27px; border: 0px; background: 0px;  padding-right: 12px; outline: none !important;"> <i class="glyphicon glyphicon-search"></i> </button>
							</form>
						</li>
					</ul>

					<table class="table table-bordered"> 
						<thead> 
							<tr> 
								<th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Created Date</th> <th>Subscription plan</th> <!--<th>Last payment date</th> --> <th></th>
							</tr> 
						</thead> 
						<tbody> 
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr> 
							
								<td><?php echo e($user->first_name); ?></td> 
								<td><?php echo e($user->last_name); ?></td> 
								<td><p style="word-break: break-all;"><?php echo e($user->email); ?></p></td> 
								<td><?php echo e($user->created_at); ?></td>
								<td> <?php if($user->plansubs()['plan']): ?>
								    <?php echo e($user->plansubs()['plan']->name); ?>

								    <?php else: ?>
								    Free
								    <?php endif; ?>
								</td> 
								<td> <a href="/admin/manage-user/edit/<?php echo e($user->id); ?>">Edit</a> </td>

							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </tbody> 
					 </table>

					 
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>