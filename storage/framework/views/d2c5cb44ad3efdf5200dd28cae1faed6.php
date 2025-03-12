
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: "Ubuntu", sans-serif;
        }
        .page {
          width: 191mm;
          background: #fff;
          box-sizing: border-box;
          position: relative;
          overflow: hidden;
          font-size: 14px;
            margin-left: auto;
            margin-right: auto;
        }
        .cell {
            background-color: #f5f8f8;
            border-radius: 5px;
            border: 1px solid #dbdbdb;
            margin: 0 2px;
            height: 22px;
            width: 22px;
            float: left;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            line-height: 20px
        }
        .cell-phone {
            background-color: #f5f8f8;
            border-radius: 5px;
            border: 1px solid #dbdbdb;
            margin: 0 2px;
            height: 22px;
            width: 15px;
            float: left;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            line-height: 20px
        }
        .cell-gap {
            border-radius: 5px;
            margin: 0 2px;
            height: 22px;
            width: 10px;
            float: left;
            text-align: center;
            font-weight: 600;
            line-height: 20px
        }
        .divider {
            font-weight: 400;
            width: 8px;
            background-color: #023b67;
            height: 1px !important;
            margin: 0 4px;
        }
        .radio-btn{
            height: 12px;
            width: 12px;
            float: left;
            border-radius: 16px;
            border: 3px solid #023b67;
            margin-top: 4px;
        }
        .radio-btn.active{
            background: #023b67;
        }
        .radio-label{
            margin-left: 23px;
            color: #414445;
            font-weight: 600;
            line-height: 22px;
            font-size: 12px;
        }
        .float-left{
            float: left;
            width: auto
        }

        .border {
            border: 1px solid transparent !important;
            border-bottom: 1px solid #e4e4e4 !important;
            height: 25px;
            width: 100%;
            padding-left: 20px
        }
        label{
            margin-bottom: 0px;
        }
        .education {
            width: 100%;
            border: 1px solid rgb(161, 161, 161);
            border-collapse: collapse;
        }

        .education th {
            border: 1px solid rgb(161, 161, 161);
            border-collapse: collapse;
            padding: 5px;
            font-weight: 400;
            text-align: center
        }

        .education td {
            border: 1px solid rgb(161, 161, 161);
            border-collapse: collapse;
            padding: 5px !important;
            text-align: center
        }
        .heading{
            font-family: "Ubuntu", sans-serif!important;
            padding:15px 25px 15px;
            text-align:center;
            font-weight: 600;
            color: #023b67;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="page">
          <table style="width: 100%">
            <tr>
                <td style="width:20%">
                    <img  src="<?php echo e($profile->logo); ?>" alt=""  style="height: 120px;width: auto" />
                </td>
                <td style="text-align:center;width:60%" class="details">
                    <img  src="<?php echo e($profile->pdf_header); ?>" alt=""  style="height: 120px;width: auto;" />
                </td>
                <td style="width:20%">
                    <img src="<?php echo e($profile->thumbnail); ?>" alt="" style="height: 150px; width: 130px;border: 1px solid #ededed;padding:5px" />
                </td>
            </tr>
          </table>

          <table style="width: 100%;margin-top:30px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Membership No</label>
                    <div class="cell-gap"></div>
                    <?php
                        $m_no = str_split($profile->membership_no);
                        foreach ($m_no as $no) {
                            echo "<div class='cell'>$no</div>";
                        }
                    ?>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <label style="float: left;">Date</label>
                    <div class="cell-gap"></div>
                    <?php
                        $date = str_split($profile->created_at->format('dmY'));
                        foreach ($date as $key=>$da) {
                            if($key == 1){
                                echo "<div class='cell'>$da</div><div class='cell-gap'>-</div>";
                            }elseif ($key == 3) {
                                echo "<div class='cell'>$da</div><div class='cell-gap'>-</div>";
                            }else{
                                echo "<div class='cell'>$da</div>";
                            }
                        }
                    ?>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Type of Membership</label>
                    <div class="cell-gap"></div>
                    <?php $__currentLoopData = $profile->type_of_membership; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="float-left">
                            <div class="radio-btn <?php echo e($type->id == $profile->type_of_member?'active':''); ?>"></div>
                            <div class="radio-label ">
                                <?php echo e($type->title); ?>

                            </div>
                        </div>
                        <div class="cell-gap"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:45px">
                    <label>Name</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->name); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width:93px">
                    <label>Date of Birth</label>
                </td>
                <td>
                    <div class="border"><?php echo e(date('d M, Y',strtotime($profile->date_of_birth))); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width:90px">
                    <label>NID Number</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->nid_number); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px;margin-bottom:15px">
            <tr>
                <td style="width:120px">
                    <label>Passport Number</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->passport_number); ?></div>
                </td>
            </tr>
          </table>
          <label><strng>Educational Background</strng></label>
          <table class="education" style="margin-top:10px;">
            <thead>
                <th style="width: 40%">Name of Institute</th>
                <th style="width: 20%">Year</th>
                <th style="width: 40%">Degree/Qualification Obtained</th>
            </thead>
            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $profile->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td height="20"><?php echo e($education->name_of_institution); ?></td>
                    <td height="20"><?php echo e($education->year); ?></td>
                    <td height="20"><?php echo e($education->degree); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td height="20" colspan="3">Educational Background Not Found</td>
                </tr>
                <?php endif; ?>
            </tbody>
          </table>
          <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Marital Status</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->marrital_status=='married'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Married
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->marrital_status=='single'?'active':''); ?>"></div>
                        <div class="radio-label">
                            Single
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <label style="float: left;">Date of Anniversary</label>
                    <div class="cell-gap"></div>
                    <?php
                        $date = $profile->date_of_anniversary;
                        if($date){
                            $dates = str_split(date('dmY',strtotime($date)));
                            foreach ($dates as $key=>$da) {
                                if($key == 1){
                                    echo "<div class='cell'>$da</div><div class='cell-gap'>-</div>";
                                }elseif ($key == 3) {
                                    echo "<div class='cell'>$da</div><div class='cell-gap'>-</div>";
                                }else{
                                    echo "<div class='cell'>$da</div>";
                                }
                            }
                        }else{
                            echo '<div class="cell"></div>
                            <div class="cell"></div>
                            <div class="cell-gap">-</div>
                            <div class="cell"></div>
                            <div class="cell"></div>
                            <div class="cell-gap">-</div>
                            <div class="cell"></div>
                            <div class="cell"></div>
                            <div class="cell"></div>
                            <div class="cell"></div>';
                        }
                    ?>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px;margin-bottom:15px">
            <tr>
                <td style="width:130px">
                    <label>No. of Dependents</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->no_of_dependents); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px;margin-bottom:15px">
            <tr>
                <td style="width:102px">
                    <label>Father s Name</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->father_name); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px;margin-bottom:15px">
            <tr>
                <td style="width:108px">
                    <label>Mother s Name </label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->mother_name); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Mobile Number</label>
                    <div class="cell-gap"></div>
                    <?php
                        $mobile_number = $profile->mobile_number;
                        if($mobile_number){
                            $m_no = str_split($mobile_number);
                            foreach ($m_no as $no) {
                                echo "<div class='cell-phone'>$no</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                    ?>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <label style="float: left;">Phone Number</label>
                    <div class="cell-gap"></div>
                    <?php
                        $phone_number = $profile->phone_number;
                        if($phone_number){
                            $p_no = str_split($phone_number);
                            foreach ($p_no as $pno) {
                                echo "<div class='cell-phone'>$pno</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                    ?>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:60px">
                    <label>Email ID</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->email_id); ?></div>
                </td>
            </tr>
          </table>

          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:120px">
                    <label>Present Address</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->present_address); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:138px">
                    <label>Permanent Address</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->permanent_address); ?></div>
                </td>
            </tr>
          </table>
          <br>
          <div style="page-break-before:always;"> </div>
          <p class="heading">
            OCCUPATION
          </p>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Occupation Type</label>
                    <div class="cell-gap"></div>
                    <?php $__currentLoopData = $profile->occupation_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($otype->id == $profile->occupation_type?'active':''); ?>"></div>
                        <div class="radio-label ">
                            <?php echo e($otype->title); ?>

                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
          </table>

          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:160px">
                    <label>If Other, please specify</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->other_occupation_type); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:87px">
                    <label>Designation</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->designation); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:105px">
                    <label>Office Address</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->office_address); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:15px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Office Phone</label>
                    <div class="cell-gap"></div>
                    <?php
                        $office_phone = $profile->office_phone;
                        if($office_phone){
                            $op_no = str_split($office_phone);
                            foreach ($op_no as $opno) {
                                echo "<div class='cell-phone'>$opno</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                    ?>

                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <div class="cell-gap"></div>
                    <label style="float: left;">Office Mobile</label>
                    <div class="cell-gap"></div>
                    <?php
                        $office_mobile = $profile->office_mobile;
                        if($office_mobile){
                            $om_no = str_split($office_mobile);
                            foreach ($om_no as $omno) {
                                echo "<div class='cell-phone'>$omno</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                    ?>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:105px">
                    <label>Office Email ID</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->office_email_id); ?></div>
                </td>
            </tr>
          </table>

          <br>
          <p class="heading">
            MEMBERSHIP DETAILS
          </p>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Membership in JCI</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->membership_in_jic == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->membership_in_jic == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <small>If yes, input details</small>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:128px">
                    <label>Local Organization</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->chapter_name); ?></div>
                </td>
                <td style="width:164px">
                    <label> Highest Position Served</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->highest_position_served); ?></div>
                </td>
                <td style="width:34px">
                    <label> Year</label>
                </td>
                <td style="width: 60px">
                    <div class="border" ><?php echo e($profile->highest_position_served_year); ?></div>
                </td>
            </tr>
          </table>

          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Are you a JCI Bangladesh Foundation Member?</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->is_foundation_member == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->is_foundation_member == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <small>If yes, please input Membership No.</small>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:190px">
                    <label>Foundation Membership No.</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->foundation_membership_no); ?></div>
                </td>
            </tr>
          </table>

          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Has your membership application ever been rejected<br>
                        by any other club/ institution?</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->club_rejection == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->club_rejection == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:132px">
                    <label>If yes, input details</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->club_rejection_details); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Have you ever been punished for any criminal offence?</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->criminal_offence == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->criminal_offence == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Car Owned</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->car_own == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->car_own == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:214px">
                    <label>If Yes, Car Registration Number</label>
                </td>
                <td>
                    <div class="border"><?php echo e($profile->car_registrtion_number); ?></div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Car Owned</label>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->car_own == 'yes'?'active':''); ?>"></div>
                        <div class="radio-label ">
                            Yes
                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($profile->car_own == 'no'?'active':''); ?>"></div>
                        <div class="radio-label">
                            No
                        </div>
                    </div>
                </td>
            </tr>
          </table>
          <table style="width: 100%;margin-top:10px">
            <tr>
                <td style="width:100%;height:30px">
                    <label style="float: left;">Car Ownership Type</label>
                    <div class="cell-gap"></div>
                    <?php $__currentLoopData = $profile->car_ownership_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_ownership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="float-left">
                        <div class="radio-btn <?php echo e($car_ownership->id == $profile->car_ownership_type?'active':''); ?>"></div>
                        <div class="radio-label ">
                            <?php echo e($car_ownership->title); ?>

                        </div>
                    </div>
                    <div class="cell-gap"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
          </table>

        <br>
        <div style="page-break-before:always;"> </div>
          <p class="heading">
            MEMBERSHIP DETAILS OF OTHER CLUB/ASSOCIATION/FOUNDATION
          </p>
            <table style="width: 100%">
                <thead>
                    <th style="text-align: start; width: 30%;font-size:12px">Club Name</th>
                    <th style="text-align: start; width: 30%;font-size:12px">Membership Number</th>
                    <th style="text-align: start; width: 30%;font-size:12px">
                        Type of Membership/Position Held
                    </th>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $profile->otherclub; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $othclub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div style="border: 1px solid rgb(156, 156, 156);margin-right: 10px;min-height: 25px;padding:2px 8px">
                                <?php echo e($othclub->name); ?>

                            </div>
                        </td>
                        <td>
                            <div style="border: 1px solid rgb(156, 156, 156);margin-right: 10px;min-height: 25px;padding:2px 8px">
                                <?php echo e($othclub->membership_number); ?>

                            </div>
                        </td>
                        <td>
                            <div style="border: 1px solid rgb(156, 156, 156);margin-right: 10px;min-height: 25px;padding:2px 8px">
                                <?php echo e($othclub->type_of_membership); ?>

                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td height="20" colspan="3">Membership Type Not Found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <br>
            <p class="heading">
                SPOUSE DETAILS
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width:43px">
                        <label>Name</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->spouse_name); ?></div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;margin-top:20px">
                <tr>
                    <td style="width:100%;height:30px">
                        <label style="float: left;">Date of Birth</label>
                        <div class="cell-gap"></div>
                        <?php if($profile->spouse_date_of_birth): ?>
                        <?php
                            $spdob = date('dmY',strtotime($profile->spouse_date_of_birth));
                            $spdate = str_split($spdob);
                            foreach ($spdate as $key=>$spda) {
                                if($key == 1){
                                    echo "<div class='cell'>$spda</div><div class='cell-gap'>-</div>";
                                }elseif ($key == 3) {
                                    echo "<div class='cell'>$spda</div><div class='cell-gap'>-</div>";
                                }else{
                                    echo "<div class='cell'>$spda</div>";
                                }
                            }
                        ?>
                        <?php endif; ?>

                        <div class="cell-gap"></div>
                        <label style="float: left;">Mobile Number</label>
                        <div class="cell-gap"></div>
                        <?php
                        $spouse_phn = $profile->spouse_mobile_no;
                        if($spouse_phn){
                            $phone = str_split($spouse_phn);
                            foreach ($phone as $phn) {
                                echo "<div class='cell-phone'>$phn</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;margin-top:10px">
                <tr>
                    <td style="width:43px">
                        <label>NID</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->spouse_nid); ?></div>
                    </td>
                </tr>
            </table>

            <br>
            <p class="heading">
                INFORMATION OF NOMIMEE
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width:43px">
                        <label>Name</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->nominee_name); ?></div>
                    </td>
                    <td style="width: 50px">
                    </td>
                    <td style="width:63px">
                        <label>Relationship</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->nominee_relationship); ?></div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;margin-top:20px">
                <tr>
                    <td style="width:43px">
                        <label>Address</label>
                    </td>
                    <td style="width: 30%">
                        <div class="border"><?php echo e($profile->nominee_address); ?></div>
                    </td>
                    <td style="width: 50px"></td>
                    <td>
                        <label style="float: left;">Mobile Number</label>
                        <div class="cell-gap"></div>
                        <?php
                        $nominee_phone = $profile->nominee_phone;
                        if($nominee_phone){
                            $nophone = str_split($nominee_phone);
                            foreach ($nophone as $phne) {
                                echo "<div class='cell-phone'>$phne</div>";
                            }
                        }else{
                            echo '<div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>
                                <div class="cell-phone"></div>';
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <br>
            <p class="heading">
                INFORMATION OF DEPENDENTS
            </p>
            <table class="education">
                <thead>
                    <th style="width: 20%">Name</th>
                    <th style="width: 20%">Date of Birth</th>
                    <th style="width: 20%">Blood Group</th>
                    <th style="width: 20%">Occupation</th>
                    <th style="width: 20%">NID (if any)</th>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $profile->dependent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dependents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td height="20"><?php echo e($dependents->name); ?></td>
                        <td height="20"><?php echo e(date('d M, Y',strtotime($dependents->date_of_birth))); ?></td>
                        <td height="20"><?php echo e($dependents->blood_group); ?></td>
                        <td height="20"><?php echo e($dependents->occupation); ?></td>
                        <td height="20"><?php echo e($dependents->nid_number); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td height="20" colspan="3">Membership Type Not Found</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <table style="width: 100%;margin-top:80px">
                <tr>
                    <td style="width:88px">
                        <label>Proposed By</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->proposedBy?$profile->proposedBy->name:''); ?></div>
                    </td>
                    <td style="width: 80px">
                    </td>
                    <td style="width:88px">
                        <label>Seconded by </label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->secondBy?$profile->secondBy->name:''); ?></div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;margin-top:10px">
                <tr>
                    <td style="width:43px">
                        <label>Email</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->proposedBy?$profile->proposedBy->email:''); ?></div>
                    </td>
                    <td style="width: 80px">
                    </td>
                    <td style="width:43px">
                        <label>Email</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->secondBy?$profile->secondBy->email:''); ?></div>
                    </td>
                </tr>
            </table>
            <table style="width: 100%;margin-top:10px">
                <tr>
                    <td style="width:111px">
                        <label>Membership No.</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->proposedBy?$profile->proposedBy->profile->membership_no:''); ?></div>
                    </td>
                    <td style="width: 80px">
                    </td>
                    <td style="width:111px">
                        <label>Membership No.</label>
                    </td>
                    <td>
                        <div class="border"><?php echo e($profile->secondBy?$profile->secondBy->profile->membership_no:''); ?></div>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>
<?php /**PATH D:\laragon\www\club-management-system\resources\views/frontend/profile/pdf/profile-pdf.blade.php ENDPATH**/ ?>