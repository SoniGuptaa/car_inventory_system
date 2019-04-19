<?php include_once("class/Model.php");
   include('includes/header.php');      
   include('includes/side_navigation.php');?>
<?php   
   $Model = new Model();
   $query = "SELECT models.model_id, models.model_name, models.model_count, manufactures.manufacture_name FROM models
           INNER JOIN manufactures ON models.manufacture_id=manufactures.manufacture_id";
   $result = $Model->get_model_data($query);
   $no=0;
   
   ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Model</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Model</li>
      </ol>
   </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
   <!-- Start Page Content -->
   <div class="row" >
      <div class="col-lg-12">
         <div class="card" >
            <div class="card-title">
            </div>
            <div class="card-body">
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%"  >
                     <thead>
                        <tr>
                           <th style="text-align: center;">No.</th>
                           <th style="text-align: center;">Manufacture's Name</th>
                           <th style="text-align: center;">Model's Name</th>
                           <th style="text-align: center;">Count</th>
                           <th style="text-align: center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($result as $row) {
                           $no++;
                           
                           ?>
                        <tr>
                           <td style="text-align: center;"> <?php echo $no; ?></td>
                           <td style="text-align: center;"><?php echo $row['manufacture_name'];?></td>
                           <td style="text-align: center;"><?php echo $row['model_name'];?></td>
                           <td style="text-align: center;"><?php echo $row['model_count'];?></td>
                           <td style="text-align: center;"><a data-toggle="tooltip" title="Delete Model" id="delete_model" onclick="delete_model('<?php echo $row['model_id']; ?>')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
   function delete_model(model_id){
    
      $.ajax({
           url:"ajax/delete_model.php",
           type:"POST",
         
           data:'model_id='+model_id,
           success:function(data){
            
                alert('Model Deleted Successfully');
               location.reload();
          
           }
       
       }); 
   }
</script>
</script>
<script>
   $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();   
      $('#tooltip').tooltip();   
    
   });
   
   
</script>