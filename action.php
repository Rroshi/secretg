<?php
session_start();
require'config.php';
if(isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $pqty = 1;
    
    $stmt = $conn->prepare("SELECT kodi_produktit FROM cart WHERE kodi_produktit=?");
    $stmt->bind_param("s", $pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['kodi_produktit'];
    
    if(!$code){
        $query = $conn->prepare("INSERT INTO cart (emri_produktit, cmimi_produktit,foto_produktit,sasia,cmimi_total,kodi_produktit )VALUES(?,?,?,?,?,?)");
        $query->bind_param("sssiss", $pname,$pprice,$pimage,$pqty,$pprice,$pcode);
        $query->execute();
        echo'<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Produkti u shtua ne shporten tuaj</strong> 
</div>';
    }else{
        echo'<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Produkti eshte shtuar ne shporten tuaj!</strong> 
</div>';
    }
}
if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;
    echo $rows;
}
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Produkti u hoq nga shporta!';
    header('location:cart.php');
}
if(isset($_GET['clear'])){
    $stmt = $conn->prepare("DELETE FROM cart");
    $stmt->execute();
    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Te gjitha produktet u hoqen nga shporta!';
    header('location:cart.php');
}
if(isset($_POST['pqty'])){
    $pqty = $_POST['pqty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];
    $tprice = $pqty*$pprice;
    $stmt = $conn->prepare("UPDATE cart SET sasia=?, cmimi_total=? WHERE id=?");
    $stmt->bind_param("isi", $pqty, $tprice,$pid);
    $stmt->execute();
}
if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
    $name= $_POST['emri'];
    $email = $_POST['email'];
    $numri = $_POST['numri'];
    $adresa = $_POST['adresa'];
    $produktet = $_POST['produktet'];
    $grand_total = $_POST['grand_total'];
    $data='';
    $stmt = $conn->prepare("INSERT INTO porosia1(emri,email,numri,adresa,produktet,amount) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $email,$numri, $adresa,$produktet,$grand_total);
    $stmt->execute();
    $data .= '<div class="text-center">
    <h1 class="display-4 mt-2 text-danger">Faleminderit!</h1>
    <h2 class="text-success">Porosia juaj u krye me sukses!</h2>
    <h4 class="bg-danger text-light rounded p-2">Produktet e porositura: '.$produktet.'</h4>
    <h4>Emri: '.$name.'</h4>
    <h4>Emaili: '.$email.'</h4>
    <h4>Numri i telefonit: '.$numri.'</h4>
    <h4>Adresa: '.$adresa.'</h4>
    <h4>Pagesa totale: '.number_format($grand_total).' leke</h4>
    </div>';
echo $data;
}
?>