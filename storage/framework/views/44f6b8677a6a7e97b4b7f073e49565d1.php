<script>
  <?php if ($message = Session::get('success')) : ?>
     toastr.success('<?php echo " $message" ?>');
  <?php endif ?>
  <?php if ($message = Session::get('error')) : ?>
     toastr.error('<?php echo " $message" ?>');
  <?php endif ?>
  <?php if ($message = Session::get('warning')) : ?>
     toastr.warning('<?php echo " $message" ?>');
  <?php endif ?>
  <?php if ($message = Session::get('info')) : ?>
     toastr.info('<?php echo " $message" ?>');
  <?php endif ?>
  toastr.options.closeButton = true;
  toastr.options.closeHtml = '<button><i class="ri-close-line"></i></button>';
</script>
<?php /**PATH D:\laragon\www\b-charging\resources\views/administrative/layouts/partial/_toaster.blade.php ENDPATH**/ ?>