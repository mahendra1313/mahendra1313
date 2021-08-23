<?php

function getCatogory($connection, $id)
{
    $query = "SELECT * FROM category WHERE id = $id";
    $run=mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['name'];

}



function getPostName($connection, $id)
{
    $query = "SELECT * FROM blog WHERE id = $id";
    $run=mysqli_query($connection, $query);
    $data = mysqli_fetch_assoc($run);
    return $data['title'];

}

function getSubMenu($connection, $menu_id)
{
    $query = "SELECT * FROM submenu WHERE parent_menu_id = $menu_id";
    $run=mysqli_query($connection, $query);
    $data =  array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    
    return $data;

}

function getSubMenuNo($connection, $menu_id)
{
    $query = "SELECT * FROM submenu WHERE parent_menu_id = $menu_id";
    $run=mysqli_query($connection, $query);
    return mysqli_num_rows($run);

}


function getComments($connection, $post_id)
{
    $query = "SELECT * FROM comments WHERE post_id = $post_id ORDER BY id DESC";
    $run=mysqli_query($connection, $query);
    $data =  array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    
    return $data;

}

function getAllCategory($connection)
{
    $query = "SELECT * FROM category";
    $run=mysqli_query($connection, $query);
    
    $data=array();
    while($d=mysqli_fetch_assoc($run)){
        $data[]=$d;
    }
    
    return $data;

}

?>

