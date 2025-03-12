<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('administrative.layouts.partial._breadcrump', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Create Payment for: <a href="<?php echo e(route('administrative.invoice.show',base64_encode($invoice->id))); ?>"><?php echo e($invoice->invoice_no); ?></a></h4>
                    <div>

                    </div>
                </div>
                <p class="card-title-desc"></p>
                <div class="row">
                    <div class="col-md-4">
                        <?php if($invoice->user): ?>
                        <h4 class="card-title">Member Information </h4>
                        <table>
                            <tr>
                                <th>Member Code</th><td>:</td><td><?php echo e($invoice?$invoice->profile->membership_no:''); ?></td>
                            </tr>
                            <tr>
                                <th>Member Name</th><td>:</td><td><?php echo e($invoice?$invoice->user->name:''); ?></td>
                            </tr>
                            <tr>
                                <th>Member Email</th><td>:</td><td><?php echo e($invoice?$invoice->user->email:''); ?></td>
                            </tr>
                            <tr>
                                <th>Member Mobile</th><td>:</td><td><?php echo e($invoice?$invoice->profile->mobile_number:''); ?></td>
                            </tr>
                            <tr>
                                <th>Member Address</th><td>:</td><td><?php echo e($invoice?$invoice->profile->present_address:''); ?></td>
                            </tr>
                        </table>
                        <hr>
                        <?php endif; ?>
                        <h4 class="card-title">Invoice Information  </h4>
                        <table class="mb-3">
                            <tr>
                                <th>Invoice No</th><td>:</td><td><?php echo e($invoice->invoice_no); ?> (<?php echo e(date('d M, Y',strtotime($invoice->invoice_date))); ?> )</td>
                            </tr>
                            <tr>
                                <th>Invoice Status</th><td>:</td><td>
                                    <strong> <?php echo e($invoice->status == 0?'Unpaid':''); ?>

                                    <?php echo e($invoice->status == 1?'Partial':''); ?>

                                    <?php echo e($invoice->status == 2?'Paid':''); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Invoice Total</th><td>:</td><td><strong> <?php echo e(number_format($invoice->invoice_total,2)); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Total Paid</th><td>:</td><td><strong class="text-success"> <?php echo e(number_format($total_paid,2)); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Total Due</th><td>:</td><td><strong class="text-warning"> <?php echo e(number_format($total_due,2)); ?></strong></td>
                            </tr>
                        </table>

                        <a href="<?php echo e(route('administrative.invoice.pdf',$invoice->id)); ?>" class="btn btn-sm btn-primary btn-rounded">Invoice Download <i class="mdi mdi-download ms-2"></i></a>
                    </div>
                    <div class="col-md-8">
                        <form class="needs-validation" novalidate action="<?php echo e(route('administrative.payment.store')); ?> " method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="" id="invoice_id" name="invoice_id" value="<?php echo e($invoice->id); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="col-form-label">Payment Type<span class="text-danger">*</span></label>
                                        <div class="">
                                            <label class="radio-inline">
                                                <div class="form-check" style="margin-right: 15px;">
                                                    <input class="form-check-input" checked <?php echo e(old('payment_type')=='cash'?'checked':''); ?> value="cash" type="radio" name="payment_type"
                                                        id="cash_payment_type">
                                                    <label class="form-check-label" for="cash_payment_type">
                                                        Cash
                                                    </label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="form-check" style="margin-right: 15px;">
                                                    <input class="form-check-input" <?php echo e(old('payment_type')=='bank'?'checked':''); ?>  value="bank"  type="radio" name="payment_type"
                                                        id="bank_payment_type">
                                                    <label class="form-check-label" for="bank_payment_type">
                                                        Bank
                                                    </label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="form-check" style="margin-right: 15px;">
                                                    <input class="form-check-input" <?php echo e(old('payment_type')=='card'?'checked':''); ?>  value="card"  type="radio" name="payment_type"
                                                        id="card_payment_type">
                                                    <label class="form-check-label" for="card_payment_type">
                                                        Card
                                                    </label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="form-check" style="margin-right: 15px;">
                                                    <input class="form-check-input" <?php echo e(old('payment_type')=='mobile-banking'?'checked':''); ?> value="mobile-banking" type="radio" name="payment_type"
                                                        id="mobile_banking_payment_type">
                                                    <label class="form-check-label" for="mobile_banking_payment_type">
                                                        Mobile Banking
                                                    </label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="bank-field form-group mb-3">
                                        <label for="bank_name">Bank Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-danger" id="bank_name" name="bank_name" autocomplete="off" placeholder="Bank name" value="<?php echo e(old('bank_name')); ?>" aria-invalid="true">
                                        <?php if($errors->has('bank_name')): ?>
                                        <small id="bank_name-error" class="error mt-2 text-danger" for="bank_name">Please enter a bank name</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="bank-field form-group mb-3">
                                        <label for="account_name">Account Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-danger" id="account_name" name="account_name" autocomplete="off" placeholder="Account name" value="<?php echo e(old('account_name')); ?>" aria-invalid="true">
                                        <?php if($errors->has('account_name')): ?>
                                        <small id="account_name-error" class="error mt-2 text-danger" for="account_name">Please enter a Account name</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="bank-field form-group mb-3">
                                        <label for="cheque_no">Cheque No <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-danger" id="cheque_no" name="cheque_no" autocomplete="off" placeholder="Cheque no" value="<?php echo e(old('cheque_no')); ?>" aria-invalid="true">
                                        <?php if($errors->has('cheque_no')): ?>
                                        <small id="cheque_no-error" class="error mt-2 text-danger" for="cheque_no">Please enter a Cheque no</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mobil-banking-field form-group mb-3">
                                        <label for="mobile_account_no">Mobile Account no <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-danger" id="mobile_account_no" name="mobile_account_no" autocomplete="off" placeholder="Account no" value="<?php echo e(old('mobile_account_no')); ?>" aria-invalid="true">
                                        <?php if($errors->has('mobile_account_no')): ?>
                                        <small id="mobile_account_no-error" class="error mt-2 text-danger" for="mobile_account_no">Please enter a Account no</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="mobil-banking-field form-group mb-3">
                                        <label for="mobile_transaction_id">Transaction Id<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-danger" id="mobile_transaction_id" name="mobile_transaction_id" autocomplete="off" placeholder="Transaction id" value="<?php echo e(old('mobile_transaction_id')); ?>" aria-invalid="true">
                                        <?php if($errors->has('mobile_transaction_id')): ?>
                                        <small id="mobile_transaction_id-error" class="error mt-2 text-danger" for="mobile_transaction_id">Please enter a Transaction id</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-number-field form-group mb-3">
                                        <label for="card_number">Card Number<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control form-control-danger" id="card_number" name="card_number" autocomplete="off" placeholder="Card number" value="<?php echo e(old('card_number')); ?>" aria-invalid="true">
                                        <?php if($errors->has('card_number')): ?>
                                        <small id="card_number-error" class="error mt-2 text-danger" for="card_number">Please enter a Card number</small>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="amount">Payment Amount <span class="text-danger">*</span></label>
                                        <input required type="number" class="form-control form-control-danger" id="amount" name="amount" autocomplete="off" placeholder="Pay Amount" value="<?php echo e(old('amount')); ?>" min="1" max="<?php echo e($total_due); ?>" aria-invalid="true">
                                        <small class="error mt-2 text-info">Invoice Due Amount is : <strong><?php echo e(number_format($total_due,2)); ?></strong> </small>

                                        <?php if($errors->has('amount')): ?>
                                        <small id="amount-error" class="error mt-2 text-danger" for="amount">Please enter a Payment Amount</small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="file">Payment File</label>
                                        <input type="file"  name="file"  class="form-control dropify" data-default-file="<?php echo e(old('file')); ?>" >
                                    </div>
                                </div>
                            </div>
                             <a href="<?php echo e(route('administrative.payment.list')); ?>" class="btn btn-light">Cancel</a>
                             <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>

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
        $('.bank-field').addClass('d-none');
        $('.mobil-banking-field').addClass('d-none');
        $('.card-number-field').addClass('d-none');
        var radio = $('input[type=radio][name="payment_type"]:checked').val();
        paymentType(radio)
        $('input[type=radio][name=payment_type]').change(function() {
            paymentType(this.value)
        });
        function paymentType(value){
            if (value == 'cash') {
                $('.bank-field').addClass('d-none');
                $('.mobil-banking-field').addClass('d-none');
                $('.card-number-field').addClass('d-none');
            }else if (value == 'bank') {
                $('.bank-field').removeClass('d-none');
                $('.mobil-banking-field').addClass('d-none');
                $('.card-number-field').addClass('d-none');
            }else if (value == 'card') {
                $('.bank-field').addClass('d-none');
                $('.mobil-banking-field').addClass('d-none');
                $('.card-number-field').removeClass('d-none');
            }else if (value == 'mobile-banking') {
                $('.bank-field').addClass('d-none');
                $('.mobil-banking-field').removeClass('d-none');
                $('.card-number-field').addClass('d-none');
            }else{
                $('.bank-field').addClass('d-none');
                $('.mobil-banking-field').addClass('d-none');
                $('.card-number-field').addClass('d-none');
            }
        }
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('administrative.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/payment/create.blade.php ENDPATH**/ ?>