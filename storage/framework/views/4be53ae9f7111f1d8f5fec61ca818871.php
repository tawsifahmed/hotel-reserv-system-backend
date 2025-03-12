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
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_create')): ?>
        <li class="<?php echo e(request()->is('administrative/payment/*')?'mm-active':''); ?>">
            <a href="<?php echo e(route('administrative.payment.list')); ?>" class="waves-effect">
                <i class="ri-wallet-3-line"></i>
                <span>Payments</span>
            </a>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('invoice_list')): ?>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-file-list-2-line"></i>
                <span>Invoices</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_list')): ?>
                    <li class="<?php echo e(request()->is('administrative/invoice')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.invoice.list')); ?>">All Invoice</a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_create')): ?>
                    <li class="<?php echo e(request()->is('administrative/invoice/create')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.invoice.create')); ?>">Create Invoice</a>
                    </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_commission')): ?>
                    <li class="<?php echo e(request()->is('administrative/commission/*')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.commission.list')); ?>">Commission</a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('approval_list')): ?>
        <li>
            <a href="<?php echo e(route('administrative.approval.list')); ?>">
                <i class="ri-user-follow-line"></i>
                <span>Approval Manage</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('member_list')): ?>
        <li class="<?php echo e(request()->is('administrative/member/*')?'mm-active':''); ?>">
            <a href="<?php echo e(route('administrative.member.list')); ?>">
                <i class="ri-team-line"></i>
                <span>Member List</span>
            </a>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('guest_management')): ?>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-group-line"></i>
                <span>Guest Management</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create_instance','read_instance','update_instance','delete_instance'])): ?>
                <li class="<?php echo e(request()->is('administrative/instance/*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('administrative.instance')); ?>">Instance</a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create_guest','read_guest','update_guest','delete_guest'])): ?>
                <li class="<?php echo e(request()->is('administrative/guest-user/*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('administrative.guest.user')); ?>">Guest</a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['create_scan_qr','read_scan_qr','delete_scan_qr'])): ?>
                <li class="<?php echo e(request()->is('administrative/scan/*') ? 'mm-active' : ''); ?>">
                    <a href="<?php echo e(route('administrative.scan')); ?>">Scan QR</a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any('type_of_membership_list','occupation_type_list','car_ownership_type_list','club_service_list')): ?>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-settings-line"></i>
                <span>System Settings</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('club_service_list')): ?>
                <li class="<?php echo e(request()->is('administrative/club-service/*')?'mm-active':''); ?>">
                    <a href="<?php echo e(route('administrative.club-service')); ?>">Service List</a>
                </li>
                <?php endif; ?>
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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restaurant_settings_list')): ?>
                    <li class="<?php echo e(request()->is('administrative/restaurant-settings/*')?'mm-active':''); ?>">
                        <a href="<?php echo e(route('administrative.restaurant-settings')); ?>"> Restaurant Settings</a>
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
<?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/layouts/partial/_sidebar.blade.php ENDPATH**/ ?>