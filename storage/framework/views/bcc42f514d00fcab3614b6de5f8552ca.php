<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Service List</h4>
                    <a href="<?php echo e(route('administrative.club-service')); ?>" class="btn btn-light btn-sm">
                        <i class="ri-add-line"></i>
                    </a>
                </div>
                <div class="services">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card mb-2 icon-demo-content cursor-pointer add-service" data-service_id="<?php echo e($service->id); ?>">
                            <div class="card-body d-flex">
                                <span class="click-loader d-none loader_<?php echo e($service->id); ?>"></span>
                                <?php if($service->icon): ?>
                                <img src="<?php echo e($service->icon); ?>" alt="<?php echo e($service->title); ?>">
                                <?php else: ?>
                                <i class="ri-stack-fill"></i>
                                <?php endif; ?>
                                <div>
                                    <p class="text-primary mb-0"><?php echo e($service->title); ?></p>
                                    <p class="mb-0 text-danger"><strong><?php echo e(number_format($service->price)); ?></strong></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Edit Invoice</h4>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoice_list')): ?>
                        <a href="<?php echo e(route('administrative.invoice.list')); ?>" class="btn btn-primary btn-sm">
                            <i class="ri-list-check"></i>
                            Invoice List
                        </a>
                    <?php endif; ?>
                </div>
                <p class="card-title-desc"></p>
                <form class="needs-validation" novalidate action="<?php echo e(route('administrative.invoice.update',$previous_invoice->id)); ?> " method="POST" enctype="multipart/form-data">
                    <?php echo method_field('PUT'); ?>

                    <?php echo csrf_field(); ?>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <h5>Invoice No: <a href="<?php echo e(route('administrative.invoice.show',base64_encode($previous_invoice->id))); ?>"><?php echo e($previous_invoice->invoice_no); ?></a></h5>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label" for="member_id">Select Member<span class="text-danger">*</span></label>
                            <select id="member_id" name="member_id" class="form-select select2">
                                <option value="" selected>Select Member</option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php echo e($previous_invoice->user_id == $user->id?'selected':''); ?>><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php if($errors->has('member_id')): ?>
                            <small id="member_id-error" class="error mt-2 text-danger" for="member_id">Please select a Member</small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="table-responsive mb-3">
                        <table class="table table-sm table-centered mb-0 table-nowrap">
                            <thead class="bg-light">
                                <tr>
                                    <th>Action</th>
                                    <th style="width: 100px">Image</th>
                                    <th>Service Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th style="text-align: end;">Total</th>
                                </tr>
                            </thead>
                            <tbody id="table-content">
                                <?php if(count($invoices) > 0): ?>
                                    <?php $__currentLoopData = $invoices->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 90px;">
                                            <a href="javascript:void(0);" class="action-icon text-danger remove-invoice-item" data-row_id="<?php echo e($invoice->id); ?>"> <i class="mdi mdi-trash-can font-size-18"></i></a>
                                        </td>
                                        <td>
                                            <?php if($invoice->associatedModel->icon): ?>
                                            <img height="35x" width="35x" src="<?php echo e($invoice->associatedModel->icon); ?>" alt="<?php echo e($invoice->associatedModel->title); ?>">
                                            <?php else: ?>
                                            <i class="ri-stack-fill fa-2x"></i>
                                            <?php endif; ?>

                                        </td>
                                        <td>
                                            <h5 class="font-size-14 text-truncate">  <?php echo e($invoice->name); ?></h5>
                                        </td>
                                        <td>
                                           <?php echo e(number_format($invoice->price, 2)); ?>

                                        </td>
                                        <td width="150px">
                                            <div class="input-group">
                                                <button type="button" class="input-group-text update-invoice-qty"  data-row_id="<?php echo e($invoice->id); ?>" data-qty_update="-1"><i class="ri-subtract-fill"></i></button>
                                                <input type="text" class="form-control text-center" min="1" value="<?php echo e($invoice->quantity); ?>" readonly>
                                                <button type="button" class="input-group-text update-invoice-qty"  data-row_id="<?php echo e($invoice->id); ?>" data-qty_update="1"><i class="ri-add-fill"></i></button>
                                            </div>
                                        </td>
                                        <td style="text-align: end;"  width="150px">
                                            <strong><?php echo e(number_format(Cart::get($invoice->id)->getPriceSum(), 2)); ?></strong>
                                        </td>

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-start">
                                        <th scope="row" colspan="100%">
                                           Invoice total service quantity: <?php echo e($cartQty); ?>

                                        </th>
                                    </tr>
                                    <tr class="bg-light text-end">
                                        <th scope="row" colspan="5">
                                            Sub Total :
                                        </th>
                                        <td><strong><?php echo e($subTotal); ?></strong></td>
                                    </tr>
                                    <tr class="bg-light text-end">
                                        <th scope="row" colspan="2">
                                            Discount :
                                        </th>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="discountInput" min="0" max="100" value="<?php echo e($discount?$discount->getAttributes()['discount']:''); ?>">
                                                <select class="form-control" id="discountType">
                                                    <option value="">Select Type</option>
                                                    <option value="fixed" <?php echo e($discount?($discount->getAttributes()['discount_type'] == 'fixed'?'selected':''):''); ?>>Fixed</option>
                                                    <option value="percentage" <?php echo e($discount?($discount->getAttributes()['discount_type'] == 'percentage'?'selected':''):''); ?>>Percentage</option>
                                                </select>
                                            </div>
                                        </td>
                                        <th scope="row" colspan="2">
                                            Discount <?php echo e($discount?'('.($discount->getAttributes()['discount']).($discount->getType()=='percentage'?'%':'TK').')':''); ?> :
                                        </th>
                                        <td>
                                            <strong><?php echo e(number_format(($discount?$discount->getValue():0),2)); ?></strong>
                                        </td>
                                    </tr>
                                    <tr class="bg-light text-end">
                                        <th scope="row" colspan="2">
                                            Vat :
                                        </th>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control" min="0" id="vatInput" value="<?php echo e($vat?$vat->getAttributes()['vat']:''); ?>">
                                                <span class="input-group-text update-invoice-qty">%</span>
                                                <select class="form-control" id="vatType">
                                                    <option value="">Select Type</option>
                                                    <option value="inclusive" <?php echo e($vat?($vat->getAttributes()['vat_type'] == 'inclusive'?'selected':''):''); ?>>Inclusive</option>
                                                    <option value="exclusive" <?php echo e($vat?($vat->getAttributes()['vat_type'] == 'exclusive'?'selected':''):''); ?>>Exclusive</option>
                                                </select>
                                            </div>
                                        </td>
                                        <th scope="row" colspan="2">
                                            Vat <?php echo e($vat?('('.$vat->getAttributes()['vat'].'% '.$vat->getAttributes()['vat_type']).')':''); ?>:
                                        </th>
                                        <td>
                                            <strong><?php echo e(number_format(($vat?$vat->getValue():0),2)); ?></strong>
                                        </td>
                                    </tr>

                                    <tr class="bg-light text-end">
                                        <th scope="row" colspan="5">
                                            Invoice Total :
                                        </th>
                                        <td>
                                           <strong><?php echo e($cartTotal); ?></strong>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="100%">
                                            <label class="col-form-label" for="note">Invoice Note</label>
                                            <textarea  class="form-control" min="0" name="note" id="note"><?php echo e($previous_invoice->note); ?></textarea>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                <tr><td colspan="100%" class="text-center">Data Not Found ...</td></tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <div align="end">
                        <a href="<?php echo e(route('administrative.invoice.list')); ?>" class="ml-3 btn btn-light">Cancel</a>
                        <a href="<?php echo e(route('administrative.invoice.reset')); ?>" class="ml-3 btn btn-info">Reset</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-js'); ?>
