<?php

// Generate multidimensional array from the linear one from query
function generateMenuArray($arr, $parent = 0)
{
    $menus = Array();
    foreach($arr as $menu)
    {
        if($menu['parent_menu'] == $parent)
        {
            $menu['sub'] = isset($menu['sub']) ? $menu['sub'] : generateMenuArray($arr, $menu['id']);
            $menus[] = $menu;
        }
    }
    return $menus;
}

// loop the multidimensional array recursively to generate the HTML
function generateMenuHtml($array)
{
    $html = '';
    foreach($array as $menu)
    {
        $html .= "<div data-id='".$menu['id']."' data-childindex='".$menu['child_index']."' style='margin-left:".$menu['child_index']."rem;'>";
        $html .= "<input id='name' type='text' value='".$menu['menu_name']."'><input id='add' type='button' value='+'><input id='remove' type='button' value='-'>";
        $html .= generateMenuHtml($menu['sub']);
        $html .= "</div>";
    }
    return $html;
}

$sql_query = "SELECT * FROM menus ORDER BY child_index, parent_menu";
$result = mysqli_query($con,$sql_query);
$rows = Array();
while($row = mysqli_fetch_assoc($result)) {
	$row['id'] = (int) $row['id'];
	$row['parent_menu'] = (int) $row['parent_menu'];
	array_push($rows, $row);
 }
$menuArray = generateMenuArray($rows);
echo generateMenuHtml($menuArray);
 ?>