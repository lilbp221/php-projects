<?php include('includes/header.php'); ?>



<div class="container-fluid px-4">
      
            <div class="card mt-4 shadow">
                  <div class="card-header">
                        <h4 class="mb-0"> Categories
                           <a href="categories-create.php" class="btn btn-primary float-end" > Add Categories</a>   
                        </h4>
                  </div>
                  <div class="card-body">
                     <?php alertMessage(); ?>   

                       <div class="table-responsive">
                             <table class="table table-striped table-bordered">
                                   <thead>
                                         <th>
                                          ID
                                         </th>
                                         <th>
                                          Name
                                         </th>
                                         <th>
                                          Status
                                         </th>
                                         <th>
                                          Action
                                         </th>
                                   </thead>
                                   <tbody>
                                         <?php
                                         $categories= getAll('categories');
                                         if(mysqli_num_rows($categories)>0)
                                         {

                                         
                                         ?>

                                         <?php foreach($categories as $item) : 
                                         ?>
                                         <tr>
                                               <td>
                                          <?= $item['id'] ?>
                                               </td>
                                               <td>
                                          <?= $item['name'] ?>
                                               </td>
                                             
                                               <td>

                                               <?php
     if($item['status']==1)
     {
      echo'<span class="badge bg-danger"> Hidden </span>';
     }
     else{
      echo'<span class="badge bg-primary"> Visible</span>';

     }
                                               ?>
                                               </td>
                                               
                                               <td>
                         <a href="categories-edit.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit </a>
                         <a href="categories-delete.php?id=<?=$item['id'];?>" class="btn btn-danger btn-sm"
                         onclick="return confirm('Are you sure you want to delete this?')";>
                         Delete</a>                            

                                               </td>
                                         </tr>
                                         <?php endforeach; ?>
                                         <?php
                                         }
                                         else{
                                               ?>
                                               <tr>
                                               <td colspan="4">
                                                     No Record Found 
                                               </td>
                                               </tr>
                                               <?php
                                         }
                                         ?>
                                   </tbody>
                             </table>
                       </div>
                             
                       </div>
                  </div>
            </div>

           
    


<?php include('includes/footer.php'); ?> 