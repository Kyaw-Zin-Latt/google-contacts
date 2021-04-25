<?php include "header.php"; ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="css/all.css">


<div class="container_fluid">
    <div class="row">
        <div class="container">
        <div class="row">
                <div class="col-12">
                    <div class="card m-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 ">
                                    <i class="fas fa-list text-primary"></i> Contact Lists
                                </h4>
                                <div class="">
                                    <a href="form.php" class="btn btn-outline-primary full-screen-btn">
                                        <i class="fas fa-upload"></i>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><i class="fas fa-user text-primary"></i> Name</th>
                                        <th><i class="fas fa-phone text-primary"></i> Phone</th>
                                        <th><i class="fas fa-envelope text-primary"></i> Email</th>
                                        <th><i class="fas fa-clock text-primary"></i> Created_at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM contacts";
                                            $query = mysqli_query($conn,$sql);
                                            $total_row = mysqli_num_rows($query);
                                
                                            while ($row = mysqli_fetch_assoc($query)){
                                                $time = date("h:i", strtotime($row['created_at']));
                                  
                                        //    foreach (categoryList() as $row){
                                        //     $time = date("h:i", strtotime($row['created_at']));
                                        ?>
                                
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td class="text-nowrap text-primary ">
                                                <div>
                                                    <img src="<?php echo $row['photo']; ?>" class="rounded-circle mr-2" alt="">
                                                    <?php echo $row['name'] ?>
                                                </div>
                                                </td>
                                                <td class="align-middle text-primary"><?php echo $row['phone'] ?></td>
                                                <td class="align-middle text-primary"><?php echo $row['email'] ?></td>
                                                <td class="align-middle text-primary"><?php echo $time ?></td>

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
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // ordering
            "order": [[ 0, 'desc' ]]
        });
    } );
</script>
