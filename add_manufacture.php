<?php include('includes/header.php'); ?>
       

<?php include('includes/side_navigation.php'); ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Manufacture</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Manufacture</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
           <div class="row" >
             <div class="col-lg-3"></div>
                    <div class="col-lg-6" style="align-items: center;">
                      <div class="card" style="padding-top: 30px">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                           
                                            <input type="text" name="Manufacture" id="Manufacture" placeholder="Manufacture name" class="form-control" required="">
                                        </div>
                                       <br>
                                       
                                        <div class="form-group">
                                            <label class="messageinput" style="display: none; text-align: center; margin-left: 150px;">Kindly provide details</label>
                                             <br>
                                         <button name="submit" id="submit" class="btn hideb btn-primary btn-block" bgcolor="blue">submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
             <div class="col-lg-3"></div>
                </div>
         

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
   <?php include('includes/footer.php'); ?>

  <script>
    $("#submit").click(function() {
    var Manufacture = $("#Manufacture").val();
     if (Manufacture != null && Manufacture != '' ) {  
  
 $.ajax({
        data: "Manufacture=" + Manufacture ,
        type: "post",
        url: "ajax/add_manufacture.php",
        success: function(data)
        {
        alert('Manufacture Added Successfully');
        var url = "view_manufacture.php";
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
  