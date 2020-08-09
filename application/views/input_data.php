<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
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
          <h1>Input Utility Status</h1>
          <h2 class="">Input Utility Status...</h2>
        </div>
        <div class="pull-right">
          <ol class="breadcrumb">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li class="active">Input Utility Status</li>
          </ol>
        </div>
      </div>

<form action="<?php echo base_url();?>access/save_utility_data" method="post">
      <div class="container clear_both padding_fix">
        <!--\\\\\\\ container  start \\\\\\-->
        <div class="row">
        <div class="col-md-12">
          <div class="block-web">
            <div class="header">
              <div class="actions"> <a class="minimize" href="#"><i class="fa fa-chevron-down"></i></a> <a class="refresh" href="#"><i class="fa fa-repeat"></i></a> <a class="close-down" href="#"><i class="fa fa-times"></i></a> </div>
              <h3 class="content-header">Utility Status</h3>
            </div>
              <div style="padding-top:10px">
                  <h6 style="color:red">
                      <?php
                      $exc = $this->session->userdata('exception');
                      if (isset($exc)) {
                          echo $exc;
                          $this->session->unset_userdata('exception');
                      }
                      ?>
                  </h6>

                  <h6 style="color:green">
                      <?php
                      $msg = $this->session->userdata('message');
                      if (isset($msg)) {
                          echo $msg;
                          $this->session->unset_userdata('message');
                      }
                      ?>
                  </h6>
              </div>
         <div class="porlets-content" style="margin-bottom: 30px;">
          <div class="row"> 
            <div class="form-group">
               <div class="col-md-3" style="text-align: right;">
                   <h5><b>Select Date:</b></h5>
               </div>
               <div class="col-md-3">
                   <input type="text" id="date" required name="date" class="form-control form-control-inline input-medium default-date-picker" onblur="getTimeDatabyDate();">
               </div>
               <div class="col-md-1"></div>
               <div class="col-md-4">
                    <div class="table-responsive">
                        <table border="1" width="100%">
                            <tr class="gradeX center">
                                <td colspan="4" style="font-weight: bold;"> --Ranges-- </td>
                            </tr>
                            <tr class="gradeX center">
                                <td>* Gas pressure </td>
                                <td style="background-color: green; color: white">8 -11 PSI</td>
                                <td style="background-color: yellow; color: black">5.5 -7.5 PSI</td>
                                <td style="background-color: red; color: white">0 - 5 PSI</td>
                            </tr>
                            <tr class="gradeX center">
                                <td>* Steam pressure </td>
                                <td style="background-color: green; color: white">4 - 6 kg</td>
                                <td style="background-color: yellow; color: black">2.5 - 3.5 kg</td>
                                <td style="background-color: red; color: white">1 - 2 kg</td>
                            </tr>
                        </table>
                    </div>
               </div>
               </div>
             </div>
             <div class="row">
                <div class="form-group" id="loader" style="display: none;">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                           <div class="loader"></div>
                   </div>
                </div>
             </div>
          </div>
       <div class="porlets-content">
         <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="sample_3">
                  <thead>
                    <tr>
                        <th class="hidden-phone center" rowspan="2"><b>Time</b></th>
                        <th class="hidden-phone center" rowspan="2"><b>Date</b></th>
                        <th class="hidden-phone center" colspan="6" style=" border-right: 2px solid blue;"><b>Generator Load (Kw/hr)</b></th>
                        <th class="hidden-phone center" colspan="5"><b>Boiler Steam Pressure (Kg)</b></th>
                    </tr>
                    <tr>
                      <th class="hidden-phone center">Gas Pressure (PSI)</th>
                      <th class="hidden-phone center">Gen-1</th>
                      <th class="hidden-phone center">Gen-3</th>
                      <th class="hidden-phone center">Gen-4</th>
                      <th class="hidden-phone center">Gen-2</th>
                      <th class="hidden-phone center" style="border-right: 2px solid blue;">Remarks</th>
                      <th class="hidden-phone center">Gas Pressure (PSI)</th>
                      <th class="hidden-phone center">Boiler 1 <br />Omnical, 6 Ton</th>
                      <th class="hidden-phone center">Boiler 2 <br />Omnical, 6 Ton</th>
