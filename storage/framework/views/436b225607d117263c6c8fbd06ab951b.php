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
                    <h4 class="card-title">Station Create</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('station_list')): ?>
                        <a href="<?php echo e(route('administrative.station')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Station List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.station.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="station_name">Nmae *</label>
                        <input type="text" class="form-control form-control-danger" id="station_name" name="station_name" autocomplete="off" placeholder="Station Name" value="<?php echo e(old('station_name', isset($data) ? $data->station_name : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('station_name')): ?>
                        <small id="station_name-error" class="error mt-2 text-danger" for="station_name">Please enter a Station Name</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address *</label>
                        <textarea class="form-control form-control-danger" id="address" name="address" autocomplete="off" placeholder="Station Address" aria-invalid="true"><?php echo e(old('address', isset($data) ? $data->address : '')); ?></textarea>
                        <?php if($errors->has('address')): ?>
                        <small id="address-error" class="error mt-2 text-danger" for="address">Please enter a Station Address</small>
                        <?php endif; ?>
                    </div>
                    <div class="row  mb-3">
                        <div class="col-md-6">
                            <label for="address">Latitude *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="lat" placeholder="Latitude" required="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="icon-lat"><i class="ri-map-pin-line"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address">Longitude *</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="long" placeholder="Longitude" required="">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="icon-long"><i class="ri-map-pin-line"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label for="file">Image</label>
                                <input type="file"  name="file" id="file"  class="form-control dropify" data-default-file="<?php echo e(old('file', isset($type) ? $type->file : '')); ?>" >
                            </div>
                            <div class="col-6">
                                <label for="file">Image</label>
                                <input type="file"  name="file" id="file"  class="form-control dropify" data-default-file="<?php echo e(old('file', isset($type) ? $type->file : '')); ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address *</label>
                        <textarea class="form-control form-control-danger" id="address" name="address" autocomplete="off" placeholder="Station Name" aria-invalid="true"><?php echo e(old('address', isset($data) ? $data->address : '')); ?></textarea>
                        <?php if($errors->has('address')): ?>
                        <small id="address-error" class="error mt-2 text-danger" for="address">Please enter a Station Address</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="model_id">Models *</label>
                        <select id="model_id" name="model_id" class="form-select select2" required>
                            <option disabled selected>Select Models</option>
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($model->id); ?>"><?php echo e($model->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if($errors->has('model_id')): ?>
                        <small id="model_id-error" class="error mt-2 text-danger" for="model_id">Please enter a Charger type</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="chassis_no">Chassis number</label>
                        <input type="text" class="form-control form-control-danger" id="chassis_no" name="chassis_no" autocomplete="off" placeholder="Chassis number" value="<?php echo e(old('chassis_no', isset($data) ? $data->chassis_no : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('chassis_no')): ?>
                        <small id="chassis_no-error" class="error mt-2 text-danger" for="chassis_no">Please enter a  Chassis number</small>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="registration_no">Registration number *</label>
                        <input required type="text" class="form-control form-control-danger" id="registration_no" name="registration_no" autocomplete="off" placeholder="Registration number" value="<?php echo e(old('registration_no', isset($data) ? $data->registration_no : '')); ?>" aria-invalid="true">
                        <?php if($errors->has('registration_no')): ?>
                        <small id="registration_no-error" class="error mt-2 text-danger" for="registration_no">Please enter a Registration number</small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">Status *</label>
                        <select id="ustatus" name="status" class="form-select" required>
                            <option value="1" selected>Active</option>
                            <option value="0" >Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="<?php echo e(route('administrative.vehicle')); ?>" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="col-4">
        <div class="card d-none brand-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Brand Info</h4>
                </div>
                <p class="card-title-desc"></p>
                <div id="brand">
                </div>
            </div>
        </div>
        <div class="card d-none charger-info">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Charger Info</h4>
                </div>
                <p class="card-title-desc"></p>
                <div id="charger">
                </div>
            </div>
        </div>
    </div>
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
        $('#brand_id').on('change',function(){
          var brand_id = $(this).val();
          if(brand_id){
            $.ajax({
                url: "<?php echo e(route('administrative.vehicle.brand-wise-model')); ?>",
                type:'GET',
                data: {
                    brand_id : brand_id
                },
                success: function(response) {
                    if(response.code == 200){
                        $('#model_id').html(response.list);
                        $('.brand-info').removeClass('d-none');
                        $('#brand').html(response.brand);
                    }else{
                        $('#model_id').html(response.list);
                        $('.brand-info').addClass('d-none');
                        $('#brand').html(response.brand);
                    }
                },
                error: function(xhr) {}
            });
          }else{
            $('#model_id').html("<option disabled selected>Select Models</option>");
          }
        })
        $('#model_id').on('change',function(){
          var model_id = $(this).val();
          if(model_id){
            $.ajax({
                url: "<?php echo e(route('administrative.vehicle.model-wise-charger')); ?>",
                type:'GET',
                data: {
                    model_id : model_id
                },
                success: function(response) {
                    if(response.code == 200){
                        $('#charger').html(response.data);
                        $('.charger-info').removeClass('d-none');
                    }else{
                        $('#charger').html(response.data);
                        $('.charger-info').addClass('d-none');
                    }
                },
                error: function(xhr) {}
            });
          }else{
            $('#model_id').html("<option disabled selected>Select Models</option>");
          }
        })
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\b-charging\resources\views/administrative/station/create.blade.php ENDPATH**/ ?>