<script>

	    $(document).on('click', '.add-service', function (e) {
			e.preventDefault();
			var service_id = $(this).data('service_id');
            $('.loader_'+service_id).removeClass('d-none');
			$.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
				url: "<?php echo e(route('administrative.invoice.add-service')); ?>",
				type:'POST',
				data: {
					service_id : service_id
				},
				success: function(data) {
                    $('.loader_'+service_id).addClass('d-none');
                    $('#table-content').html(data.html);
				},
			});
		});

        $(document).on('click', '.update-invoice-qty', function (e) {
			e.preventDefault();
			var row_id = $(this).data('row_id');
			var qty_update = $(this).data('qty_update');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "<?php echo e(route('administrative.invoice.update-item')); ?>",
				type:'POST',
				data: {
					row_id : row_id,
					qty_update : qty_update,
				},
				success: function(data) {
                    $('#table-content').html(data.html);
				},
			});
		});

        $(document).on('click', '.remove-invoice-item', function (e) {
			e.preventDefault();
			var row_id = $(this).data('row_id');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: "<?php echo e(route('administrative.invoice.remove-item')); ?>",
				type:'POST',
				data: {
					row_id : row_id
				},
				success: function(data) {
                    $('#table-content').html(data.html);
				},
			});
		});
        // discount ajax
        $(document).on('change', '#discountInput', function (e) {
			e.preventDefault();
			var discount = $(this).val();
			var discountType = $('#discountType').val();
            discountAdd(discount,discountType)
		});
        $(document).on('change', '#discountType', function (e) {
			e.preventDefault();
			var discountType = $(this).val();
			var discount = $('#discountInput').val();
            discountAdd(discount,discountType)
		});
        function discountAdd(discount,discountType){
            if(discount && discountType){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "<?php echo e(route('administrative.invoice.discount')); ?>",
                    type:'POST',
                    data: {
                        discount : discount,
                        discount_type : discountType,
                    },
                    success: function(data) {
                        $('#table-content').html(data.html);
                    },
                });
            }

        }
        // vat ajax
        $(document).on('change', '#vatInput', function (e) {
			e.preventDefault();
			var vat = $(this).val();
			var vatType = $('#vatType').val();
            vatAdd(vat,vatType)
		});
        $(document).on('change', '#vatType', function (e) {
			e.preventDefault();
			var vatType = $(this).val();
			var vat = $('#vatInput').val();
            vatAdd(vat,vatType)
		});
        function vatAdd(vat,vatType){
            if(vat && vatType){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "<?php echo e(route('administrative.invoice.vat')); ?>",
                    type:'POST',
                    data: {
                        vat : vat,
                        vat_type : vatType,
                    },
                    success: function(data) {
                        $('#table-content').html(data.html);
                    },
                });
            }

        }


	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/invoice/edit.blade.php ENDPATH**/ ?>