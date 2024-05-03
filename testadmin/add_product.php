<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

    if(isPost()){
        $filterAll = filter();
        $errors = [];
        
        if(empty($filterAll['pdt_name'])){
            $errors ['pdt_name']['required'] = 'Tên sản phẩm bắt buộc phải nhập'; 
        }
        
        if(empty($filterAll['pdt_img'])){
            $errors ['pdt_img']['required'] = 'Hình ảnh bắt buộc phải nhập'; 
        }
        
        if(empty($filterAll['pdt_stock'])){
            $errors ['pdt_stock']['required'] = 'Vui lòng nhập số lượng'; 
        }
        
        if(empty($filterAll['pdt_price'])){
            $errors ['pdt_price']['required'] = 'Vui lòng nhập giá bán'; 
        }
        
        if(empty($filterAll['pdt_ctg'])){
            $errors ['pdt_ctg']['required'] = 'Vui lòng nhập phân loại'; 
        }
        
        if(empty($filterAll['pdt_des'])){
            $errors ['pdt_des']['required'] = 'Vui lòng nhập mô tả sản phẩm'; 
        }
        
        if(empty($filterAll['pdt_status'])){
            $errors ['pdt_status']['required'] = 'Vui lòng nhập mô tả sản phẩm'; 
        }

        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
            
        if(empty($errors)){
            
           
            $dataInsert = [
                'pdt_name' => $filterAll['pdt_name'],
                'pdt_img' => $filterAll['pdt_img'], //'img/productimg/randomimg/'.
                'pdt_stock' => $filterAll['pdt_stock'],
                'pdt_price' => $filterAll['pdt_price'],
                'pdt_ctg' => $filterAll['pdt_ctg'],
                'pdt_des' => $filterAll['pdt_des'],
                'pdt_status' => $filterAll['pdt_status'],


            ];
        }
        
            
            $insertStatus = insert('products', $dataInsert);
            if($insertStatus){
                setFlashData('smg', 'Thêm sản phẩm thành công!!');
                setFlashData('smg_type', 'success');
                // redirect('?module=user&action=list_user');
            }
        }else{
            // setFlashData('errors', $errors);
            // setFlashData('old', $filterAll);
            // redirect('?module=user&action=list_user');
        }

    $smg = getFlashData('smg');
    $smg_type = getFlashData('smg_type');
    $errors = getFlashData('errors');
    // $old = getFlashData('old');
    // $userInfo = getFlashData('user_detail');
    // if(!empty($userInfo)){
    //     $old = $userInfo;
    // }
    
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">SGtech</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
    <body class="">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Product</h3></div>
                                    <div class="card-body">
                                        <form method="post">

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_img" class="form-control" id="inputFirstName" type="file" name="fileUpload" onchange="previewImage(event)">
                                                    <label for="inputFirstName">Image</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="preview"></div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_name" class="form-control" id="inputProductName" type="text" placeholder="Enter product name" />
                                                    <label for="inputProductName">Product Name</label>
                                                    <?php echo (!empty($errors['pdt_name']['required'])) ? '<span class="error-message">' . $errors['pdt_name']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_price" class="form-control" id="inputProductPrice" type="text" placeholder="Enter product price" />
                                                    <label for="inputProductPrice">Product Price</label>
                                                    <?php echo (!empty($errors['pdt_price']['required'])) ? '<span class="error-message">' . $errors['pdt_price']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_des" class="form-control" id="inputProductDescription" type="text" placeholder="Enter product description" />
                                                    <label for="inputProductDescription">Product Description</label>
                                                    <?php echo (!empty($errors['pdt_des']['required'])) ? '<span class="error-message">' . $errors['pdt_des']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_ctg" class="form-control" id="inputProductCategory" type="text" placeholder="Enter product category" />
                                                    <label for="inputProductCategory">Product Category</label>
                                                    <?php echo (!empty($errors['pdt_ctg']['required'])) ? '<span class="error-message">' . $errors['pdt_ctg']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_stock" class="form-control" id="inputProductStock" type="text" placeholder="Enter product stock" />
                                                    <label for="inputProductStock">Product Stock</label>
                                                    <?php echo (!empty($errors['pdt_stock']['required'])) ? '<span class="error-message">' . $errors['pdt_stock']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="pdt_status" class="form-control" id="inputProductStatus" type="text" placeholder="Enter product status" />
                                                    <label for="inputProductStatus">Product Status</label>
                                                    <?php echo (!empty($errors['pdt_status']['required'])) ? '<span class="error-message">' . $errors['pdt_status']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>


                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="">Add Product</button></div>
                                            </div>                                          
                                        </form>
                                        <br>
                                        <a style="text-align : center;" class="nutdidetrove"  href="index1.php"><button class="trovenao" style="border-radius :8px; color :black;">Trở về</button></a>
                                        <br>
                                    </div>
                        
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview');
                output.innerHTML = '<img src="' + reader.result + '"style = "margin-left : 30px;" width="300" height="300" />';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</html>
