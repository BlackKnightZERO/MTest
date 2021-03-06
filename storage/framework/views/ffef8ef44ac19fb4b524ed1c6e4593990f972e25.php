<style type="text/css">
	.group-page .social-accounts li input + label img {
		-webkit-filter: grayscale(100%);
		filter: grayscale(100%);
	}
	.group-page .social-accounts li input:checked + label img {
		-webkit-filter: grayscale(0%);
		filter: grayscale(0%);
	}
</style>
<nav class="navbar">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->

		<ul class="nav navbar-nav">
			<li style="float: left;"> <span class="navbar-brand group-name-update"><?php echo e($group->name); ?></span> </li>
			<li  style="float: left;" class="dropdown">
				<button class="dropdown-toggle btn btn-default navbar-btn btn-radius" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-pencil"></i>  </button>
				<ul class="dropdown-menu dropdown-right dropdown-pop rss-auto">
					<li>
						<form id="group-name-update" method="POST">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<input type="text" class="form-control" name="group_name" value="<?php echo e($group->name); ?>">
									</div>
									<h4><strong>Custome UTM Parameters</strong></h4>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="UTM Campaign *" name="utm_campaign" value="<?php echo e(unserialize($group->utm)['utm_campaign']); ?>">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="UTM Source *" name="utm_source" value="<?php echo e(unserialize($group->utm)['utm_source']); ?>">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="UTM Medium *" name="utm_medium" value="<?php echo e(unserialize($group->utm)['utm_medium']); ?>">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="UTM Content" name="utm_content" value="<?php echo e(unserialize($group->utm)['utm_content']); ?>">
									</div>
								</div>
								<div class="col-sm-4">
									<br><br>
									<h4><strong>Skip Posts Older Than</strong></h4>
									<div class="form-group">
										<input class="form-control" type="range" name="skip_post_older" min="0" max="31" value="<?php echo e($group->skip_post_older); ?>">
										<div class="text-center"> <span class="skip_post_older_val"><?php echo e($group->skip_post_older); ?></span> days</div>
									</div>
									<h4><strong>Skip Posts Newer Than</strong></h4>
									<div class="form-group">
										<input class="form-control" type="range" name="skip_post_newer" min="0" max="31" value="<?php echo e($group->skip_post_newer); ?>">
										<div class="text-center show_value"> <span class="skip_post_newer_val"><?php echo e($group->skip_post_newer); ?></span> days</div>
									</div>
								</div>
								<div class="col-sm-4">
									<br><br>
									<h4><strong>Keyword Filter</strong></h4>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Keyword Filter" name="keyword" value="<?php echo e($group->keyword); ?>">
									</div>
									<br>
									<h4><strong>Skip These Keywords For At Least X Days</strong></h4>
									<div class="form-group">
										<input class="form-control" type="range" onchange="skip_keyword_change(this)" name="skip_keyword" min="0" max="31" value="<?php echo e($group->skip_keyword); ?>">
										<div class="text-center show_value"> <span class="skip_keyword_val"><?php echo e($group->skip_keyword); ?></span> days</div>
									</div>
								</div>
							</div>
							<div class="row">
								<br><br>
								<div class="col-sm-4 col-sm-offset-4">
									<button class="btn btn-default btn-block" type="submit">Update</button>
								</div>
							</div>
						</form>
					</li>
				</ul>
			</li>




			<?php if($group->type=='curation'): ?>

				<li  style="float: left;" class="dropdown">
					<button class="dropdown-toggle btn btn-default navbar-btn btn-radius" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-rss"></i>  </button>
					<ul class="dropdown-menu dropdown-center dropdown-pop dropdown-addrss">
						<li>RSS URL</li>
						<li>
							<table class="table rsslinks">
								<?php $__currentLoopData = unserialize($group->files_links)['link']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr><td><?php echo e($link); ?></td><td>
											<form id="delete-post-by-rsslink-<?php echo e(rand()); ?>" class="delete-post-by-rsslink pull-right" method="POST">
												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
												<input type="hidden" name="rsslink" value="<?php echo e($link); ?>">
												<button class="btn btn-default pull-right" type="submit"><i class="fa fa-trash"></i></button>
											</form></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</table>
							<form id="add-curation-online-ingroup" class="add-curation-online-ingroup" method="POST">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
								<div class="form-group">
									<input type="url" class="form-control" name="url" id="url" placeholder="Enter the RSS feed URL to curate content from here...">
									<button type="submit" class="btn btn-default pull-right">+</button>
								</div>
							</form>
						</li>
						<li>

							<form id="curation-refresh" class="curation-refresh" method="POST">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
								<button type="submit" class="btn  navbar-btn width-btn btn-center btn-dc"> Refresh Content</button>
							</form>

						</li>
					</ul>
				</li>
			<?php endif; ?>

			<li  style="float: left;" class="dropdown">
				<button class="dropdown-toggle btn btn-default navbar-btn btn-radius" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i>  </button>
				<ul class="dropdown-menu dropdown-center dropdown-pop group-list">

					<?php if($group->status =='0' && $group->type =='upload'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'upload'  && $g->status =='0'): ?>
								<li><a href="<?php echo e(route('content-pending', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

					<?php if($group->status =='1' && $group->type =='upload'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'upload'  && $g->status =='1'): ?>
								<li><a href="<?php echo e(route('content-active', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<?php if($group->status =='2' && $group->type =='upload'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'upload'  && $g->status =='2'): ?>
								<li><a href="<?php echo e(route('content-completed', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>


					<?php if($group->status =='0' && $group->type =='curation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'curation'  && $g->status =='0'): ?>
								<li><a href="<?php echo e(route('content-pending', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<?php if($group->status =='1' && $group->type =='curation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'curation'  && $g->status =='1'): ?>
								<li><a href="<?php echo e(route('content-active', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<?php if($group->status =='2' && $group->type =='curation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'curation'  && $g->status =='2'): ?>
								<li><a href="<?php echo e(route('content-completed', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

					<?php if($group->status =='0' && $group->type =='rss-automation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'rss-automation'  && $g->status =='0'): ?>
								<li><a href="<?php echo e(route('content-pending', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<?php if($group->status =='1' && $group->type =='rss-automation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'rss-automation'  && $g->status =='1'): ?>
								<li><a href="<?php echo e(route('content-active', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
					<?php if($group->status =='2' && $group->type =='rss-automation'): ?>
						<?php $__currentLoopData = $user->groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($g->type == 'rss-automation'  && $g->status =='2'): ?>
								<li><a href="<?php echo e(route('content-completed', $g->id)); ?>"><?php echo e($g->name); ?></a></li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>

				</ul>
			</li>


		</ul>
		<ul class="nav navbar-nav navbar-right">



			<li class="dropdown">
				<button class="dropdown-toggle btn btn-default navbar-btn width-btn" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><label>Recycle Posts  </label> <i class="fa fa-angle-down"></i></button>
				<ul class="dropdown-menu dropdown-center dropdown-pop group-list">
					<li>

						<form id="recycle-group-update" method="POST" class="container-fluid">
							<h4>SET RECYCLE OPTION</h4>
							<?php echo e(csrf_field()); ?>


							<div class="form-group">
								<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">

								<input class="check-toog left-toog" type="checkbox" name="recycle" id="recycle" <?php if($group->recycle =='1'): ?> checked <?php endif; ?> >
								<label for="recycle" style="text-transform: uppercase;">
									ENABLE RECYCLING
								</label>
							</div>


							<div class="form-group">
								<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">

								<input class="check-toog left-toog" type="checkbox" name="repeat_wait_tog" id="repeat_wait_tog"  <?php if($group->repeat_wait > 0): ?> checked <?php endif; ?>>
								<label for="repeat_wait_tog" style="text-transform: uppercase;">Wait 'X' Days to repeat a post</label>
							</div>

							<div class="form-group"  style="margin-bottom: 0px;">
                                <?php

                                if($group->repeat_wait){
                                    $rt = $group->repeat_wait;

                                } elseif ($group->repeat_wait==0) {
                                    $rt = '0';

                                } else {
                                    $rt = '0';

                                }
                                ?>
								<input class="form-control" type="range" name="repeat_wait" min="0" max="31" value="<?php echo e($rt); ?>">
								<div class="text-center">
									<span class="quanwait_date"><?php echo e($rt); ?></span> DAYS
									</span>
								</div>
							</div>
						</form>
						<br>
					</li>

				</ul>
			</li>



			<li>
				<div class="btn btn-default navbar-btn width-btn">
					<form id="add_image-group-update" method="POST">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
						<input class="check-toog" type="checkbox" name="add_image" id="add_image" <?php if($group->add_image =='1'): ?> checked <?php endif; ?> >
						<label for="add_image">
							Add Auto Image
						</label>
					</form>
				</div>
			</li>

			<li>
				<div class="btn btn-default navbar-btn width-btn">
					<form id="shuffle-group-update" method="POST">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
						<input class="check-toog" type="checkbox" name="shuffle" id="shuffle" <?php if($group->shuffle =='1'): ?> checked <?php endif; ?> >
						<label for="shuffle">
							Shuffle Posts
						</label>
					</form>
				</div>
			</li>



		<!--
						<?php if($group->type=='rss-automation'): ?>

			<li>
                <div class="btn btn-default navbar-btn width-btn">
                    <form id="addimage-group-update" method="POST">
<?php echo e(csrf_field()); ?>

					<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
									<input class="check-toog" type="checkbox" name="addimage" id="addimage">
									<label for="addimage">
										Auto Add Image
									</label>
								</form>
							</div>
						</li>
						<?php endif; ?>
				-->
			<?php if($group->type!='rss-automation'): ?>

				<li class="dropdown">
					<button class="btn btn-default navbar-btn width-btn dropdown-toggle" id="Hashtags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><label>Hashtags</label> <i class="fa fa-angle-down"></i></button>
					<ul class="dropdown-menu dropdown-center" aria-labelledby="Hashtags">
						<li>
							<form class="container-fluid" id="hashtags-update" method="POST" action="">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
								<div class="hashtags" style="width: 320px;">
									<h4>Enter Hashtags : </h4>
									<ul class="list-unstyled">
										<li>
											<div class="form-group inline-form-group">
												<span class="fa fa-facebook"></span> <input style="width: 85%;" class="form-control" type="text" name="fhash" value="<?php if(isset(unserialize($group->hash)['fb'])): ?><?php echo e(unserialize($group->hash)['fb']); ?><?php endif; ?>">
											</div>
										</li>
										
										<li>
											<div class="form-group inline-form-group">
												<span class="fa fa-linkedin"></span> <input style="width: 85%;" class="form-control" type="text" name="lhash" value="<?php if(isset(unserialize($group->hash)['in'])): ?><?php echo e(unserialize($group->hash)['in']); ?><?php endif; ?>">
											</div>
										</li>
										<li>
											<div class="form-group inline-form-group">
												<span class="fa fa-twitter"></span> <input style="width: 85%;" class="form-control" type="text" name="ghash" value="<?php if(isset(unserialize($group->hash)['tw'])): ?><?php echo e(unserialize($group->hash)['tw']); ?><?php endif; ?>">
											</div>
										</li>
										<li>
											<div class="form-group inline-form-group">
												<span class="fa fa-instagram"></span> <input style="width: 85%;" class="form-control" type="text" name="ihash" value="<?php if(isset(unserialize($group->hash)['ins'])): ?><?php echo e(unserialize($group->hash)['ins']); ?><?php endif; ?>">
											</div>
										</li>

									</ul>
									<div class="form-group text-center">
										<button type="submit" class="btn  width-btn btn-dc">Save</button>
									</div>
								</div>
							</form>
						</li>
					</ul>
				</li>
			<?php endif; ?>
			<li class="dropdown">
				<button class="btn btn-default navbar-btn width-btn dropdown-toggle" id="Schedule" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><label>Schedule</label> <i class="fa fa-angle-down"></i></button>
				<?php echo $__env->make('group.schidule', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			</li>
			<?php if($group->status == '0'): ?>
				<li>
					<div class="btn  navbar-btn width-btn btn-dc">
						<form id="change-group-status" method="POST">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
							<input class="check-toog" type="checkbox" name="activate" id="activate" >
							<label for="activate">
								Activate
							</label>
						</form>
					</div>
				</li>
			<?php endif; ?>
			<?php if($group->status == '1'): ?>
				<li>
					<div>
						<form id="save-group" method="POST">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
							<button class="btn  navbar-btn width-btn btn-dc" type="button">
								<label>Save</label>
							</button>
						</form>
					</div>
				</li>
			<?php endif; ?>
			<?php if($group->status == '2'): ?>
				<li>
					<div>
						<form id="re-active-group" method="POST">
							<?php echo e(csrf_field()); ?>

							<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
							<button class="btn navbar-btn width-btn btn-dc" type="submit">
								<label>Re-activate</label>
							</button>
						</form>
					</div>
				</li>
			<?php endif; ?>
		</ul>
	</div><!-- /.container-fluid -->
	<div class="social-accounts">
		<form id="target-social-accounts" method="POST">
			<?php echo e(csrf_field()); ?>

			<input type="hidden" name="group_id" value="<?php echo e($group->id); ?>">
			<ul class="list-inline">
				<li class="search">
					<label for=""><i class="fa fa-search"></i></label>
					<div class="searchBox">
						<i class="fa fa-fw fa-remove remover" onclick="clearInput(this, event)"></i>
						<textarea placeholder="Search Account" class="accountSearch" onkeyup="accountSearching(this)"></textarea>
					</div>
				</li>
				<?php $__currentLoopData = $user->socialaccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if( $accounts->type != 'google' ): ?>
						<li class="<?php echo e($accounts->type); ?> searchAccContent" data-type="<?php echo e($accounts->name); ?>">
							<input type="checkbox" name="social_accounts[<?php echo e($key); ?>]" id="social-accounts-<?php echo e($accounts->id); ?>" value="<?php echo e($accounts->id); ?>"  <?php if(in_array($accounts->id, unserialize($group->target_acounts)) AND $accounts->status==1): ?> checked <?php endif; ?> <?php if($accounts->status==0): ?> disabled <?php endif; ?>>
							<label for="social-accounts-<?php echo e($accounts->id); ?>">
								<span class="fa fa-<?php echo e($accounts->type); ?>"></span>
								<img width="60" src="<?php echo e($accounts->avatar); ?>">
							</label>
						</li>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
			<button type="submit" class="hidden"></button>
		</form>
	</div>
</nav>


<script type="application/javascript">
    function accountSearching(trigger){
        var trigger = $(trigger);
        var keyword = trigger.val();
        var parent = trigger.closest('.list-inline');
        var dataContent = parent.find('.searchAccContent');
        var accounts = [];
        dataContent.each(function(i,v){
            var THIS = $(v);
            var account = THIS.attr('data-type');
            accounts.push(account);
        });
        var result = [];
        $.each(accounts, function(i, v){
            if(v.match(new RegExp(keyword, 'gi'))){
                result.push(v);
            }
        });
        dataContent.hide();
        $.each(result, function(i, v){
            parent.find('.searchAccContent[data-type="'+v+'"]').show();
        });
    }
    function clearInput(trigger, e){
        e.preventDefault();
        var trigger = $(trigger);
        var input = trigger.closest('.searchBox').find('.accountSearch');
        input.val('');
        $('.searchAccContent').show();
    }
    function skip_keyword_change(trigger){
        var v = $(trigger).val();
        $('.skip_keyword_val').html(v)
    }
</script>