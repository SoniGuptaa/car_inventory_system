<?php include_once("class/Manufacture.php");
   include('includes/header.php');
    include('includes/side_navigation.php');
    ?>
<?php   
   $Manufacture = new Manufacture();
   $query = "SELECT * FROM manufactures ORDER BY manufacture_id DESC";
   $result = $Manufacture->get_manufacture_data($query);
   
   
   ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Add Model</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Add Model</li>
      </ol>
   </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
   <!-- Start Page Content -->
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-title" style="text-align: center; padding: 30px">
               <h4 style="font: bold;">ADD NEW MODELS</h4>
            </div>
            <div class="card-body">
               <div class="basic-elements">
                  <form action="" method="post" >
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="form-group">
                              <select class="form-control" name="Manufacture" id="Manufacture" required="" style=" height:  41px">
                                 <option value="">Select Manufacture</option>
                                 <?php foreach ($result as $row) { ?>
                                 <option value="<?php echo $row['manufacture_id']; ?>"><?php echo $row['manufacture_name']; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <input type="text"  name="Model" id="Model" class="form-control"  placeholder="Enter Model Name" required="">
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="form-group">
                              <input type="number"  name="Model_count" id="Model_count" class="form-control" placeholder="Enter Model Count" required="">
                           </div>
                        </div>
                     </div>
                     <div class="form-group" style="padding-left: 300px; padding-right: 300px; padding-top: 30px;">
                        <label class="messageinput" style="display: none; text-align: center; margin-left: 90px;">Kindly provide details</label>
                        <br>
                        <button name="submit" id="submit" class="btn hideb btn-primary btn-block" bgcolor="blue">submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include('includes/footer.php'); ?>
<script>
   $("#submit").click(function() {
   var Manufacture = $("#Manufacture").val(); 
   
   var Model = $("#Model").val();
   var Model_count = $("#Model_count").val();
   if (Manufacture != null && Manufacture != '' && Model != null && Model != '' && Model_count != null && Model_count != '') {  
   $.ajax({
       data: "Manufacture="+Manufacture+"&Model="+Model+"&Model_count="+Model_count,
       type: "post",
       url: "ajax/add_model.php",
       success: function(data)
       {
       alert('Model Added Successfully');
       var url = "view_model.php";
       window.location.href = url;
       }
       });
   }else{
               $(".messageinput").css({
               display: 'inline-block',
               color:'red',
               });
               } 
               
   });
</script>