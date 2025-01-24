<?php

require_once '../others/class/main_funtions.php';
$app = new setting();

//==============================================================================

if (isset($_POST['action'])) {
    if ($_POST['action'] == "search_items") {
        $items = "";
        $query = "SELECT
           item_details.item_id,
           item_details.item_code,
           item_details.item_name,
           item_details.photo,
           item_details.item_rent_price,
           item_details.item_status,
           IFNULL(system_inventory.avl_qty,0) AS stock
           FROM
           item_details
           LEFT JOIN system_inventory ON system_inventory.item_id = item_details.item_id
           INNER JOIN fabric_details ON item_details.fabric_type = fabric_details.fabric_id
           INNER JOIN item_category_details ON item_details.item_category = item_category_details.cat_id
           INNER JOIN design_details ON item_details.design_type = design_details.design_id
           INNER JOIN size_details ON item_details.size = size_details.size_id
           WHERE
           item_details.gender_type = '{$_POST['search_type']}' AND
           (item_details.item_code LIKE '{$_POST['search_value']}%' OR
           item_details.color LIKE '{$_POST['search_value']}%' OR
           item_details.item_name LIKE '{$_POST['search_value']}%' OR
           fabric_details.fabric_name LIKE '{$_POST['search_value']}%' OR
           item_category_details.cat_name LIKE '{$_POST['search_value']}%' OR
           design_details.design_name LIKE '{$_POST['search_value']}%' OR
           size_details.size LIKE '{$_POST['search_value']}%')";
        $result = $app->basic_Select_Query($query);
        $stock = 0;
        foreach ($result AS $a) {
            if ($a['stock'] != 0) {
                $stock = "<span style='color: green'>" . $a['stock'] . ' Left In Stock</span>';
            } else {
                $stock = "<span style='color: red'>Out of Stock</span>";
            }
            $items .= '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                        <!-- Block2 -->
                        <div class="block2"><div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="../wdrms/others/uploads/' . $a['photo'] . '" alt="' . $a['item_code'] . '">

                                <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        ' . $a['item_name'] . '
                                    </a>

                                    <span class="stext-105 cl3">
                                        ' . $stock . ' | <b>Rs.' . $a['item_rent_price'] . '</b>
                                    </span>
                                </div>

                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04" src="./others/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="./others/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div></div>';
        }
        echo $items;
    } elseif ($_POST['action'] == "get_selected_item_details") {
        $query = "SELECT
                  item_details.item_code,
                  item_details.item_name,
                  item_details.item_keep_days,
                  item_details.photo,
                  item_details.item_rent_price,
                  IFNULL(system_inventory.avl_qty,'0') AS qty
                  FROM
                  item_details
                  LEFT JOIN system_inventory ON system_inventory.item_id = item_details.item_id
                  WHERE
                  item_details.item_id = '{$_POST['item_id']}'";
        $app->json_encoded_select_query($query);
    }
}