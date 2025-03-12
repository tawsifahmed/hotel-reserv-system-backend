<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
        }
        .input-group-text{
            min-width: 130px;
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
                    <a class="btn btn-light  waves-effect waves-light">
                        Basic Information <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a  class="btn btn-success waves-effect waves-light">
                        Classification <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Feature <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Image <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                </div>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.product.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="type" value="classification">
                    <input type="hidden" class="form-control" name="product_id" value="<?php echo e($id); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Mileage">Body</span>
                                <input type="text" class="form-control" id="body" name="body" value="<?php echo e(old('body')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Mileage">Mileage</span>
                                <input type="text" class="form-control" id="Mileage" name="mileage" value="<?php echo e(old('mileage')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Year">Year</span>
                                <input type="text" class="form-control" id="Year" name="year" value="<?php echo e(old('year')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Fuel_economy">Fuel economy</span>
                                <input type="text" class="form-control" id="Fuel_economy" name="fuel_economy" value="<?php echo e(old('fuel_economy')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Make">Make</span>
                                <input type="text" class="form-control" id="Make" name="make" value="<?php echo e(old('make')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Fuel_type"> Fuel type </span>
                                <input type="text" class="form-control" id="Fuel_type" name="fuel_type" value="<?php echo e(old('fuel_type')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Transmission"> Transmission </span>
                                <input type="text" class="form-control" id="Transmission" name="transmission" value="<?php echo e(old('transmission')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Exterior_Color"> Exterior Color </span>
                                <input type="text" class="form-control" id="Exterior_Color" name="exterior_color" value="<?php echo e(old('exterior_color')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Model">Model </span>
                                <input type="text" class="form-control" id="Model" name="model" value="<?php echo e(old('model')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="engine_type">Engine Type</span>
                                <input type="text" class="form-control" id="engine_type" name="engine_type" value="<?php echo e(old('engine_type')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="engine_capacity">Engine Capacity</span>
                                <input type="text" class="form-control" id="engine_capacity" name="engine_capacity" value="<?php echo e(old('engine_capacity')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="seat">Seat </span>
                                <input type="text" class="form-control" id="seat" name="seat" value="<?php echo e(old('seat')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="doors">Doors</span>
                                <input type="text" class="form-control" id="doors" name="doors" value="<?php echo e(old('doors')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Drive">Drive </span>
                                <input type="text" class="form-control" id="Drive" name="drive" value="<?php echo e(old('drive')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="Interior_Color">Interior Color </span>
                                <input type="text" class="form-control" id="Interior_Color" name="interior_color" value="<?php echo e(old('interior_color')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="condition">Condition</span>
                                <input type="text" class="form-control" id="condition" name="condition" value="<?php echo e(old('condition')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="kilometers_run">Kilometers Run</span>
                                <input type="text" class="form-control" id="kilometers_run" name="kilometers_run" value="<?php echo e(old('kilometers_run')); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" for="registration">Registration</span>
                                <input type="text" class="form-control" id="registration" name="registration" value="<?php echo e(old('registration')); ?>">
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

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/product/classification.blade.php ENDPATH**/ ?>