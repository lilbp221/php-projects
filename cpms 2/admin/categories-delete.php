<?php
require '../config/function.php';

$paraResultId= checkParamId('id');

if(is_numeric($paraResultId))
{
$categoryId= validate($paraResultId);

$category= getById('categories',$categoryId);
if($category['status']==200)
{
$response= delete('categories',$categoryId);
if($response)
{
      redirect('categories.php','Category Deleted Successfully');

}
else{
redirect('categories.php','something is wrong');
      
}
}
else{
      redirect('categories.php',$category['message']);
}
//echo $adminId;
}

else{
redirect('categories.php','something is wrong');
}

?>