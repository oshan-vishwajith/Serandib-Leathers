<?php 
include('includes/connect.php');

if(isset($_POST["query"])) {

    $output = '';
    $query = "SELECT * FROM item WHERE item_keyword LIKE '%" . mysqli_real_escape_string($connection, $_POST["query"]) . "%'";
    $result = mysqli_query($connection, $query);
    $output .= '<ul class="list-unstyled">';
    $old_keyword = null;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            // Get item details
            $item_id = $row['item_id'];
            $item_keywords = explode(',', $row['item_keyword']); 

            foreach ($item_keywords as $item_keyword) {
                $item_keyword = trim($item_keyword);

                if (stripos($item_keyword, $_POST["query"]) !== false && $item_keyword != $old_keyword) {
                    $output .= '<a style="text-decoration: none; color: inherit;" href="search_result.php?item_keyword=' . $item_keyword . '"><li> ' . $item_keyword . '</li></a>';     
                    $old_keyword = $item_keyword;
                }
            }
        }
    } else {
        $output .= '<li>Item not found</li>';
    }

    $output .= '</ul>';
    echo $output;
}
?>
