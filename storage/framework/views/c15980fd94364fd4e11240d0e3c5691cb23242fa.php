<?php $__env->startSection('title', 'RifePassenger | View_Booking'); ?>

<?php $__env->startSection('heading', 'Your Bookings'); ?>

<?php $__env->startSection('body'); ?>
<?php if(count($Bookings) > 0): ?>
   <div class="col-lg-13">
   	<ul class="list-group">
   		<?php $__currentLoopData = $Bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   		<li class="list-group-item">
   			<a href="<?php echo e('/booking/'.Crypt::encrypt($Booking->id)); ?>"><?php echo e($Booking->dropOffBusStop->address); ?></a>
   			<span class="pull-right"><?php echo e($Booking->created_at); ?></span>
   		</li>
   		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   	</ul>
   </div>
<?php else: ?>
      <p><center class="alert alert-info" style="font-weight: bold">Sorry, you have no Bookings yet.</center></p>
<?php endif; ?>
<?php $__env->stopSection(); ?>

















<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>