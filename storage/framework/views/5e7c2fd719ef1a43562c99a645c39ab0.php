<p>Dear <?php echo e($data['name']); ?>,</p>
<p><?php echo e($data['message']); ?></p>
<?php if(isset($data['link'])): ?>
<strong><a href="<?php echo e($data['link']); ?>"><?php echo e($data['link']); ?></a></strong>
<?php endif; ?>
<p>
    Should you have any questions, feel free to reach out.
</p>
<p>
    Best regards,
</p>
<p>
    B Charge
</p>
<?php /**PATH D:\laragon\www\club-management-system\resources\views/emails/invoice.blade.php ENDPATH**/ ?>
