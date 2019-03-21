<?php

function slug($string, $options = array())
    {
        $slugTransliterationMap = array(
            'á' => 'a',
            'à' => 'a',
            'ả' => 'a',
            'ã' => 'a',
            'ạ' => 'a',
            'â' => 'a',
            'ă' => 'a',
            'Á' => 'A',
            'À' => 'A',
            'Ả' => 'A',
            'Ã' => 'A',
            'Ạ' => 'A',
            'Â' => 'A',
            'Ă' => 'A',
            'ấ' => 'a',
            'ầ' => 'a',
            'ẩ' => 'a',
            'ẫ' => 'a',
            'ậ' => 'a',
            'Ấ' => 'A',
            'Ầ' => 'A',
            'Ẩ' => 'A',
            'Ẫ' => 'A',
            'Ậ' => 'A',
            'ắ' => 'a',
            'ằ' => 'a',
            'ẳ' => 'a',
            'ẵ' => 'a',
            'ặ' => 'a',
            'Ắ' => 'A',
            'Ằ' => 'A',
            'Ẳ' => 'A',
            'Ẵ' => 'A',
            'Ặ' => 'A',
            'đ' => 'd',
            'Đ' => 'D',
            'é' => 'e',
            'è' => 'e',
            'ẻ' => 'e',
            'ẽ' => 'e',
            'ẹ' => 'e',
            'ê' => 'e',
            'É' => 'E',
            'È' => 'E',
            'Ẻ' => 'E',
            'Ẽ' => 'E',
            'Ẹ' => 'E',
            'Ê' => 'E',
            'ế' => 'e',
            'ề' => 'e',
            'ể' => 'e',
            'ễ' => 'e',
            'ệ' => 'e',
            'Ế' => 'E',
            'Ề' => 'E',
            'Ể' => 'E',
            'Ễ' => 'E',
            'Ệ' => 'E',
            'í' => 'i',
            'ì' => 'i',
            'ỉ' => 'i',
            'ĩ' => 'i',
            'ị' => 'i',
            'Í' => 'I',
            'Ì' => 'I',
            'Ỉ' => 'I',
            'Ĩ' => 'I',
            'Ị' => 'I',
            'ó' => 'o',
            'ò' => 'o',
            'ỏ' => 'o',
            'õ' => 'o',
            'ọ' => 'o',
            'ô' => 'o',
            'ơ' => 'o',
            'Ó' => 'O',
            'Ò' => 'O',
            'Ỏ' => 'O',
            'Õ' => 'O',
            'Ọ' => 'O',
            'Ô' => 'O',
            'Ơ' => 'O',
            'ố' => 'o',
            'ồ' => 'o',
            'ổ' => 'o',
            'ỗ' => 'o',
            'ộ' => 'o',
            'Ố' => 'O',
            'Ồ' => 'O',
            'Ổ' => 'O',
            'Ỗ' => 'O',
            'Ộ' => 'O',
            'ớ' => 'o',
            'ờ' => 'o',
            'ở' => 'o',
            'ỡ' => 'o',
            'ợ' => 'o',
            'Ớ' => 'O',
            'Ờ' => 'O',
            'Ở' => 'O',
            'Ỡ' => 'O',
            'Ợ' => 'O',
            'ú' => 'u',
            'ù' => 'u',
            'ủ' => 'u',
            'ũ' => 'u',
            'ụ' => 'u',
            'ư' => 'u',
            'Ú' => 'U',
            'Ù' => 'U',
            'Ủ' => 'U',
            'Ũ' => 'U',
            'Ụ' => 'U',
            'Ư' => 'U',
            'ứ' => 'u',
            'ừ' => 'u',
            'ử' => 'u',
            'ữ' => 'u',
            'ự' => 'u',
            'Ứ' => 'U',
            'Ừ' => 'U',
            'Ử' => 'U',
            'Ữ' => 'U',
            'Ự' => 'U',
            'ý' => 'y',
            'ỳ' => 'y',
            'ỷ' => 'y',
            'ỹ' => 'y',
            'ỵ' => 'y',
            'Ý' => 'Y',
            'Ỳ' => 'Y',
            'Ỷ' => 'Y',
            'Ỹ' => 'Y',
            'Ỵ' => 'Y'
        );
    
        $options = array_merge(array(
            'delimiter' => '-',
            'transliterate' => true,
            'replacements' => array(),
            'lowercase' => true,
            'encoding' => 'UTF-8'
        ), $options);
    
        if ($options['transliterate']) {
            $string = str_replace(array_keys($slugTransliterationMap), $slugTransliterationMap, $string);
        }
    
        if (is_array($options['replacements']) && !empty($options['replacements'])) {
            $string = str_replace(array_keys($options['replacements']), $options['replacements'], $string);
        }
    
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $string);
    
        $string = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', trim($string, $options['delimiter']));
    
        if ($options['lowercase']) {
            $string = mb_strtolower($string, $options['encoding']);
        }
    
        return $string;
    }

