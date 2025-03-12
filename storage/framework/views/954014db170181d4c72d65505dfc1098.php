<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="<?php echo e(route('administrative.dashboard')); ?>" class="waves-effect">
                <i class="ri-dashboard-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="menu-title">Components</li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_list')): ?>
        <li class="<?php echo e(request()->is('administrative/category/*')?'mm-active':''); ?>">
            <a href="<?php echo e(route('administrative.category')); ?>" class="waves-effect">
                <i class="ri-git-merge-fill"></i>
                <span>Category</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand_list')): ?>
        <li class="<?php echo e(request()->is('administrative/brand/*')?'mm-active':''); ?>">
            <a href="<?php echo e(route('administrative.brand')); ?>" class="waves-effect">
                <i class="ri-pantone-line"></i>
                <span>Brand</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_list')): ?>
        <li class="<?php echo e(request()->is('administrative/product/*')?'mm-active':''); ?>">
            <a href="<?php echo e(route('administrative.product')); ?>" class="waves-effect">
                <i class="ri-roadster-fill"></i>
                <span>Product</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('user_list', 'role_list', 'permission_list')): ?>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-settings-3-line"></i>
                <span>Account Settings</span>
            </a>
            <ul class="sub-menu" aria-expanded="true">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_list')): ?>
                <li class="<?php echo e(request()->is('administrative/user/*')?'mm-active':''); ?>">
                    <a href="<?php echo e(route('administrative.user')); ?>"> User List </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('role_list')): ?>
                <li class="<?php echo e(request()->is('administrative/role/*')?'mm-active':''); ?>">
                    <a href="<?php echo e(route('administrative.role')); ?>">Role</a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('permission_list')): ?>
                <li class="<?php echo e(request()->is('administrative/permission/*')?'mm-active':''); ?>">
                    <a href="<?php echo e(route('administrative.permission')); ?>">Permission</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

    </ul>
</div>
<?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/layouts/partial/_sidebar.blade.php ENDPATH**/ ?>