<?php if(in_array(auth()->user()->level, ['Admin'])): ?>
    <li>
        <a <?php if(Route::current()->action['as'] == 'fasilitas.index'): ?> class='active-menu'
           <?php endif; ?> href="<?php echo e(route('fasilitas.index')); ?>"><i class="fa fa-table"></i>Fasilitas</a>
    </li>
<?php endif; ?>

<?php if(in_array(auth()->user()->level, ['Admin'])): ?>
    <li>
        <a <?php if(Route::current()->action['as'] == 'rumah.index'): ?> class='active-menu'
           <?php endif; ?> href="<?php echo e(route('rumah.index')); ?>"><i class="fa fa-table"></i>Rumah</a>
    </li>
<?php endif; ?>

<?php if(in_array(auth()->user()->level, ['Admin'])): ?>
    <li>
        <a <?php if(Route::current()->action['as'] == 'tentang.index'): ?> class='active-menu'
           <?php endif; ?> href="<?php echo e(route('tentang.index')); ?>"><i class="fa fa-table"></i>Tentang</a>
    </li>
<?php endif; ?>

<?php if(in_array(auth()->user()->level, ['Admin'])): ?>
    <li>
        <a <?php if(Route::current()->action['as'] == 'disukai.index'): ?> class='active-menu'
           <?php endif; ?> href="<?php echo e(route('disukai.index')); ?>"><i class="fa fa-table"></i>Disukai</a>
    </li>
<?php endif; ?>


<?php if(in_array(auth()->user()->level, ['Admin'])): ?>
    <li>
        <a <?php if(Route::current()->action['as'] == 'user.index'): ?> class='active-menu'
           <?php endif; ?> href="<?php echo e(route('user.index')); ?>"><i class="fa fa-table"></i>User</a>
    </li>
<?php endif; ?>
            
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\api-admin-rumah-kevin.bikinaplikasi.dev\new\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>