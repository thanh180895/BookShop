<div class="container-fluid">
    <h3 class="text-dark mb-4">Products</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold"></p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                <option value="10" selected="">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>&nbsp;</label></div>
                </div>
                <div class="col-md-6">                    
                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><a type="button" class="form-control form-control-sm" aria-controls="dataTable" href="admin.php?controller=products&action=view">Back</a></label></div>   
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
               
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Produce</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($items as $key => $item) : ?>
                                <tr>
                                    <td><?= ++$key ?></td>
                                    <td><?= $item->productName ?>
                                    <td><?= $item->productCode ?>
                                    <td><?= $item->price ?>
                                    <td><?= $item->description ?>
                                    <td><?= $item->producer ?>                             
                                    <td>
                                        <a href="admin.php?controller=products&action=delete&id=<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete?')" type="button" class="btn btn-danger"><i class="far fa-trash-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></a>
                                        <a href="admin.php?controller=products&action=update&id=<?php echo $item->id; ?>" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt d-xl-flex justify-content-xl-center align-items-xl-center"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                    </table>
           
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                </div>
                <div class="col-md-6">
                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                        <ul class="pagination">
                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>