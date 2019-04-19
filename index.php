<?php 
   include_once("class/Manufacture.php");
   include_once("class/Model.php");
   include('includes/header.php');
   $Manufacture = new Manufacture();
   $query = "SELECT * FROM manufactures ";
   $total_manufacture = $Manufacture->get_manufacture_data($query);
   
   $Model = new Model();
   $query = "SELECT COUNT(models.model_id) as total_model FROM models INNER JOIN manufactures ON models.manufacture_id=manufactures.manufacture_id";
   $total_model = $Model->get_model_data($query);
   
   
   
    ?>
<?php include('includes/side_navigation.php'); ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Dashboard</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Dashboard</li>
      </ol>
   </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
   <!-- Start Page Content -->
   <div class="row">
      <div class="col-md-3">
         <div class="card p-30">
            <div class="media">
               <div class="media-left meida media-middle">
                  <span><i class="fa fa-industry f-s-40 color-primary"></i></span>
               </div>
               <a href="view_manufacture.php">
                  <div class="media-body media-text-right">
                     <h2><?php echo count($total_manufacture);  ?></h2>
                     <p class="m-b-0">Total Manufactures</p>
                  </div>
               </a>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card p-30">
            <div class="media">
               <div class="media-left meida media-middle">
                  <span><i class="fa fa-car f-s-40 color-success"></i></span>
               </div>
               <a href="view_model.php">
                  <div class="media-body media-text-right">
                     <h2><?php echo $total_model['0']['total_model'];  ?></h2>
                     <p class="m-b-0">Total Models</p>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>
   <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include('includes/footer.php'); ?>