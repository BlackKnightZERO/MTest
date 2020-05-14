<?php $__env->startSection('content'); ?>
<div class="container-fluid app-body">
    <h3>Buffer Postings 
    </h3>

    <style type="text/css">
        #search, #group{
            border-top:none; border-left:none; border-right:none; background: #f5f8fa;
            padding-left: 25px;
        }
        #earch:focus {
            outline: none;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <!-- <div class="card" style="width: 100%">
                <div class="card-body"> -->
                    
                <form method="GET" action="<?php echo e(route('history')); ?>" id="myForm">    
                    <div class="row">
                        <div class="col-md-3" style="position: relative;">
                            <span style="position: absolute; margin-left: 5px;"><i class="fa fa-search"></i></span>
                            <input type="text" name="search" id="search" value="<?php echo e(isset($search) ? $search : ''); ?>">
                        </div>
                        
                        <div class="col-md-3">
                            <input type="date" name="date" id="date" value="<?php echo e(isset($date) ? $search : ''); ?>" style="border: none;">
                        </div>
                        <div class="col-md-3">
                            <select id="group" name="group">
                              <option value="" selected="selected">All Groups</option>
                              <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val->id); ?>" 
                                    <?php if((int)$val->id==(int)isset($group_p)){ ?>
                                        selected
                                    <?php } ?>
                                    ><?php echo e($val->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                    </div>
                    <button type="text" type="submit">search</button>
                </form>

                    <br>
                    <table class="table table-bordered table-hover"> 
                        <thead> 
                            <tr>
                                <th>Group Name</th> 
                                <th>Group Type</th> 
                                <th>Account Name</th> 
                                <th>Post Text</th> 
                                <th>Time</th> 
                            </tr> 
                        </thead>
                        <tbody id="t-body">
                            <?php $__currentLoopData = $bufferPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                            <td><?php echo e($groupInfo[$key]->name); ?></td>
                            <td><?php echo e($groupInfo[$key]->type); ?></td>
                            <td>
                                <div class="media">
                                    <div class="media-right">
                                        <a href="">
                                            <span class="fa fa-<?php echo e($accountInfo[$key]->type); ?>"></span>

                                            <img width="50" class="media-object img-circle" src="<?php echo e($accountInfo[$key]->avatar); ?>" alt="">
                                        </a>
                                    </div>
                                </div>
                            </td> 
                            <td><?php echo e($bp->post_text); ?></td>
                            <td><?php echo e($bp->sent_at); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <span id='pag-links' class="pull-right" style="margin-right: 90px;">
                    <?php echo e($bufferPosts->links()); ?>

                    </span>
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>

<script type="text/javascript">
    // $(document).ready(function() {
    // $('#select_date').change(function(){
        
    // var date = this.value;
    // var token = $('meta[name="csrf-token"]').attr('content');
    // $.ajax({

    //     type:'POST',
    //     url:`<?php echo URL::to('/history/date/'); ?>`,
    //     dataType: 'JSON',
    //     data: {
    //         "_method": 'POST',
    //         "_token": token,
    //         "date": date,
    //     },
    //     success:function(data){
    //         //console.log('success');
    //         // console.log(data);
    //         var newDataAvatar = [];
    //         var newDataAvatarType = [];
    //         var newDataBufferText = [];
    //         var newDataBufferSent = [];
    //         var newDataGroupName = [];
    //         var newDataGroupType = [];
           

            
    //         $.each(data['accountInfo'], function( index, value ) {
    //             newDataAvatar.push(value['avatar']);
    //             newDataAvatarType.push(value['type']);
    //         });
    //         $.each(data['bufferPosts']['data'], function( index, value ) {
    //             newDataBufferText.push(value['post_text']);
    //             newDataBufferSent.push(value['sent_at']);
    //         });
    //         $.each(data['groupInfo'], function( index, value ) {
    //             newDataGroupName.push(value['name']);
    //             newDataGroupType.push(value['type']);
    //         });


    //         var i;
    //         var txt = '';
    //         for (i = 0; i < newDataAvatar.length; i++) {
    //           txt+=`
    //                   <tr>
    //                     <td>${newDataGroupName[i]}</td>
    //                         <td>${newDataGroupType[i]}</td>
    //                         <td>
    //                             <div class="media">
    //                                 <div class="media-right">
    //                                     <a href="">
    //                                         <span class="fa fa-${newDataAvatarType[i]}"></span>

    //                                         <img width="50" class="media-object img-circle" src="${newDataAvatar[i]}" alt="">
    //                                     </a>
    //                                 </div>
    //                             </div>
    //                         </td> 
    //                         <td>${newDataBufferText[i]}</td>
    //                         <td>${newDataBufferSent[i]}</td>
    //                 </tr>
    //                 `
    //         }
    //         $("#t-body").empty();
    //         //console.log(txt);
    //         $("#t-body").append(txt);

    //         $("#pag-links").empty();
            
    //     },
    //     error:function(){
    //         console.log('error');
    //         $("#t-body").empty();
    //         $("#t-body").append(`
    //             <tr>
    //                 <td>no data found</td>
    //                 <td>no data found</td>
    //                 <td>no data found</td>
    //                 <td>no data found</td>
    //                 <td>no data found</td>
    //             </tr>
    //             `);
    //          $("#pag-links").empty();
    //     },         
    //     });
    // });
    // });

    // $(document).ready(function() {
    // $('#new').click(function(){
    //     console.log(this.value);
    //     // var search_group = this.value;
    //     var search_group = "meow";
    //     $.ajax({
    //         type:'GET',
    //         url:`<?php echo URL::to('/history'); ?>`,
    //         // url:`<?php echo URL::to('/history?group='); ?>${search_group}`,
    //         dataType: 'JSON',
    //         data: {
    //             "group": search_group,
    //         },
    //         success:function(data){
    //             console.log(data);

    //         },
    //         error:function(data){
    //             console.log("failed");
    //         },
    //         });
    //     });
    // });
    // $(document).ready(function() {
    // $('#select_groups').change(function(){
    //     console.log(this.value);
    //     $('#myForm').submit();
    //     });
    // });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>