// Displaying in all-categories
function category_table ($categories,$pivot = 0, $str = "") {

    foreach ($categories as $category) {

        $id = $category["id"];
        $category_name = $category["category_name"];
        $slug = $category["slug"];
        $parent_id = $category["parent_id"];
        $status = $category["status"];
        $keywords = $category["keywords"];
        $description = $category["description"];

        if ($parent_id == $pivot) {

            if ($parent_id == 0){
                echo    "<tr style='background-color: rgb(214, 214, 214)' class='text-dark' title='Parent'>";
                echo    "<td>$id</td>"; 
                echo    "<td>$category_name</td>";
                echo    "<td>None</td>";
            }
            else {
                echo    "<tr>";
                echo    "<td>$id</td>";
                echo    "<td>$str | $category_name</td>";
                $cate = DB::table('categories')
                ->where('id',$parent_id)
                ->first();
                echo    "<td>- $cate->category_name</td>";
            }

            echo    "<td>$slug</td>";

            if ($status == "active"){
                echo    "<td style='color: rgb(32, 223, 80)'>Enabled</td>";
            } elseif ($status == "deactivated") {
                echo    "<td style='color: rgb(237, 48, 52)'>Disabled</td>"; 
            }

            echo "
                <td class='text-center' style='width: 150px'>
                    <span class='btn btn-group'>
                    <button type='button' class='mb-2 btn btn-sm btn-info mr-1 animated bounceIn' title='Details' data-toggle='modal' data-target='#detailsOf".$id."'>
                        <i class='fas fa-info-circle'></i>
                    </button>
                    <div class='modal fade' id='detailsOf".$id."' tabindex='-1' role='dialog' aria-labelledby='detailsOf".$id."Title' aria-hidden='true'>
                        <div class='modal-dialog modal-dialog-centered' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='detailsOf".$id."Title'>Category's details</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body'>
                                    <ul class='list-group list-group-flush text-left'>
                                        <li class='list-group-item'><b>Status : </b>".$status."</li>
                                        <li class='list-group-item'><b>ID : </b>".$id."</li>
                                        <li class='list-group-item'><b>Tag's name : </b>".$category_name."</li>
                                        <li class='list-group-item'><b>Keywords : </b>".$keywords."</li>
                                        <li class='list-group-item'><b>Description : </b>".$description."</li>
                                    </ul>
                                </div>
                                <div class='modal-footer'>
                                    <a href='".route('category.edit',$id)."' class='btn btn-warning text-danger animated bounceIn' title='Edit'>
                                        Edit
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            ";

            if ($status == "deactivated"){
                echo "
                    <form method='POST' action='".route('category.activate', $id)."'>
                        ".csrf_field()."
                        <button type='submit' class='mb-2 mr-1 btn btn-sm btn-success animated bounceIn hvr-buzz-out rounded-0' title='Activate'><i class='fas fa-undo-alt'></i></button>
                    </form>                    
                ";                    
            };

                if ($parent_id == 0){
                    $disabled = "disabled";
                    $delete_title = "Action disabled with super parent category";
                } else {
                    $disabled = "";
                    $delete_title = "Delete";
                }
                echo "
                        <a href='".route('category.edit',$id)."' class='mb-2 btn btn-sm btn-warning mr-1 animated bounceIn' title='Edit'>
                            <i class='far fa-edit'></i>
                        </a>
                        
                        <a href='#' type='button' class='mb-2 btn btn-sm btn-danger mr-1 hvr-buzz-out animated bounceIn' data-toggle='modal' data-target='#modalOf$id' title='Delete'>
                            <i class='far fa-trash-alt'></i>
                        </a>
                    </span>
                    <div class='modal fade' id='modalOf$id' tabindex='-1' role='dialog' aria-labeledby='modalLabel' aria-hidden='true'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='modalLabel'>Delete category <b><em>$category_name</em></b></h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true' class='hvr-rotate'>&times;</span>
                                    </button>
                                </div>
                                <div class='modal-body text-center'>
                                        <i style='color: red; font-size: 72px ' class='fas fa-exclamation-circle'></i>
                                        <h3><small>Are your sure ? This action can't be undone !</small></h3>
                                        <h3>Deleting categories which have child cause seriously bad effect !</h3>
                                    <h4><small><em>'Category can be kept but disabled'</em></small></h4>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-secondary hvr-bounce-in' data-dismiss='modal'>Cancel</button>";
                        if($status =='active'){
                            echo "
                                <form method='POST' action='".route('category.deactivate', $id)."'>
                                    ".csrf_field()."
                                    <button class='btn btn-warning  hvr-buzz-out' type='submit'>Deactivate</button>
                                </form>
                            ";           
                        }
                        echo    "
                                    <form method='POST' action='".route('category.destroy', $id)."'>
                                        <input type='hidden' name='_method' value='delete'>
                                        ".csrf_field()."
                                        <button class='btn btn-danger hvr-buzz ' type='submit' title='".$delete_title."' ".$disabled.">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            ";
            category_table ($categories,$id, $str . "<span>-<span>");
        }
    }
}

// Displaying in add-category and edit-category
function category_option ($categories, $select = 0, $pivot = 0, $str = "-") {

    foreach ($categories as $value) {

        $id = $value["id"];
        $category_name = $value["category_name"];
        $parent_id = $value["parent_id"];  
    
        if ($parent_id == $pivot){
            if ($select != 0 && $id == $select){
                echo "<option value='$id' selected='selected' title='Parent category'>$str $category_name</option>";
            }
            else {
                echo "<option value='$id' title='Parent category'>$str $category_name</option>";
            }

            category_option($categories, $select, $id, $str . "-");
        }
    }
}

function show_breadcrumb($category, $str = "") {
    if($category->parent->parent_id == 0) {
        
        print_r(
            "<a href='".route('category.show',$category->parent->id)."'>".
                $category->parent->category_name.
            "</a>".
            " > ".
            $str
        );
    };
    show_breadcrumb(
        $category->parent,
        "<a href='".route('category.show', $category->parent->id)."'>".
            $category->parent->category_name.
        "</a>".
        " > ". $str
    );
}

?>