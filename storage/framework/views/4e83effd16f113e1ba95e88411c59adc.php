<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
        }
        .input-group-text{
            min-width: 120px;
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
                    <h4 class="card-title">Product Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product_list')): ?>
                        <a href="<?php echo e(route('administrative.product')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Product List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <div class="button-items mb-3">
                    <a class="btn btn-success waves-effect waves-light">
                        Basic Information <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a  class="btn btn-light waves-effect waves-light">
                        Classification <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Feature <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Image <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                </div>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.product.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="type" value="basic">
                    <div class="form-group mb-3">
                        <label for="name">Name *</label>
                        <input required type="text" class="form-control form-control-danger" id="name" name="name" autocomplete="off" placeholder="Product Name" value="<?php echo e(old('name')); ?>" aria-invalid="true">
                        <?php if($errors->has('name')): ?>
                        <small id="name-error" class="error mt-2 text-danger" for="name">Please enter a Product Name</small>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Category *</label>
                                <select id="category" name="category" class="form-select select2" required>
                                    <option value="">Select a Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Brand *</label>
                                <select id="brand" name="brand" class="form-select select2" required>
                                    <option value="">Select a Brand</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>"><?php echo e($brand->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="price">Regular Price *</label>
                                <input required type="number" class="form-control form-control-danger" id="price" name="price" autocomplete="off" placeholder="Regular price" value="<?php echo e(old('price', isset($data) ? $data->price : '')); ?>" aria-invalid="true">
                                <?php if($errors->has('name')): ?>
                                <small id="price-error" class="error mt-2 text-danger" for="name">Please enter a Regular Price</small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="discount_price">Discount Price *</label>
                                <input type="text" class="form-control form-control-danger" id="discount_price" name="discount_price" autocomplete="off" placeholder="Discount price" value="<?php echo e(old('discount_price', isset($data) ? $data->discount_price : '')); ?>" aria-invalid="true">
                                <?php if($errors->has('name')): ?>
                                <small id="name-error" class="error mt-2 text-danger" for="name">Please enter a Discount Price</small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description </label>
                        <textarea id="elm1" class="editor" name="description"><?php echo e(old('description')); ?></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="is_feature">Is Feature *</label>
                                <select id="is_feature" name="is_feature" class="form-select" required>
                                    <option value="yes" <?php echo e(old('is_feature') == 'yes'?'selected':''); ?>>Yes</option>
                                    <option value="no" <?php echo e(old('is_feature') == 'no'?'selected':''); ?>>No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name">Status *</label>
                                <select id="ustatus" name="status" class="form-select" required>
                                    <option value="active" <?php echo e(old('status') == 'active'?'selected':''); ?>>Active</option>
                                    <option value="inactive" <?php echo e(old('status') == 'inactive'?'selected':''); ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="<?php echo e(route('administrative.product')); ?>" class="btn btn-light">Cancel</a>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/libs/tinymce/tinymce.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pages/form-editor.init.js')); ?>"></script>
<script>

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/product/create.blade.php ENDPATH**/ ?>