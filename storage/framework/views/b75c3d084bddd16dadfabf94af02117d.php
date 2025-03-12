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

        <li>
            <a href="<?php echo e(route('administrative.aprove.list')); ?>">
                <i class="ri-dashboard-line"></i>
                <span>Aproval Mange</span>
            </a>
        </li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('type_of_membership_list','occupation_type_list','car_ownership_type_list')): ?>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-settings-line"></i>
                <span>System Settings</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('type_of_membership_list')): ?>
                    <li class="<?php echo e(request()->is('administrative/type-of-membership/*')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.type-of-membership')); ?>">Type of Membership</a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('occupation_type_list')): ?>
                    <li class="<?php echo e(request()->is('administrative/occupation-type/*')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.occupation-type')); ?>">Occupation Type</a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('car_ownership_type_list')): ?>
                    <li class="<?php echo e(request()->is('administrative/car-ownership-type/*')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.car-ownership-type')); ?>"> Car Ownership Type</a>
                    </li>
                <?php endif; ?>
            </ul>
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
<?php /**PATH E:\Projects\club-management-system\resources\views/administrative/layouts/partial/_sidebar.blade.php ENDPATH**/ ?>