<style>
    .loader {
        border: 20px solid #f3f3f3;
        border-radius: 50%;
        border-top: 20px solid #3498db;
        width: 35px;
        height: 35px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Compose New Task</h4>
            </div>
            <div class="modal-body"> content </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="pull-left breadcrumb_admin clear_both">
    <div class="pull-left page_title theme_color">
        <h1>Utility Status Report</h1>
        <h2 class="">Status of Gas Pressure, Gas Generator Load and Steam Pressure of Boiler</h2>
    </div>
    <div class="pull-right">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Report</li>
        </ol>
    </div>
</div>

    <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
            <div class="col-md-12">
                <div class="block-web">
<!--                    <div class="header">-->
<!--                        <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>-->
<!--                        <h3 class="content-header">Utility Status Report</h3>-->
<!--                    </div>-->

                    <div class="porlets-content" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="form-group">
                                <label class="control-label col-md-2" style="text-align: right; font-size: 20px; font-weight: 900;">Select Date</label>
                                <div class="col-md-3">
                                    <input type="text" id="date_1" required name="date" class="form-control form-control-inline input-medium default-date-picker">
                                </div>
                                <div class="col-md-1">
                                    <button type="button" onclick="getReportByDate();" class="btn btn-info"></i> Search </button>
                                </div>
                                <div class="col-md-1" id="loader" style="display: none;"><div class="loader"></div></div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                    <table border="1" width="100%">
                                        <tr class="gradeX center">
                                            <td colspan="4" style="font-weight: bold;"> --Ranges-- </td>
                                        </tr>
                                        <tr class="gradeX center">
                                            <td>* Gas pressure </td>
                                            <td style="background-color: green; color: white">(8 -11) psi</td>
                                            <td style="background-color: yellow; color: black">(5.5 -7.5) psi</td>
                                            <td style="background-color: red; color: white">(0 - 5) psi</td>
                                        </tr>
                                        <tr class="gradeX center">
                                            <td>* Steam pressure </td>
                                            <td style="background-color: green; color: white">(4 - 6) kg</td>
                                            <td style="background-color: yellow; color: black">(2.5 - 3.5) kg</td>
                                            <td style="background-color: red; color: white">(1 - 2) kg</td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="porlets-content" style="margin-bottom: 30px;">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12" style="text-align: center;">
                                    <p style="font-size: 20px; font-weight: bold;"> * Generator No. 1, 3 & 4 Synchronized, Hourly Titas Gas Pressure, Generator Load & Steam Pressure of Boiler</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="porlets-content">
                        <div class="table-responsive">
                            <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="sample_3">
                                <thead>
                                <tr>
                                    <th class="hidden-phone center" rowspan="2" style="width: 90px;"><b>Date</b></th>
                                    <th class="hidden-phone center" rowspan="2" style="width: 70px;"><b>Time</b></th>
                                    <th class="hidden-phone center" colspan="6" style=" border-right: 2px solid blue;"><b>Generator Load (Kw/hr)</b></th>
                                    <th class="hidden-phone center" colspan="5"><b>Boiler Steam Pressure (Kg)</b></th>
                                </tr>
                                <tr>
                                    <th class="hidden-phone center" style="width: 80px;">Gas Pressure (PSI)</th>
                                    <th class="hidden-phone center" style="width: 50px;">Gen-1</th>
                                    <th class="hidden-phone center" style="width: 50px;">Gen-3</th>
                                    <th class="hidden-phone center" style="width: 50px;">Gen-4</th>
                                    <th class="hidden-phone center" style="width: 50px;">Gen-2</th>
                                    <th class="hidden-phone center" style="border-right: 2px solid blue;width: 150px;">Remarks</th>
                                    <th class="hidden-phone center" style="width: 80px;">Gas Pressure (PSI)</th>
                                    <th class="hidden-phone center" style="width: 70px;">Boiler 1 <br />Omnical, <br />6 Ton</th>
                                    <th class="hidden-phone center" style="width: 70px;">Boiler 2 <br />Omnical, <br />6 Ton</th>
<!--                                    <th class="hidden-phone center" style="width: 70px;">Boiler 3<br />EGB Thermax, <br />3 Ton</th>-->
                                    <th class="hidden-phone center" style="width: 70px;">Boiler 4<br />Loos, <br />10 Ton</th>
                                    <th class="hidden-phone center" style="width: 150px;">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($default_data as $v){
                                if($v['date'] == "$date_formatted_1" && $v['time_id'] <= 36) {
                                    ?>
                                    <tr class="center">
                                        <td><?php echo $v['date'] ?></td>
                                        <td><?php echo $v['time'] ?></td>
                                        <?php
                                        if ($v['generator_gas_pressure'] >= 8) { ?>
                                            <td style="background-color: darkgreen; color: white;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['generator_gas_pressure'] >= 5.5 && $v['generator_gas_pressure'] <= 7.5) { ?>
                                            <td style="background-color: yellow; color: black;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['generator_gas_pressure'] < 5.5) { ?>
                                            <td style="background-color: red; color: white;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="center"><?php echo $v['gen_1'] ?></td>
                                        <td class="center"><?php echo $v['gen_3'] ?></td>
                                        <td class="center"><?php echo $v['gen_4'] ?></td>
                                        <td class="center"><?php echo $v['gen_2'] ?></td>
                                        <td class="center"
                                            style="border-right: 2px solid blue; padding: 0px; width: 100px;"><?php echo $v['gen_remarks'] ?></td>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] >= 8) { ?>
                                            <td style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] >= 5.5 && $v['boil_steam_gas_pressure'] <= 7.5) { ?>
                                            <td style="background-color: yellow; color: black;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] < 5.5) { ?>
                                            <td style="background-color: red; color: white;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] >= 2.5 && $v['boiler_1'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>


                                        <?php
                                        if ($v['boiler_2'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_2'] >= 2.5 && $v['boiler_2'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_2'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>


<!--                                        --><?php
//                                        if ($v['boiler_3'] >= 3.5) { ?>
<!--                                            <td class="center" style="background-color: darkgreen; color: white;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>
<!--                                        --><?php
//                                        if ($v['boiler_3'] >= 2.5 && $v['boiler_3'] < 3.5) { ?>
<!--                                            <td class="center" style="background-color: yellow; color: black;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>
<!--                                        --><?php
//                                        if ($v['boiler_3'] < 2.5) { ?>
<!--                                            <td class="center" style="background-color: red; color: white;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>

                                        <?php
                                        if ($v['boiler_4'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_4'] >= 2.5 && $v['boiler_4'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_4'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="center"
                                            style="padding: 0px; width: 100px;"><?php echo $v['boiler_remarks'] ?></td>
                                    </tr>
                                    <?php }
                                if($v['date'] == "$nxt_date" && $v['time_id'] >= 37 && $v['time_id'] <= 48) {
                                    ?>
                                    <tr class="center">
                                        <td><?php echo $v['date'] ?></td>
                                        <td><?php echo $v['time'] ?></td>
                                        <?php
                                        if ($v['generator_gas_pressure'] >= 8) { ?>
                                            <td style="background-color: darkgreen; color: white;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['generator_gas_pressure'] >= 5.5 && $v['generator_gas_pressure'] <= 7.5) { ?>
                                            <td style="background-color: yellow; color: black;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['generator_gas_pressure'] < 5.5) { ?>
                                            <td style="background-color: red; color: white;">
                                                <?php echo $v['generator_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="center"><?php echo $v['gen_1'] ?></td>
                                        <td class="center"><?php echo $v['gen_3'] ?></td>
                                        <td class="center"><?php echo $v['gen_4'] ?></td>
                                        <td class="center"><?php echo $v['gen_2'] ?></td>
                                        <td class="center"
                                            style="border-right: 2px solid blue; padding: 0px; width: 100px;"><?php echo $v['gen_remarks'] ?></td>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] >= 8) { ?>
                                            <td style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] >= 5.5 && $v['boil_steam_gas_pressure'] <= 7.5) { ?>
                                            <td style="background-color: yellow; color: black;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boil_steam_gas_pressure'] < 5.5) { ?>
                                            <td style="background-color: red; color: white;">
                                                <?php echo $v['boil_steam_gas_pressure']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] >= 2.5 && $v['boiler_1'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_1'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_1']; ?>
                                            </td>
                                        <?php } ?>


                                        <?php
                                        if ($v['boiler_2'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_2'] >= 2.5 && $v['boiler_2'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_2'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_2']; ?>
                                            </td>
                                        <?php } ?>


<!--                                        --><?php
//                                        if ($v['boiler_3'] >= 3.5) { ?>
<!--                                            <td class="center" style="background-color: darkgreen; color: white;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>
<!--                                        --><?php
//                                        if ($v['boiler_3'] >= 2.5 && $v['boiler_3'] < 3.5) { ?>
<!--                                            <td class="center" style="background-color: yellow; color: black;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>
<!--                                        --><?php
//                                        if ($v['boiler_3'] < 2.5) { ?>
<!--                                            <td class="center" style="background-color: red; color: white;">-->
<!--                                                --><?php //echo $v['boiler_3']; ?>
<!--                                            </td>-->
<!--                                        --><?php //} ?>

                                        <?php
                                        if ($v['boiler_4'] >= 3.5) { ?>
                                            <td class="center" style="background-color: darkgreen; color: white;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_4'] >= 2.5 && $v['boiler_4'] < 3.5) { ?>
                                            <td class="center" style="background-color: yellow; color: black;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <?php
                                        if ($v['boiler_4'] < 2.5) { ?>
                                            <td class="center" style="background-color: red; color: white;">
                                                <?php echo $v['boiler_4']; ?>
                                            </td>
                                        <?php } ?>
                                        <td class="center"
                                            style="padding: 0px; width: 100px;"><?php echo $v['boiler_remarks'] ?></td>
                                    </tr>
                                    <?php
                                }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div><!--/table-responsive-->
                    </div>

                </div><!--/porlets-content-->
            </div><!--/block-web-->
        </div><!--/col-md-12-->
    </div>

<script type="text/javascript">
    function getReportByDate() {
        var dt_1 = $("#date_1").val();

        if(dt_1 != ''){
            $("#loader").css("display", "block");

            var mon_1 = dt_1.substring(0, 2);
            var dat_1 = dt_1.substring(3, 5);
            var yr_1 = dt_1.substring(6, 10);

            var date_formatted_1 = yr_1+'-'+mon_1+'-'+dat_1;

            $("#sample_3 tbody tr").remove();

            $.ajax({
                url: "<?php echo base_url();?>dashboard/getReportByDate/",
                type: "POST",
                data: {date_formatted_1: date_formatted_1},
                dataType: "html",
                success: function (data) {
                    $('#sample_3 tbody').append(data);
                    $("#loader").css("display", "none");
                }
            });
        }else{
            alert("Please Select Date!");
        }
    }
</script>