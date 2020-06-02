<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en-AL">

<head>
      <title>Lule</title>
      <link href="" rel="shortcut icon" type="image/vnd.microsoft.icon" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="css/main.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>


<body>
    <div id="top">.</div>
         
<!-- ################ Navbar #################### --> 
  
    <nav id="menu1" class=" navbar fixed-top navbar-expand-lg ">
     <div class="container">
        <a class="navbar-brand"  href="index1.html">
            <?php echo "<img src='logo.png' title='Secret Garden Logo' alt='Secret Garden logo' style='width:130px;'/>"; ?>
        </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" onclick="myFunction(this)"> 
                <div class="toggler-btn">
                    <div class="icon-bar top-bar"></div>
                    <div class="icon-bar middle-bar"></div>
                    <div class="icon-bar bottom-bar"></div>
                </div>
             </button> 
                
         <div class="collapse navbar-collapse " id="myNavbar" style="text-align: center">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item ">
                  <a href="#oferta" class="nav-link" title="Oferta"><b>Oferta</b></a>
                </li> 
                <li class="nav-item ">
                  <a href="#raste" class="nav-link" title="Raste"><b>Raste</b></a>
                </li> 
                <li class="nav-item ">
                  <a href="#lule" class="nav-link" title="Lule"><b>Lule</b></a>
                </li> 
                <li class="nav-item ">
                  <a href="#dhurata" class="nav-link" title="Dhurata"><b>Dhurata</b></a>
                </li> 
                <li class="nav-item ">
                  <a href="#gallery" class="nav-link" title="Gallery"><b>Gallery</b></a>
                </li> 
                <li class="nav-item ">
                <a href="#rrethnesh" class="nav-link" title="Rreth Nesh"><b>Rreth nesh</b></a>
                </li>
                <li class="nav-item">
                  <a href="#vendodhja" class="nav-link" title="Vendodhja"><b>Vendodhja</b></a>
                </li>
           </ul>
                
                 <a href="cart.php" style="text-decoration:none;">
                   <span class="cart-icon mr-lg-3" title="Shporta juaj">
                       <i class="fas fa-shopping-cart"></i> <span id="cart-item"></span>
                   </span>
                 </a>
        
                <form class="form-inline d-none d-lg-block"></form>
       </div>
    </div>
</nav>
    
<!-- ################ end of NAVBAR #################### -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<!--Shporta-->
    <div class="container">
      <div class="row justify-content-center"> 
        <div class="col-lg-10">
           <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];} else{echo 'none'; unset($_SESSION['showAlert']);}?>" class="alert alert-success alert-dismissible mt-3">
               <button type="button" class="close" data-dismiss="alert">&times;</button>
               <strong><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['showAlert']);?></strong>
           </div>
            
               <div class="table-responsive mt-2">
                 <table class="table table-bordered text-center">
                   <thead>
                    <tr>
                        <td colspan="7" style="background-color:#171717; border: 2px solid #171717;">
                            <h4 class="text-center m-0" style="color:#F7EBEB; border: 2px solid #171717;">Produktet ne shporten tuaj</h4>
                        </td>
                    </tr>
                    <tr style="background-color:#F7EBEB; border: 2px solid black;">
                        <th style=" border: 2px solid #171717;">ID</th>
                        <th style=" border: 2px solid #171717;">Foto</th>
                        <th style=" border: 2px solid #171717;">Emri</th>
                        <th style=" border: 2px solid #171717;">Cmimi</th>
                        <th style=" border: 2px solid #171717;">Sasia</th>
                        <th style=" border: 2px solid #171717;">Cmimi total</th>
                        <th style=" border: 2px solid #171717;">
                            <a href="action.php?clear=all" class="badge p-1"  style="background-color:#171717; color:#F7EBEB; border: 2px solid #171717;" onclick="return confirm('A jeni te sigurt qe doni te fshini produktet qe keni ne shporte?')">Fshini produktet</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'config.php';
                        $stmt = $conn->prepare("SELECT * FROM cart");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while($row = $result->fetch_assoc()):
                        ?>
                        <tr style="border: 2px solid #171717;">
                            <td style="border: 2px solid #171717;"><?= $row['kodi_produktit']?></td>
                            <input type="hidden" class="pid" value="<?= $row['id']?>">
                            <td style="border: 2px solid #171717;"><img src="<?= $row['foto_produktit']?>" width="50"alt=""></td>
                            <td style="border: 2px solid #171717;"><?= $row['emri_produktit']?></td>
                            <td style="border: 2px solid #171717;"><?= number_format($row['cmimi_produktit'])?> leke</td>
                            <input type="hidden" class="pprice" value="<?=$row['cmimi_produktit']?>">
                            <td style="border: 2px solid #171717;"><input type="number" class="form-control itemQty" value="<?= $row['sasia']?>" style="width:70px; "></td>
                            <td style="border: 2px solid #171717;"><?= number_format($row['cmimi_total'])?> leke</td>
                            <td style="border: 2px solid #171717;">
                                <a href="action.php?remove=<?= $row['id']?>" class="text-danger" onclick="return confirm('A jeni te sigurt qe doni te hiqni produktin nga shporta?')"><i class="fas fa-trash-alt" style="color:#171717;"></i></a>
                            </td>                    
                        </tr>
                        <?php
                        $grand_total +=$row['cmimi_total'];
                          ?>
                        <?php endwhile; ?>
                        <tr style="border: 2px solid #171717;">
                           <td colspan="3" style="border: 2px solid #171717; background-color:#F7EBEB;">
                               <button onclick="Shkombrapa()" class="btn" style="color:#F7EBEB; background-color:#171717;"><b>Vazhdoni blerjen</b></button>
                           </td>
                           <td colspan="2" style="border: 2px solid #171717; background-color:#F7EBEB;"><b>Cmimi total:</b></td>
                            <td style="background-color:#F7EBEB;"><b><?= number_format($grand_total)?> leke</b></td>
                            <td style="border: 2px solid #171717; background-color:#F7EBEB;">
                                <a href="checkout.php" class="btn <?=($grand_total>1)?"":"disabled";?>" style="color:#FFFFFF; background-color:#171717" ><b>Perfundoni blerjen</b></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
     </div>      

