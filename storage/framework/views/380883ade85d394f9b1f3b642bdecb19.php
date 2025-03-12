<?php $__env->startSection('page-css'); ?>
    <style>
        .tox-notifications-container {
            display: none;
        }
        .input-group-text{
            min-width: 130px;
        }
        .remove-image{
            position: absolute;
            top: 0;
            right: 12px;
            z-index: 1;
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
                    <a  class="btn btn-light waves-effect waves-light">
                        Classification <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-light waves-effect waves-light">
                        Feature <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                    <a class="btn btn-success waves-effect waves-light">
                        Image <i class="ri-arrow-right-line align-middle ms-2"></i>
                    </a>
                </div>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.product.store')); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" class="form-control" name="type" value="image">
                    <input type="hidden" class="form-control" name="product_id" value="<?php echo e($id); ?>">
                    <label for="image">Upload Product Image</label>
                    <div id="image-container" class="row">
                        <div class="col-6 form-group mb-3">
                            <input type="file" name="image[]" id="image" class="form-control dropify" data-default-file="<?php echo e(old('logo', isset($type) ? $type->logo : '')); ?>">
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="button" id="add-image" class="btn btn-success">Add More</button>
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
        document.getElementById('add-image').addEventListener('click', function () {
            let newInput = `
                <div class="col-6 form-group mb-3">
                    <input type="file" name="image[]" class="form-control dropify">
                    <button type="button" class="btn btn-danger remove-image"><i class="ri-close-line"></i></button>
                </div>`;
            document.getElementById('image-container').insertAdjacentHTML('beforeend', newInput);

            // Initialize Dropify for new elements
            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': '',
                    'remove':  'Remove',
                }
            });
        });

        // Remove Image Field
        document.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-image')) {
                event.target.closest('.form-group').remove();
            }
        });


    })
    $(document).ready(function () {
    $('.dropify').dropify();

    $('#image').on('change', function () {
        let formData = new FormData();
        formData.append('image', this.files[0]);
        formData.append('_token', $('input[name="_token"]').val());

            $.ajax({
                url: "<?php echo e(route('administrative.product.productImage')); ?>", // Update with your route
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        alert("Image uploaded successfully!");
                    } else {
                        alert("Image upload failed!");
                    }
                },
                error: function (xhr) {
                    alert("Something went wrong!");
                }
            });
        });
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/administrative/product/images.blade.php ENDPATH**/ ?>