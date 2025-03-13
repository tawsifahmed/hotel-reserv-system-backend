<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            word-wrap: wrap;
            padding: 8px;
            vertical-align: text-top;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <table style="width:">
        <tr>
            <th colspan="6" style="font-size:14px;"><strong>Report</strong></th>
        </tr>
        <tr>
            <th style="background-color:darkgreen;color:white;"><strong>user_name</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>start_date</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>end_date</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>status</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>room_name</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>floor_name</strong></th>
            <th style="background-color:darkgreen;color:white;"><strong>price_per_night</strong></th>
        </tr>

        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td valign="top" align="left"><?php echo e($attendance['user_name']); ?></td>
                <td valign="top" align="left"><?php echo e(\Carbon\Carbon::parse($attendance['start_date'])->format('d M Y')); ?></td>
                <td valign="top" align="left"><?php echo e(\Carbon\Carbon::parse($attendance['end_date'])->format('d M Y')); ?></td>
                <td valign="top" align="left"><?php echo e($attendance['status']); ?></td>
                <td valign="top" align="left"><?php echo e($attendance['room_name']); ?></td>
                <td valign="top" align="left"><?php echo e($attendance['floor_name']); ?></td>
                <td valign="top" align="left"><?php echo e($attendance['price_per_night']); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>

</html>
<?php /**PATH D:\Projects\hotel-reserv-sys-backend\resources\views/export/reservation-report.blade.php ENDPATH**/ ?>