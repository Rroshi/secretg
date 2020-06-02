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
                   <span class="cart-icon mr-lg-3">
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
<!--menu item-->
    <div class="container">
        <div id="message"></div>
          <div class="namee" style="text-align:center; font-size:40px; color:#171717;"><b>Lule te ndryshme</b></div>
            <div class="row">

                <?php
                 include 'config.php';
                 $stmt = $conn->prepare("SELECT * FROM produktet");
                 $stmt->execute();
                 $result = $stmt->get_result();
                 while($row = $result->fetch_assoc()):
                ?>
            
        <div class="column justify-content-between d-flex my-3 p-3">
           <div class="card" style="background-color:#F7EBEB;">
             <img src="<?= $row['foto_produktit']?>" alt="Item" style="width:100%" class="aaaaaa">
                <br>
                <h2 class="primary-color aaaa"><?= $row['emri_produktit']?></h2>
                <p class="price aaaa"><?= number_format($row['cmimi_produktit'])?> leke</p>
                    <form action="" class="form-submit">
                        <input type="hidden" class="pid" value="<?=$row['id']?>">
                        <input type="hidden" class="pname" value="<?=$row['emri_produktit']?>">
                        <input type="hidden" class="pprice" value="<?=$row['cmimi_produktit']?>">
                        <input type="hidden" class="pimage" value="<?=$row['foto_produktit']?>">
                        <input type="hidden" class="pcode" value="<?=$row['kodi_produktit']?>">
                        <button class="btn addItemBtn"style="color:#F7EBEB; text-decoration: none; background-color:#171717; width:100%;">Shtoni ne shporte</button>
                    </form>
          </div>
        </div> 
      <?php endwhile; ?>  
    </div>
 </div>      
<!--End of menu item-->
   
    <!-- ########### Footer #############-->
    
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
            
<a href="#top" id="back-to-top1" class="p-1"><i class="fas fa-arrow-up"></i></a>
            
                     
        <script src="Javascript/all.js"></script>
        <script src="Javascript/jscript1.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
    $(".addItemBtn").click(function(e){
    e.preventDefault();
    var $form = $(this).closest(".form-submit");
    var pid = $form.find(".pid").val(); 
    var pname = $form.find(".pname").val(); 
    var pprice = $form.find(".pprice").val(); 
    var pimage = $form.find(".pimage").val(); 
    var pcode = $form.find(".pcode").val(); 
    
    $.ajax({
    url: 'action.php',
    method: 'post',
    data: {pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
    success:function(response){
    $("#message").html(response);
         load_cart_item_number();
    }
    });
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
    $(window).scroll(function(){
    
    let position = $(this).scrollTop();
    
    if(position>=60){
        $('#back-to-top1').addClass('scrollTop');
    }else{
        $('#back-to-top1').removeClass('scrollTop');
    }
})
    </script>
</body>
</html>