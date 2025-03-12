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
                    <h4 class="card-title">Model Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('model_list')): ?>
                        <a href="<?php echo e(route('administrative.model')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Model List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.model.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="brand_id">Brand *</label>
                        <select id="brand_id" name="brand_id" class="form-select select2" required>
                            <option disabled selected>Select Brand</option>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('brand_id')): ?>
                        <small id="brand_id-error" class="error mt-2 text-danger" for="brand_id">Please enter a Brand Name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Model Name" value="<?php echo e(old('name', isset($data) ? $data->name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="name">Please enter a Model Name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="details">Details</label>
                        <textarea class="form-control form-control-danger" id="details" name="details" autocomplete="off" placeholder="Charger details"  aria-invalid="true"><?php echo e(old('details', isset($data) ? $data->details : '')); ?></textarea>
                        <?php if($errors->has('details')): ?>
                        <small id="details-error" class="error mt-2 text-danger" for="details">Please enter a Charger details</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="charger_type_id">Charger *</label>
                        <select id="charger_type_id" name="charger_type_id" class="form-select select2" required>
                            <option disabled selected>Select Charger</option>
                            <?php $__currentLoopData = $charger_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('charger_type_id')): ?>
                        <small id="charger_type_id-error" class="error mt-2 text-danger" for="charger_type_id">Please enter a Charger type</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="file">Image</label>
                        <input type="file"  name="file" id="file"  class="form-control dropify" data-default-file="<?php echo e(old('file', isset($type) ? $type->image : '')); ?>" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="active" selected>Active</option>
                            <option value="inactive" >Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.brand')); ?>" class="btn btn-light">Cancel</a>

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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\b-charging\resources\views/administrative/model/create.blade.php ENDPATH**/ ?>