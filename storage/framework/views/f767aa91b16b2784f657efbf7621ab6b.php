<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Category Edit</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_list')): ?>
                        <a href="<?php echo e(route('administrative.category')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Category List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.category.update',$type->id)); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>

                     <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Category Name" value="<?php echo e(old('name', isset($type) ? $type->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="name">Please enter a name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Short Description </label>
                        <textarea  class="form-control form-control-danger" id="description" name="description" autocomplete="off" placeholder="Short Description" aria-invalid="true"><?php echo e(old('description', isset($type) ? $type->description : '')); ?></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file"  name="image" id="image"  class="form-control dropify" data-default-file="<?php echo e(old('logo', isset($type) ? $type->logo : '')); ?>" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="active" <?php echo e($type->status== 'active' ? 'selected' : ''); ?>>Active</option>
                            <option value="inactive" <?php echo e($type->status=='inactive' ? 'selected' : ''); ?>>Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.category')); ?>" class="btn btn-light">Cancel</a>

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script>
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': '',
                'remove':  'Remove',
            }
        });
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/category/edit.blade.php ENDPATH**/ ?>