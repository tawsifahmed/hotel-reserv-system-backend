<style>
    .card-body{
        font-family: Arial, Helvetica, sans-serif;
    }
    .bg-light{
        background-color: #dddddd54 !important;
        color: #000 !important;
    }
    .tables{
        width: 100%;
        border: 0;
    }
    .tables tr td{
       padding: 5px;
       border: 0;
    }
    .text-right{
        text-align: right;
    }

</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid invoice-container">
                    <!-- Header -->
                    <table class="tables">
                       <tr>
                        <td>
                            <img id="logo" height="80px" class="d-none" src="<?php echo e('./assets/images/logo-dashboard.png'); ?>" alt="Club JCI" />
                        </td>
                        <td class="text-right">
                            <h4 style="font-size: 25px;font-style: italic;font-weight: bold;">INVOICE</h4>
                        </td>
                       </tr>
                    </table>
                    <hr>
                    <table class="tables">
                        <tr>
                         <td>
                            <strong>Date:</strong> <?php echo e(date('d M, Y',strtotime($invoice->invoice_date))); ?>

                         </td>
                         <td class="text-right">
                            <strong>Invoice No:</strong> <?php echo e($invoice->invoice_no); ?>

                         </td>
                        </tr>
                    </table>
                    <hr>
                    <table class="tables">
                        <tr>
                         <td>
                            <strong>Invoiced To:</strong>
                            <?php if($invoice->user): ?>
                            <address>
                               <strong>Name:</strong> <?php echo e($invoice->user->name); ?><br />
                               <strong>Mobile No:</strong> <?php echo e($invoice?$invoice->profile->mobile_number:''); ?><br />
                               <strong>Email:</strong> <?php echo e($invoice?$invoice->user->email:''); ?><br />
                               <strong>Address:</strong> <?php echo e($invoice?$invoice->profile->present_address:''); ?><br />
                            </address>
                            <?php else: ?>
                            Invoice for Restaurant
                            <?php endif; ?>
                         </td>
                         <td class="text-right">
                            <strong>Invoiced Information:</strong>
                            <address>
                                <?php if($invoice->user): ?>
                                <strong>Membership No:</strong> <?php echo e($invoice?$invoice->profile->membership_no:''); ?><br />
                                <?php endif; ?>
                                <strong>Invoice Status:</strong>
                                <?php echo e($invoice->status == 0?'Unpaid':''); ?>

                                <?php echo e($invoice->status == 1?'Partial':''); ?>

                                <?php echo e($invoice->status == 2?'Paid':''); ?><br />
                                <strong>Total Paid:<?php echo e(number_format($invoice->total_paid,2)); ?></strong><br />
                                <strong>Total Due:<?php echo e(number_format($invoice->total_due,2)); ?></strong>

                            </address>

                         </td>
                        </tr>
                    </table>
                    <table class="tables">
                        <thead>
                          <tr class="bg-light">
                            <td class="col-3"><strong>#SL</strong></td>
                            <td class="col-4"><strong>Service Description</strong></td>
                            <td class="col-2 text-right"><strong>Rate</strong></td>
                            <td class="col-1 text-right"><strong>QTY</strong></td>
                            <td class="col-2 text-right"><strong>Amount</strong></td>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$invo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td class="col-1"><?php echo e($key+1); ?></td>
                                <td class="col-4 text-1"><?php echo e($invo->service_name); ?></td>
                                <td class="col-2  text-right"><?php echo e(number_format($invo->unit_price,2)); ?></td>
                                <td class="col-1  text-right"><?php echo e($invo->qty); ?></td>
                                <td class="col-2  text-right"><strong><?php echo e(number_format($invo->total_price,2)); ?></strong></td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <tr class="bg-light">
                                <td rowspan="5" colspan="2">
                                    <strong>Note:</strong>
                                    <address>
                                        <?php echo e($invoice->note); ?>

                                    </address>
                                </td>
                                <td class="text-right" colspan="2"><strong>Sub Total:</strong></td>
                                <td class="col-sm-2 text-right"><?php echo e(number_format($invoice->sub_total,2)); ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td class="text-right" colspan="2"><strong>Discount (<?php echo e($invoice->discount); ?><?php echo e($invoice->discount_type=="fixed"?'TK':''); ?><?php echo e($invoice->discount_type=="percentage"?'%':''); ?>):</strong></td>
                                <td class="col-sm-2 text-right"><?php echo e(number_format($invoice->discount_amount,2)); ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td class="text-right" colspan="2"><strong>Tax (<?php echo e($invoice->vat); ?>% <?php echo e($invoice->vat_type); ?>):</strong></td>
                                <td class="col-sm-2 text-right"><?php echo e(number_format($invoice->vat_amount,2)); ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td class="text-right" colspan="2"><strong>Service Charge (<?php echo e($invoice->service_charge); ?>%):</strong></td>
                                <td class="col-sm-2 text-right"><?php echo e(number_format($invoice->service_charge_amount,2)); ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td class="text-right" colspan="2"><strong>Total:</strong></td>
                                <td class="col-sm-2 text-right"><strong><?php echo e(number_format($invoice->invoice_total,2)); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if(count($invoice->payment)>0): ?>
                    <br>
                    <p style="margin-bottom:10px"><strong>Payment Information</strong></p>
                    <table class="tables border-bottom">
                        <thead>
                          <tr class="bg-light">
                            <td class="col-1"><strong>#SL</strong></td>
                            <td class="col-1"><strong>Tnx Id</strong></td>
                            <td class="col-1"><strong>Payment Type</strong></td>
                            <td class="col-1"><strong>Transaction Info</strong></td>
                            <td class="col-2 text-right"><strong>Amount</strong></td>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $invoice->payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <tr>
                                <td class="col-1"><?php echo e($key+1); ?></td>
                                <td class="col-1"><?php echo e($pay->tnx_id); ?></td>
                                <td class="col-1"><span class="text-capitalize"><?php echo e($pay->payment_type); ?></span></td>
                                <td class="col-1">
                                   <?php if($pay->payment_type == 'bank'): ?>
                                       <?php echo e($pay->bank_name?$pay->bank_name.',':'-'); ?>

                                       <?php echo e($pay->account_name?$pay->account_name.',':''); ?>

                                       <?php if($pay->cheque_no): ?><strong>Cheque no:</strong> <?php echo e($pay->cheque_no); ?><?php endif; ?>
                                    <?php elseif($pay->payment_type == 'card'): ?>
                                       <strong>Tnx ID:</strong> <?php echo e($pay->card_number); ?>

                                    <?php elseif($pay->payment_type == 'mobile-banking'): ?>
                                       <?php echo e($pay->mobile_account_no); ?>,
                                       <strong>Tnx ID:</strong> <?php echo e($pay->mobile_transaction_id); ?>

                                    <?php else: ?>
                                        <?php echo e('-'); ?>

                                    <?php endif; ?>
                                </td>
                                <td class="text-right"><?php echo e(number_format($pay->amount,2)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-light">
                                <td class="text-right" colspan="4">Total:</td>
                                <td class="text-right"><strong><?php echo e(number_format($invoice->total_paid,2)); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <footer class="text-center mt-4">
                        <p class="text-1">This is computer generated receipt and does not require physical signature.</p>
                    </footer>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<?php /**PATH D:\laragon\www\club-management-system\resources\views/administrative/invoice/pdf/invoice.blade.php ENDPATH**/ ?>