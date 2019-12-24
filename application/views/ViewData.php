 <?php if($responce = $this->session->flashdata('Successfully')){ ?>
 <div class="alert alert-success alert-dismissible">
   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Success!</strong> <?php echo $responce ?>
 </div>

 <?php }	
 ?>
 <!DOCTYPE html>
 <html>

 <head>
   <title>State City Area</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
     integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 </head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 </head>

 <body>
   <div class="container">
     <br><br>

     <div class="row">
       <div class="col-md-6">
         <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#StateInsertModal">
           Add New State
         </button>
         <br><br>
         <table class="table table-hover">
           <thead class="thead-light">
             <tr>
               <th>No.</th>
               <th>State Name</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
						$i = 1;
						foreach ($StateData as $StateRow) {
						?>

             <tr>
               <td><?php echo $i++; ?></td>
               <td><?php echo $StateRow->sz_sname; ?></td>
               <td>

                 <button data-toggle="modal" data-target="#StateUpdateModal" class="btn btn-primary StateUpdate"
                   data-id="<?php echo $StateRow->nm_sid;  ?>" data-sname="<?php echo $StateRow->sz_sname;  ?>"><i
                     class="fas fa-edit" aria-hidden="true"></i></button>
                 <a
                   href="<?php echo base_url(); ?>index.php/MyController/DeleteState/<?php echo $StateRow->nm_sid;  ?>"><button
                     class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button></a>

               </td>
             </tr>
             <?php
						}
						?>
           </tbody>
         </table>
       </div>
       <div class="col-md-6">
         <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#CityInsertModal">
           Add New City
         </button>
         <br><br>
         <table class="table table-hover">
           <thead class="thead-light">
             <tr>
               <th>No.</th>
               <th>City Name</th>
               <th> State Name </th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
             <?php
						$i = 1;
						foreach ($CityData as $CityRow) {

						?>

             <tr>
               <td><?php echo $i++; ?></td>
               <td><?php echo $CityRow->sz_cname; ?></td>
               <td><?php echo $CityRow->sz_sname; ?></td>
               <td>

                 <button data-toggle="modal" data-target="#CityUpdateModal" class="btn btn-primary CityUpdate"
                   data-cid="<?php echo $CityRow->nm_cid;  ?>" data-sid="<?php echo $CityRow->nm_sid;  ?>"
                   data-cname="<?php echo $CityRow->sz_cname;  ?>"><i class="fas fa-edit"
                     aria-hidden="true"></i></button>
                 <a href="<?php echo base_url(); ?>index.php/MyController/Deletecity/<?php echo $CityRow->nm_cid;  ?>"><button
                     class="btn btn-danger"><i class="fas fa-trash" aria-hidden="true"></i></button></a>

               </td>
             </tr>
             <?php
						}
						?>
           </tbody>
         </table>
       </div>
     </div>

     <h1 class="text-center"><kbd> DropDown Using Ajax </kbd></h1>

     <div class="row">
       <div class="col-md-6">
         State:<br>
         <select class="form-control" id="cmbState" name="cmbState">
           <option value="0">--Select State--</option>
           <?php
					foreach ($StateData as $StateRow) {
					?>
           <option value="<?php echo $StateRow->nm_sid ?>"><?php echo $StateRow->sz_sname ?> </option>
           <?php
					}
					?>
         </select>
       </div>
       <div class="col-md-6">
         City:<br>
         <select class="form-control" id="cmbCity" name="cmbCity">
           <option>--Select--</option>
         </select>
       </div>
     </div>

   </div>





   <!-- The State Insert Modal -->
   <div class="modal" id="StateInsertModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Insert State Information</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="MyController/InsertState" method="post">
             <div class="row">
               <div class="col-md-3">
                 StateName
               </div>
               <div class="col-md-6">
                 <input type="hidden" name="txtStateId" id="txtStateId">
                 <input type="text" placeholder="Enter State Name" name="txtStateName" id="txtStateName"
                   class="form-control">
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6 text-right">
                 <input type="submit" class="btn btn-success" name="BtnS">
               </div>

             </div>
           </form>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

       </div>
     </div>
   </div>

   <!-- The City Insert Modal -->
   <div class="modal" id="CityInsertModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Insert City Information</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="MyController/InsertCity" method="post">
             <div class="row">
               <div class="col-md-3">
                 CityName
               </div>
               <div class="col-md-6">
                 <input type="hidden" name="txtCityId" id="txtCityId">
                 <input type="text" name="txtCityName" id="txtCityName" placeholder="Enter City Name"
                   class="form-control">
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
                 StateName
               </div>
               <div class="col-md-6">
                 <select class="form-control" id="txtState" name="txtState">
                   <option value="0">--Select State--</option>
                   <?php
									foreach ($StateData as $StateRow) {
									?>
                   <option value="<?php echo $StateRow->nm_sid ?>"><?php echo $StateRow->sz_sname ?> </option>
                   <?php
									}
									?>
                 </select>

               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6 text-right">
                 <input type="submit" class="btn btn-success" name="BtnS">
               </div>

             </div>
           </form>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

       </div>
     </div>
   </div>




   <!-- The State Update Modal -->
   <div class="modal" id="StateUpdateModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Update State Information</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="MyController/UpdateState" method="post">
             <div class="row">
               <div class="col-md-3">
                 StateName
               </div>
               <div class="col-md-6">
                 <input type="hidden" name="txtStateId1" id="txtStateId1">
                 <input type="text" name="txtStateName1" id="txtStateName1" class="form-control"
                   placeholder="Enter State Name">
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6 text-right">
                 <input type="submit" class="btn btn-success" name="BtnS">
               </div>

             </div>
           </form>
         </div>


         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

       </div>
     </div>
   </div>

   <!-- The City Update Modal -->
   <div class="modal" id="CityUpdateModal">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Update City Information</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>

         <!-- Modal body -->
         <div class="modal-body">
           <form action="MyController/UpdateCity" method="post">
             <div class="row">
               <div class="col-md-3">
                 CityName
               </div>
               <div class="col-md-6">
                 <input type="hidden" name="txtCityId1" id="txtCityId1">
                 <input type="text" name="txtCityName1" id="txtCityName1" class="form-control">
               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
                 StateName
               </div>
               <div class="col-md-6">
                 <select class="form-control" id="txtState1" name="txtState1">
                   <option value="0">--Select State--</option>
                   <?php
									foreach ($StateData as $StateRow) {
									?>
                   <option value="<?php echo $StateRow->nm_sid ?>"><?php echo $StateRow->sz_sname ?> </option>
                   <?php
									}
									?>
                 </select>

               </div>
             </div>
             <br>
             <div class="row">
               <div class="col-md-3">
               </div>
               <div class="col-md-6 text-right">
                 <input type="submit" class="btn btn-success" name="BtnS">
               </div>

             </div>
           </form>
         </div>

         <!-- Modal footer -->
         <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         </div>

       </div>
     </div>
   </div>



   <script>
   $(document).ready(function() {

     $(".alert").click(function() {
       $(this).fadeOut('slow');
     });

     $('.StateUpdate').click(function() {
       id = $(this).data('id');
       name = $(this).data('sname');

       $('#txtStateId1').val(id);
       $('#txtStateName1').val(name);

     });
     $('.CityUpdate').click(function() {
       cid = $(this).data('cid');
       cname = $(this).data('cname');
       sid = $(this).data('sid');
       $('#txtCityId1').val(cid);
       $('#txtCityName1').val(cname);
       $('#txtState1').val(sid);


     });


     $('#cmbState').change(function() {
       var state_id = $('#cmbState').val();
       if (state_id != '') {
         $.ajax({
           url: "<?php echo base_url(); ?>index.php/MyController/fetch_city",
           method: "POST",
           data: {
             state_id: state_id
           },
           success: function(data) {
             $('#cmbCity').html(data);
           }
         });
       } else {
         $('#cmbCity').html('<option value="">Select City</option>');
       }
     });

   });
   </script>



 </body>

 </html>