<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['headerName', 'buttonName','col', 'name', 'existingImages' => [], 'fieldType' => 'history']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['headerName', 'buttonName','col', 'name', 'existingImages' => [], 'fieldType' => 'history']); ?>
<?php foreach (array_filter((['headerName', 'buttonName','col', 'name', 'existingImages' => [], 'fieldType' => 'history']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
$existingImages = isset($existingImages)?$existingImages->sortBy('serial'):''
?>
<div class="d-flex justify-content-between mb-1">
  <h4 class="card-title"><?php echo e($headerName); ?></h4>
  <div>
    <a id="add-image" class="btn btn-success btn-sm mb-2"><i class="mdi mdi-plus me-2"></i> <?php echo e($buttonName); ?></a>
  </div>
</div>

<div id="image-upload-container" class="row">
  <?php if(isset($existingImages) && count($existingImages) > 0): ?>
  <?php $__currentLoopData = $existingImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="<?php echo e($col); ?> mb-2 text-center image-item">
    <div class="image-preview">
      <input placeholder="Serial" type="number" name="<?php echo e($name); ?>[<?php echo e($index); ?>][order]" class="form-control mb-2 serial-input" value="<?php echo e($image->serial); ?>" min="1">
      <input type="hidden" name="<?php echo e($name); ?>[<?php echo e($index); ?>][id]" value="<?php echo e($image->id); ?>">
      <input type="file" data-id="<?php echo e($image->id); ?>" name="<?php echo e($name); ?>[<?php echo e($index); ?>][images]" class="form-control dropify" data-default-file="<?php echo e(asset($image->image_path)); ?>">
    </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</div>

<?php $__env->startPush('page-js'); ?>
<script>
  $(document).ready(function() {
    $('.dropify').dropify({
      messages: {
        'default': '',
        'replace': '',
        'remove': 'Remove',
      }
    });

    let imageCount = "<?php echo e(isset($existingImages) ? count($existingImages) : 0); ?>";

    function updateSerialNumbers() {
      $(".serial-input").each(function(index) {
        $(this).val(index + 1);
      });
      imageCount = $(".serial-input").length;
    }

    $("#add-image").click(function() {
      imageCount++;
      const newImageHtml = `
        <div class="<?php echo e($col); ?> mb-2 text-center image-item" style="display: none;">
          <div class="image-preview">
            <input placeholder="Serial" type="number" name="<?php echo e($name); ?>[${imageCount}][order]" class="form-control mb-2 serial-input" value="${imageCount}" min="1">
            <input required type="file" name="<?php echo e($name); ?>[${imageCount}][images]" class="form-control dropify">
            <button type="button" class="btn btn-danger btn-sm mt-2 remove-image">Remove</button>
          </div>
        </div>
      `;
      $("#image-upload-container").append(newImageHtml);
      $(".image-item").last().fadeIn(500); // Animation for adding an image

      // Reinitialize Dropify
      $('.dropify').dropify({
        messages: {
          'default': '',
          'replace': '',
          'remove': 'Remove',
        }
      });
    });

    $(document).on("click", ".remove-image", function() {
      const imageItem = $(this).closest(".<?php echo e($col); ?>");
      imageItem.fadeOut(500, function() {
        imageItem.remove(); // Remove after fade out
        updateSerialNumbers();
      });
    });

    $('.dropify').on('dropify.afterClear', function(event, element) {
      const fileInput = $(this);
      const fileName = $(this).attr('name');
      var id = $(this).attr('data-id');

      $.ajax({
        url: "<?php echo e(route('administrative.remove.file')); ?>",
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          id: id,
          field_name: fileName,
          field_type: '<?php echo e($fieldType); ?>'
        },
        success: function(response) {
          showToast({
            eleWrapper: '#hexa-toaster',
            msg: 'File removed successfully',
            theme: 'success',
            closeButton: true,
            autoClose: true
          });
          fileInput.closest(".<?php echo e($col); ?>").fadeOut(500, function() {
            $(this).remove();
            updateSerialNumbers();
          });
        },
        error: function(error) {
          showToast({
            eleWrapper: '#hexa-toaster',
            msg: 'Error removing file from server',
            theme: 'error',
            closeButton: true,
            autoClose: true
          });
        }
      });
    });
  });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\laragon\www\testing_by_fiz\Rony\motor-backend\resources\views/components/image-upload.blade.php ENDPATH**/ ?>