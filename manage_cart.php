<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['Add_To_Cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems=array_column($_SESSION['cart'],'item_name');
            if(in_array($_POST['item_name'],$myitems))
            {
                echo"<script>
                   alert('Item Already Added');
                   window.location.href='index.php';
                   </script>";
            }
            else
            {
                $count=count($_SESSION['cart']);
                $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],'Price'=>$_POST['Price'], 'Quantity'=>1);
                echo"<script>
                   alert('Your item has been added to cart');
                   window.location.href='index.php';
                   </script>";
            }
        }
        else{
            $_SESSION['cart'][$count]=array('item_name'=>$_POST['item_name'],'Price'=>$_POST['Price'], 'Quantity'=>1);
            echo"<script>
                   alert('Your item has been added to cart');
                   window.location.href='index.php';
                   </script>";
        }
    }
    if(isset($_POST['Remove_Item']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['item_name']==$_POST['item_name'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart']=array_values($_SESSION['cart']);
                echo"<script>
                 alert('Item Removed');
                 window.location.href='mycart.php';
                 </script>";
            }
        }
    }
}
?>