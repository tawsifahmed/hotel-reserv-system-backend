<?php $__env->startSection('page-css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Role Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_list')): ?>
                        <a href="<?php echo e(route('administrative.role')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Role List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="" action="<?php echo e(route('administrative.role.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>

                    <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="name">Name *</label>
                                <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Role Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>">
                                <?php if($errors->has('name')): ?>
                                    <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</label>
                                <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="permission">Permission *<br>
                                <span class="btn btn-light btn-sm select-all">Select All</span>
                                <span class="btn btn-light btn-sm deselect-all">Deselect All</span>
                            </label>
                            <select name="permission[]" id="permission" data-placeholder="Select Permission" class="form-control select2" multiple="multiple">
                                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $permissions): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($id); ?>" <?php echo e((in_array($id, old('permissions', [])) || isset($data) && $data->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : ''); ?>><?php echo e(ucfirst(str_replace("_"," ",$permissions))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('permission')): ?>
                                <label id="name-error" class="error mt-2 text-danger" for="name">Please enter a permssion</label>
                            <?php endif; ?>
                        </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo e(route('administrative.role')); ?>" class="ml-3 btn btn-light">Cancel</a>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>
    $('.select-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/role/edit.blade.php ENDPATH**/ ?>