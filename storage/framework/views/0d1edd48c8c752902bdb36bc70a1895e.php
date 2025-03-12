<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Service Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('club_service_list')): ?>
                        <a href="<?php echo e(route('administrative.club-service')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Service List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.club-service.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="name">Service Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="title" autocomplete="off" placeholder="Service Name" value="<?php echo e(old('title', isset($data) ? $data->title : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('title')): ?>
                        <small id="title-error" class="error mt-2 text-danger" for="title">Please enter a Service Name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Service Price *</label>
                        <input required type="number" class="form-control form-control-danger" id="price" name="price" autocomplete="off" placeholder="Service Price" value="<?php echo e(old('price', isset($data) ? $data->price : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('price')): ?>
                        <small id="price-error" class="error mt-2 text-danger" for="price">Please enter a Service Name</small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file"  name="image"  class="form-control dropify" data-default-file="<?php echo e(old('icon', isset($type) ? $type->icon : '')); ?>" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="1" selected>Active</option>
                            <option value="0" >Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.occupation-type')); ?>" class="btn btn-light">Cancel</a>

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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/club-service/create.blade.php ENDPATH**/ ?>