<!--Fundi i shportes-->
          
<!-- ########### Footer #############-->
    <br>
    <br>
<div style="background-color: #F7EBEB;"> 
    <div class="footer">
        <br>
            <h5 class="primary-color">Ne jemi te hapur 24 ore ne dite, ne 7 dite te javes!</h5>
                <div class="icon">
           
                    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=DmwnWrRlRHxTFwztpSvWltSRQZznQSdQLgKTbKWmmwcxvwFQJbPDKvMldxWwGvxZTDFvDsWqlzJb" title="Na kontaktoni ne Gmail" class="lord mr-3px social-media">
                        <i class="far fa-envelope"></i>
                    </a>
                    <span class="primary-color">secretgarden@gmail.com</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            
                    <a href="tel:0685572545" title="Numri i telefonit"  class="mr-3px lord social-media">
                        <i class="fa fa-phone"></i>
                    </a>
                    <span class="primary-color">0685572545</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            
                    <a href="https://www.google.com/maps/search/sauk+i+vjeter/@41.3389475,19.7956444,12z/data=!3m1!4b1" title="Vendodhja"  class="mr-3px lord social-media">
                        <i class="fas fa-home"></i>
                    </a><span class="primary-color">Rruga Hoxha Tahsim</span>
                        
                    <hr style="primary-color">
                 </div>
    </div> 
     <br>
   
    <center>
        <form method="post" action="//submit.form" onSubmit="return validateForm();" style="background-color: #F7EBEB;">
            <div style="padding-bottom: 18px;font-size : 20px;">Vendosni emailin tuaj per t'u njoftuar per ofertat me te fundit</div>
                <input type="text" id="news" style="width: 240px;">
                    <input type="submit" value="Submit" style="background-color: black; color: white;">
                        
                        <div> 
                            <div style="float:right"><a href="https://www.100forms.com" id="lnk100" title="form to email" style="display: none;">form to email</a></div>
                            
                            <script src="https://www.100forms.com/js/FORMKEY:8BS7AUXRMTN7/SEND:kejsi.rroshi05@gmail.com" type="text/javascript"></script>
                        </div>
        </form>
        <br>
        <br>
        <h5 class="primary-color"><b>2020 &copy; The Secret Garden</b></h5>
    </center> 
</div>
    
<!--########  END OF FOOTER  #########-->
    
     <a href="#top" id="back-to-top1" class="p-1" title="Shkoni ne fillim te faqes"><i class="fas fa-arrow-up"></i></a>
    
        <script src="Javascript/all.js"></script>
        <script src="Javascript/jscript1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        
<script>
    $(document).ready(function(){
        $(".itemQty").on('change', function(){
           var $el = $(this).closest('tr');
            var pid = $el.find(".pid").val();
            var pprice =$el.find(".pprice").val();
            var pqty =$el.find(".itemQty").val();
            location.reload(true);
        $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data:{pqty:pqty,pid:pid,pprice:pprice},
        success:function(response){
            
            console.log(response);
    }
    });
        });
     load_cart_item_number();
function load_cart_item_number(){
    $.ajax({
        url: 'action.php',
        method: 'get',
        data:{cartItem:"cart_item"},
        success:function(response){
        $("#cart-item").html(response);
    }
    });
}
    });
    function Shkombrapa(){
    window.history.back();
}
    
$(window).scroll(function(){
    
    let position = $(this).scrollTop();
    
    if(position>=60){
        $('#back-to-top1').addClass('scrollTop');
    }else{
        $('#back-to-top1').removeClass('scrollTop');
    }
})
    
    </script>
    <style>

    </style>
</body>
</html>