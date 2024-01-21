<?php include('includes/header.php'); ?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                       

                        
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">System Users: <?php
                                        $sql = "SELECT COUNT(*) as total_entries FROM admins";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            // Fetch the result as an associative array
                                            $row = $result->fetch_assoc();
                                        
                                            // Display the total number of entries
                                            echo $row['total_entries'];
                                        } else {
                                            echo "0";
                                        }
                                         
                                         ?>  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="admins.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                   <div class="card-body">Total Products: 
                                        <?php
                                        $sql = "SELECT COUNT(*) as total_entries FROM products";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            // Fetch the result as an associative array
                                            $row = $result->fetch_assoc();
                                        
                                            // Display the total number of entries
                                            echo $row['total_entries'];
                                        } else {
                                            echo "0";
                                        }
                                         
                                         ?>  </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="products.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

<?php include('includes/footer.php'); ?>


