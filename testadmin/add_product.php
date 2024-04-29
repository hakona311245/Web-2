<?php
require_once("databaseadmin.php");
require_once("session.php");
require_once("function.php");

    if(isPost()){
        $filterAll = filter();
        $errors = [];
        
        if(empty($filterAll['product_name'])){
            $errors ['product_name']['required'] = 'Tên sản phẩm bắt buộc phải nhập'; 
        }
    
        if(empty($filterAll['hinhanh'])){
            $errors ['hinhanh']['required'] = 'Hình ảnh bắt buộc phải nhập'; 
        }

        if(empty($filterAll['volume'])){
            $errors ['volume']['required'] = 'Vui lòng nhập số lượng'; 
        }

        if(empty($filterAll['price'])){
            $errors ['price']['required'] = 'Vui lòng nhập giá bán'; 
        }

        if(empty($filterAll['CPU'])){
            $errors ['CPU']['required'] = 'Vui lòng nhập CPU'; 
        }

        if(empty($filterAll['VGA'])){
            $errors ['VGA']['required'] = 'Vui lòng nhập VGA'; 
        }

        if(empty($filterAll['screen_size'])){
            $errors ['screen_size']['required'] = 'Vui lòng nhập kích thước màn'; 
        }

        if(empty($filterAll['Memory'])){
            $errors ['Memory']['required'] = 'Vui lòng nhập kích thước bộ nhớ'; 
        }

        if(empty($filterAll['RAM'])){
            $errors ['RAM']['required'] = 'Vui lòng nhập RAM'; 
        }

        if(empty($filterAll['brand'])){
            $errors ['brand']['required'] = 'Vui lòng nhập RAM'; 
        }

        if(empty($filterAll['resolution'])){
            $errors ['resolution']['required'] = 'Vui lòng nhập kích thước bộ nhớ'; 
        }

        if(empty($filterAll['weight'])){
            $errors ['weight']['required'] = 'Vui lòng nhập RAM'; 
        }

        if(empty($filterAll['description'])){
            $errors ['description']['required'] = 'Vui lòng nhập RAM'; 
        }

        // echo '<pre>';
        // print_r($errors);
        // echo '</pre>';
        
        if(empty($errors)){
            
           
            $dataInsert = [
                'product_id' => $filterAll['product_id'],
                'product_name' => $filterAll['product_name'],
                'hinhanh' => 'img/productimg/randomimg/'.$filterAll['hinhanh'],
                'volume' => $filterAll['volume'],
                'price' => $filterAll['price'],
                'CPU' => $filterAll['CPU'],
                'VGA' => $filterAll['VGA'],
                'screen_size' => $filterAll['screen_size'],
                'Memory' => $filterAll['Memory'],
                'RAM' => $filterAll['RAM'],
                'brand' => $filterAll['brand'],
                'resolution' => $filterAll['resolution'],
                'weight' => $filterAll['weight'],
                'description' => $filterAll['description'],
            ];
            
            $insertStatus = insert('sanpham', $dataInsert);
            if($insertStatus){
                setFlashData('smg', 'Thêm sản phẩm thành công!!');
                setFlashData('smg_type', 'success');
                // redirect('?module=user&action=list_user');
            }
        }else{
            setFlashData('errors', $errors);
            setFlashData('old', $filterAll);
            // redirect('?module=user&action=list_user');
        }
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
                                                    <input name="hinhanh" class="form-control" id="inputFirstName" type="file" name="fileUpload" onchange="previewImage(event)">
                                                    <label for="inputFirstName">Image</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="preview"></div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="product_id" class="form-control" id="inputFirstName" type="text" placeholder="Enter product ID" />
                                                    <label for="inputFirstName">Product ID</label>
                                                    <?php echo (!empty($errors['product_id']['required'])) ? '<span class="error-message">' . $errors['product_id']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="id_phanloai" class="form-control" id="inputFirstName" type="text" placeholder="Enter category ID" />
                                                    <label for="inputFirstName">Category ID</label>
                                                    <?php echo (!empty($errors['id_phanloai']['required'])) ? '<span class="error-message">' . $errors['id_phanloai']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="product_name" class="form-control" id="inputFirstName" type="text" placeholder="Enter product name" />
                                                    <label for="inputFirstName">Product name</label>
                                                    <?php echo (!empty($errors['product_name']['required'])) ? '<span class="error-message">' . $errors['product_name']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="volume" class="form-control" id="inputFirstName" type="text" placeholder="Enter volume" />
                                                    <label for="inputFirstName">Volume</label>
                                                    <?php echo (!empty($errors['volume']['required'])) ? '<span class="error-message">' . $errors['volume']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="price" class="form-control" id="inputFirstName" type="text" placeholder="Enter price" />
                                                    <label for="inputFirstName">Price</label>
                                                    <?php echo (!empty($errors['price']['required'])) ? '<span class="error-message">' . $errors['price']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="CPU" class="form-control" id="inputFirstName" type="text" placeholder="Enter CPU model" />
                                                    <label for="inputFirstName">CPU</label>
                                                    <?php echo (!empty($errors['CPU']['required'])) ? '<span class="error-message">' . $errors['CPU']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="VGA" class="form-control" id="inputFirstName" type="text" placeholder="Enter VGA model" />
                                                    <label for="inputFirstName">VGA</label>
                                                    <?php echo (!empty($errors['VGA']['required'])) ? '<span class="error-message">' . $errors['VGA']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="screen_size" class="form-control" id="inputFirstName" type="text" placeholder="Enter screen size" />
                                                    <label for="inputFirstName">Screen size</label>
                                                    <?php echo (!empty($errors['screen_size']['required'])) ? '<span class="error-message">' . $errors['screen_size']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="Memory" class="form-control" id="inputFirstName" type="text" placeholder="Enter memory size" />
                                                    <label for="inputFirstName">Memory</label>
                                                    <?php echo (!empty($errors['Memory']['required'])) ? '<span class="error-message">' . $errors['Memory']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="RAM" class="form-control" id="inputFirstName" type="text" placeholder="Enter RAM size" />
                                                    <label for="inputFirstName">RAM</label>
                                                    <?php echo (!empty($errors['RAM']['required'])) ? '<span class="error-message">' . $errors['RAM']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="brand" class="form-control" id="inputFirstName" type="text" placeholder="Enter brand" />
                                                    <label for="inputFirstName">Brand</label>
                                                    <?php echo (!empty($errors['brand']['required'])) ? '<span class="error-message">' . $errors['brand']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="resolution" class="form-control" id="inputFirstName" type="text" placeholder="Enter resolution" />
                                                    <label for="inputFirstName">Resolution</label>
                                                    <?php echo (!empty($errors['resolution']['required'])) ? '<span class="error-message">' . $errors['resolution']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="weight" class="form-control" id="inputFirstName" type="text" placeholder="Enter weight" />
                                                    <label for="inputFirstName">Weight</label>
                                                    <?php echo (!empty($errors['weight']['required'])) ? '<span class="error-message">' . $errors['weight']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="description" class="form-control" id="inputFirstName" type="text" placeholder="Enter description" />
                                                    <label for="inputFirstName">Description</label>
                                                    <?php echo (!empty($errors['description']['required'])) ? '<span class="error-message">' . $errors['description']['required'] . '</span>' : null;?>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-primary btn-block" href="">Add Product</button></div>
                                            </div>                                          
                                        </form>
                                        <br>
                                        <a style="text-align : center;" class="nutdidetrove"  href="index.php"><button class="trovenao" style="border-radius :8px; color :black;">Trở về</button></a>
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
