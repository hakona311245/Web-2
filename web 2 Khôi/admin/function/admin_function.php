<?php 
class adminback 
{
    private $conn;

    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "web2";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Databse connection error!!!");
        }
    }

    function getCategories() {
        $query = "SELECT c.ctg_id, c.ctg_name, COUNT(p.pdt_id) AS item_count 
                  FROM category c
                  LEFT JOIN products p ON c.ctg_id = p.pdt_ctg
                  GROUP BY c.ctg_id";
        $result = mysqli_query($this->conn, $query);
        
        // Debug statement
        // print_r(mysqli_fetch_all($result, MYSQLI_ASSOC));
        
        return $result;
    }

    function getProductsByCategory($ctg_id) {
        $query = "SELECT * FROM products WHERE pdt_ctg = $ctg_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function getProductDetails($pdt_id) {
        $query = "SELECT p.*, c.ctg_name 
                  FROM products p
                  INNER JOIN category c ON p.pdt_ctg = c.ctg_id
                  WHERE p.pdt_id = $pdt_id";
        $result = mysqli_query($this->conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            return $product;
        } else {
            return false;
        }
    }

    function getProductImages($pdt_id) {
        $query = "SELECT * FROM product_images WHERE pdt_id = $pdt_id";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    function search_product($keyword, $offset, $limit, $category = 0, $min_price = 0, $max_price = PHP_INT_MAX) {
        $query = "SELECT * FROM `product_info_ctg` WHERE `pdt_name` LIKE '%$keyword%' AND `pdt_status` = 1";
        if (!empty($category) && $category != 0) {
            $query .= " AND `ctg_id` = $category";
        }
        if ($min_price != 0 || $max_price != PHP_INT_MAX) {
            $query .= " AND `pdt_price` BETWEEN $min_price AND $max_price";
        }
        $query .= " ORDER BY `pdt_id` LIMIT $offset, $limit";
        $search_query = mysqli_query($this->conn, $query);
        if ($search_query) {
            return $search_query;
        } else {
            return null;
        }
    }

    function get_search_results_count($keyword, $category, $min_price, $max_price) {
        $query = "SELECT COUNT(*) as total FROM `product_info_ctg` WHERE `pdt_name` LIKE '%$keyword%' AND `pdt_status` = 1";
        if (!empty($category) && $category != 0) {
            $query .= " AND `ctg_id` = $category";
        }
        if ($min_price != 0 || $max_price != PHP_INT_MAX) {
            $query .= " AND `pdt_price` BETWEEN $min_price AND $max_price";
        }
        $result = $this->conn->query($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return (int) $row['total'];
        } else {
            return 0;
        }
    }
    function getCategoryCounts($keyword) {
        $query = "SELECT c.ctg_id, COUNT(p.pdt_id) AS item_count 
                  FROM category c
                  LEFT JOIN products p ON c.ctg_id = p.pdt_ctg
                  WHERE p.pdt_name LIKE '%$keyword%' AND p.pdt_status = 1
                  GROUP BY c.ctg_id";
        $result = mysqli_query($this->conn, $query);
        
        $category_counts = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $category_counts[$row['ctg_id']] = $row['item_count'];
        }
        
        return $category_counts;
    }
}
