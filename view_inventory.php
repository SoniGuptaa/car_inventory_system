<?php include_once("class/Model.php");
   include('includes/header.php');      
   include('includes/side_navigation.php');?>
<?php   
   $Model = new Model();
   
   $query="SELECT models.model_id, models.model_name, models.model_count, manufactures.manufacture_name FROM models
           INNER JOIN manufactures ON models.manufacture_id=manufactures.manufacture_id 
           where models.model_count !=0 ORDER BY models.model_id DESC";
   $result = $Model->get_model_data($query);
   $no=0;
   
   ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Inventory</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Inventory</li>
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
                           <th style="text-align: center;">Sold</th>
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
                           <td><button class="btn hideb btn-primary btn-block" style="background-color: #1976d2"  id="sold" onclick="sold('<?php echo $row['model_id']; ?>','<?php echo $row['model_count']; ?>')">Sold</button></td>
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
   function sold(model_id,model_count){
    
      $.ajax({
           url:"ajax/sold.php",
           type:"POST",
         
           data:"model_id="+model_id+"&model_count="+model_count,
           success:function(data){
            
                alert('Sold Successfully.');
               location.reload();
          
           }
       
       });
   
   
   
   }
   
   
   
</script>