<!--                      <th class="hidden-phone center">Boiler 3<br />EGB Thermax, 3 Ton</th>-->
                      <th class="hidden-phone center">Boiler 4<br />Loos, 10 Ton</th>
                      <th class="hidden-phone center">Remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="gradeX">
                      <td></td>
                      <td></td>
                      <td></td>
                      <td class="hidden-phone"></td>
                      <td class="center hidden-phone"></td>
                      <td class="center hidden-phone"></td>
                      <td class="center hidden-phone"></td>
                      <td class="center hidden-phone"></td>
                      <td class="center hidden-phone"></td>
<!--                      <td class="center hidden-phone"></td>-->
                      <td class="center hidden-phone"></td>
                      <td class="center hidden-phone"></td>
                    </tr>
                  </tbody>
                </table>
              </div><!--/table-responsive-->

           <button type="submit" class="btn btn-primary" disabled id="submit_button">Submit</button>
              </div>

           </div><!--/porlets-content-->  
          </div><!--/block-web-->
        </div><!--/col-md-12--> 
      </div>
</form>

<script type="text/javascript">

    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    }

    document.onkeypress = stopRKey;


    function getTimeDatabyDate() {
        var date = $("#date").val();

        var month = date.substring(0, 2);
        var dt = date.substring(3, 5);
        var yr = date.substring(6, 10);

        if(date != ''){
            $("#loader").css("display", "block");
//            alert(month+' '+dt+' '+yr);

            var date_formatted = yr+'-'+month+'-'+dt;

            $("#sample_3 tbody tr").remove();

            $.ajax({
                url: "<?php echo base_url();?>access/getRestData/",
                type: "POST",
                data: {date: date_formatted},
                dataType: "html",
                success: function (data) {
                    $('#sample_3 tbody').append(data);
                    $("#loader").css("display", "none");
                }
            });

         $("#submit_button").attr("disabled", false);
        }else{
            alert("Please Select a Date !");
        }
    }

    function checkGeneratorGasPressure(i, id) {
        var generator_gas_pressure = $("#"+id).val();
        generator_gas_pressure = (generator_gas_pressure !='') ? parseFloat(generator_gas_pressure):0;

        if(generator_gas_pressure >= 8){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(generator_gas_pressure >= 5.5 && generator_gas_pressure <= 7.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(generator_gas_pressure < 5.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }

    function checkBoilGasPressure(i, id) {
        var boiler_gas_pressure = $("#"+id).val();
        boiler_gas_pressure = (boiler_gas_pressure !='') ? parseFloat(boiler_gas_pressure):0;

        if(boiler_gas_pressure >= 8){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(boiler_gas_pressure >= 5.5 && boiler_gas_pressure <= 7.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(boiler_gas_pressure < 5.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }

    function checkBoiler01(i, id) {
        var boiler_01_pressure = $("#"+id).val();
        boiler_01_pressure = (boiler_01_pressure !='') ? parseFloat(boiler_01_pressure):0;

        if(boiler_01_pressure > 3.5){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(boiler_01_pressure >= 2.5 && boiler_01_pressure <= 3.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(boiler_01_pressure < 2.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }

    function checkBoiler02(i, id) {
        var boiler_02_pressure = $("#"+id).val();
        boiler_02_pressure = (boiler_02_pressure !='') ? parseFloat(boiler_02_pressure):0;

        if(boiler_02_pressure > 3.5){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(boiler_02_pressure >= 2.5 && boiler_02_pressure <= 3.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(boiler_02_pressure < 2.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }

    function checkBoiler03(i, id) {
        var boiler_03_pressure = $("#"+id).val();
        boiler_03_pressure = (boiler_03_pressure !='') ? parseFloat(boiler_03_pressure):0;

        if(boiler_03_pressure > 3.5){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(boiler_03_pressure >= 2.5 && boiler_03_pressure <= 3.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(boiler_03_pressure < 2.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }

    function checkBoiler04(i, id) {
        var boiler_04_pressure = $("#"+id).val();
        boiler_04_pressure = (boiler_04_pressure !='') ? parseFloat(boiler_04_pressure):0;

        if(boiler_04_pressure > 3.5){
            $("#"+id).css("background-color", "green");
            $("#"+id).css("color", "white");
        }

        if(boiler_04_pressure >= 2.5 && boiler_04_pressure <= 3.5){
            $("#"+id).css("background-color", "yellow");
            $("#"+id).css("color", "black");
        }

        if(boiler_04_pressure < 2.5){
            $("#"+id).css("background-color", "red");
            $("#"+id).css("color", "white");
        }
    }
</script>