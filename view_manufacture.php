<?php include_once("class/Manufacture.php");
   include('includes/header.php');      
   include('includes/side_navigation.php');?>
<?php   
   $Manufacture = new Manufacture();
   $query = "SELECT * FROM manufactures ORDER BY manufacture_id DESC";
   $result = $Manufacture->get_manufacture_data($query);
   $no=0;
   
   ?>
<!-- Page wrapper  -->
<div class="page-wrapper">
<!-- Bread crumb -->
<div class="row page-titles">
   <div class="col-md-5 align-self-center">
      <h3 class="text-primary">Manufacture</h3>
   </div>
   <div class="col-md-7 align-self-center">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
         <li class="breadcrumb-item active">Manufacture</li>
      </ol>
   </div>
</div>
<!-- End Bread crumb -->
<!-- Container fluid  -->
<div class="container-fluid">
   <!-- Start Page Content -->
   <div class="row" >
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
         <div class="card" >
            <div class="card-title">
            </div>
            <div class="card-body">
               <div class="table-responsive m-t-40">
                  <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" >
                     <thead>
                        <tr>
                           <th style="text-align: center;">No.</th>
                           <th style="text-align: center;">Manufacture's Name</th>
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
                           <td style="text-align: center;"><a data-toggle="tooltip" title="Delete Manufacture"  id="delete_manufacture"
                              onclick="delete_manufacture('<?php echo $row['manufacture_id']; ?>')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-2"></div>
   </div>
   <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->
<?php include('includes/footer.php'); ?>
<script type="text/javascript">
   function delete_manufacture(manufecture_id){
    
      $.ajax({
           url:"ajax/delete_manufacture.php",
           type:"POST",
         
           data:'manufecture_id='+manufecture_id,
           success:function(data){
            
                alert('Manufacture Deleted Successfully.');
               location.reload();
          
           }
       
       });
   
   
   
   }
   
</script>
<script>
   $(document).ready(function(){
     $('[data-toggle="tooltip"]').tooltip();   
      $('#tooltip').tooltip();   
    
   });
   
   
</script>