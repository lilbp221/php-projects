<?php include('includes/header.php'); ?>



<div class="container-fluid px-4">
      
            <div class="card mt-4 shadow">
                  <div class="card-header">
                        <h4 class="mb-0"> View Product
                           <a href="products.php" class="btn btn-danger float-end" > Back</a>   
                        </h4>
                  </div>
                  <div class="card-body">
                     <?php alertMessage(); ?>   
                   <form action="code.php" method="POST" enctype="multipart/form-data">
               
                  <?php
                  $paramValue=checkParamId('id');
                  if(!is_numeric($paramValue))
                  {
                        echo'<h5> Id is not an Integer!!</h5>';
                        return false;
                  }

                  $product=getById('products',$paramValue);
                  if($product)
                  {
                        if($product['status']==200)
                        {
                        ?>      

                        <input type="hidden" name="product_id" value="<?= $product['data']['id']; ?>" />
                      
                   <div class="row">

                  <div class="col-md-12 mb-3">
                        <label>Category </label>
                        <select name="category_id"  readonly class="form-control-plaintext">
                            <option value="">Category </option>  
                            <?php
                        $categories=getAll('categories');
                        if($categories)

                        {
                              if(mysqli_num_rows($categories)>0)
                              {
                                    foreach($categories as $cateItem){

                                          ?>
                              <option 
                              value="<?= $cateItem['id']; ?>"
                             <?= $product['data']['category_id']== $cateItem['id'] ? 'selected': '' ?>
                             >
                                          <?= $cateItem['name']; ?>
                              </option>

                                          <?php 


                                    }

                              }
                              else{
                              echo'<option value="">No Category Found !! </option>';

                              }
                        }
                        else{
                              echo'<option value="">Something Went Wrong </option>';
                        }
                            ?>
                        </select>

                  </div>
                  <div class="col-md-12 mb-3">
                        <label for=""> Product Name *</label>
                        <input type="text" name="name" required value="<?= $product['data']['name']; ?>" readonly class="form-control-plaintext" />

                  </div>
                  <div class="col-md-12 mb-3">
                        <label for=""> Product Description </label>
                        
                        <textarea  name="description"  readonly class="form-control-plaintext" rows="3" > <?= $product['data']['description']; ?></textarea>      
                  </div>
                  <div class="col-md-4 mb-3">
                        <label for="">  Price *</label>
                        
                        <input type="text"  name="price" required value="<?= $product['data']['price']?>" readonly class="form-control-plaintext" rows="3" />  
                  </div>
                  <div class="col-md-4 mb-3">
                        <label for=""> Quantity *</label>
                        
                        <input type="text"  name="quantity" required value="<?= $product['data']['quantity']; ?>" readonly class="form-control-plaintext"" rows="3" />     
                  </div>
                 


               
                    </div>  
                    
                    <?php
                      }
                      else{
                            echo'<h5> '.$product['message'].'</h5>';
                            return false;  
                      }
                }
                else{
                      echo'<h5> Something went wrong!!</h5>';
                      return false;
                }
                ?>
                   </form>    
                  </div>
            </div>

</div>
    


 <?php include('includes/footer.php'); ?> 

 