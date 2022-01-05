<?php
error_reporting();
include "conect.php";
include "function.php";
include "header.php";
$do = isset($_GET['do'])?$_GET['do']:"manage";



 /* ---------------------------------- ---------------------------------------
                          ADD NEW CLIENT TO DATABASE
  --------------------------------------------------------------------------------*/
  if($do=='manage'){
    $pagetitle="manage";
    session_start();

    
  
    ?>
    <title><?php echo pagetitle(); ?></title>
  <center>

  <h1>الراضى للتجارة </h1>
  <br>
  <br>
  <br>
  <div class="container" style="direction: rtl;">
<div class="row">
<div class="col-4">  <a href="manage.php?do=addclient" class="btn btn-info "> اضافة عميل جديد الي قائمة العملاء <i class="fas fa-user-alt"></i></a>
</div>
<div class="col-4">   <a href="manage.php?do=payment" class="btn btn-info">     اضافة دفعات  <i class="far fa-money-bill-alt"></i>  </a>

</div>
<div class="col-4">  <a href="manage.php?do=invoice" class="btn btn-info">     عرض تفاصيل حساب  </a>
</div>

</div>
<br><br>
<div class="row">
<div class="col-4">     <a href="manage.php?do=addproduct" class="btn btn-info">اضافة منتج جديد لقائمة المنتجات <i class="fas fa-plus-square"></i></a>

</div>

<div class="col-4">       <a href="manage.php?do=updateproduct" class="btn btn-info">  اضافةمشتريات يوميه جديدة  <i class="fas fa-luggage-cart"></i></a>

</div>

<div class="col-4">         <a href="manage.php?do=showproduct" class="btn btn-info">   عرض قائمة المنتجات  </a>


</div>
</div>


<br><br>
<div class="row">
<div class="col-4">  <a href="manage.php?do=fatora" class="btn btn-success">  <i class="fas fa-file-invoice-dollar"></i>   اضافة فاتورة جديدة</a>
</div>
<div class="col-4">  <a href="manage.php?do=teller" class="btn btn-primary">  <i class="fas fa-wallet"></i>   الخزنة  </a>
</div>
<div class="col-4">  <a href="manage.php?do=report" class="btn btn-info">  <i class="fas fa-cash-register"></i>   عرض تقرير ارباح منتجات  </a></div>
</div>

<br><br>
<div class="row">
<div class="col-4 ">  <a href="manage.php?do=updateitem" class="btn btn-danger">     تعديل فاتورة   </a>

</div>
<div class="col-4">   <a href="manage.php?do=supplierspayment" class="btn btn-info">     سداد موردين  <i class="far fa-money-bill-alt"></i>  </a>

</div>
<div class="col-4 ">  <a href="manage.php?do=show_tregery" class="btn btn-info"> <i class="fas fa-hand-holding-usd"></i>  عرض تقرير الخزنة  </a></div>
<br>

</div>
<br><br>
<div class="row">
<div class="col-4">         <a href="manage.php?do=supplieracc" class="btn btn-info">    عرض حساب مورد  </a>

</div>
<div class="col-4">         <a href="manage.php?do=addsupplier" class="btn btn-info">    اضافة مورد  </a>

</div>
</div>

 
  </center>
  <br><br>
  <a href="logout.php" class="btn btn-secondary">    تسجيل الخروج من الحساب    </a>
    <?php


  }elseif($do=='user'){ echo "welcome user";
  ?>
    <div class="row">
    <div class="col-4">  <a href="manage.php?do=user-fatora" class="btn btn-success">     اضافة فاتورة جديدة  </a>
    </div>
    <div class="col-4">  <a href="manage.php?do=user-teller" class="btn btn-success">     الخزنة  </a>
    </div>
    <br><br>
  <a href="logout.php" class="btn btn-danger">    تسجيل الخروج من الحساب    </a>
    <?php
  }elseif($do=='user-fatora'){
    $pagetitle= "فاتورة ";
    include "header.php";
    // include "fatora.php";
                            ?>
                            <center>
                            <title><?php echo pagetitle(); ?></title>
                            <br>
                            <h4> فاتورة </h4>
                            <div class="container" style="direction: rtl;">
                                <table class="table">

                             <form action="#price" method="POST">
                            <tr>
                            <td>اسم العميل</td>
                            <td><select name="client" id="client" class="form-control" ><option value="">اسم العميل</option><?php getdata('client'); ?></select></td>
                            <td>التاريخ</td>
                            <td ><input type="text" id="date" value="<?php echo date('y-m-d') ?>"></td>
                           <td>رقم الفاتورة</td> 
                            <td><input type="text" class="form-control" name="serial" id="serial" value="<?php  echo getserial();  ?>"></td>
                            </tr> 
                            </table>
                            <table class="selecttable text-center">
                            <tr>
                            <td colspan="2">المنتج</td>
                            <td>الكمية</td>
                            <td>الكميةالمتاحة </td>
                            <td>السعر</td>
                            <td>الاجمالى</td>
                            <!-- <td>رقم الفاتورة</td> -->
                            </tr>
                         

                          
                            <td colspan="2"><select name="select" id="select" class="form-control" ><option value=""> المنتج </option><?php selectproduct('name'); ?></select></td>
                            <td><input type="text" class="form-control" id="qty" name="qty"></td>
                            <td><input type="text" class="form-control" id="sqty" name="sqty"></td>
                            <td><input type="text" class="form-control" id="price" name="price" ></td>
                             <!-- value="<?php //$id = $_POST['select'];price($id); ?>" -->
                            <td><input type="text" class="form-control" id="total" name="total"></td>
                            <td><input type="hidden" class="form-control" name="cost" id="price2"></td>
                            <td><input type="submit" id="submit" value="اضافة للفاتورة "class="btn btn-success"></td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print" value="طباعة الفاتورة" > </td>
                            </form>
                            </tr>
                            
                            <?php //getsales(); ?>
                            </table>
                            <div class="container">
                            
                            
                          
                            <table class="table" style="direction: rtl;" >
                            <tr>
                            <td>المنتج</td>
                            <td >الكمية</td>
                            <td>السعر</td>
                            <td>الاجمالى</td>
                            </tr>
                            </table>
                           
                            <table class="table text-end" id="form" style="direction: rtl;">
                            </table>
                           
                          <table class="table" id="tot" >
                         
                        
                          
                          </table>
                            </div>
                            <p id="auto"></p>
                            <br><br>
                            </div>
                            <a class="btn btn-secondary" href="manage.php?do=user" >العودة للقائمة الرئيسية </a>
                            <br>
                            <a class="addnew btn btn-success" href="manage.php?do=user-fatora">     اضافة فاتورة  جديدة  </a>
<?php
  }elseif($do=='user-teller'){
    include "header.php";
    $pagetitle ='الخزنة';
    ?>
  <title><?php echo pagetitle(); ?></title>
  <center>
  
  
    <h1>الخزنة</h1>
  <div class="container">
    <table style="direction: rtl;">
      <form  action="" method="POST">
     
  
  <tr>
  <td>ايرادات </td>
  <td><input type="text" name="income" class="form-control"></td>
  <td><input type="date" name="date" class="form-control"></td>
  </tr>
  
  <tr>
  <td>مصروفات</td>
  <td> <input type="text" name="expenses" class="form-control" ></td>
  </tr>
  <tr>
  <td colspan="2">
  <input type="submit" value="اضافة للخزنة" class="form-control">
  </td>
  </tr>
  </table>
  </div>
  
  
  
    </center>
    <a href="manage.php?do=user" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
      $income=$_POST['income'];
      $expenses=$_POST['expenses'];
      $date=$_POST['date'];
      insert_tregery($income,$expenses,$date);
  }
    
  }

  
 elseif($do =="addclient"){
  session_start();
     $pagetitle ='add-client';
                                ?>
                                 <title><?php echo pagetitle(); ?></title>
                                <center>
                                <br><br><br>
                                <form action="" method="POST">
                            <input type="text" name="name">
                            <input type="submit" value="اضافة عميل جديد">
                            </form>
                            <br><br>

                            <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
                            </center>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=="POST"){
                                $name=$_POST['name'];
                                insertclient($name);
                            }}
    /* ---------------------------------- ---------------------------------------
                          ADD NEW supplier TO DATABASE
  --------------------------------------------------------------------------------*/

  elseif($do=='addsupplier'){
$pagetitle='اضافة مورد';
?>
<title><?php echo pagetitle() ?></title>
<center>
<br><br><br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<input type="text" name="supplier_name">
<input type="submit" value="تسجيل اسم المورد">

</form>
<br><br>
<a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>

</center>

 <?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
  $suppliername =$_POST['supplier_name'];
  addsupplier($suppliername);
} 
}
 /* ---------------------------------- ---------------------------------------
                          ADD NEW PRODUCT TO DATABASE
  --------------------------------------------------------------------------------*/
elseif($do=="addproduct"){
    $pagetitle ='اضافة منتج جديد';
                            ?>
                  <title><?php echo pagetitle(); ?></title>
                            <center>
                            <br><br><br>
                            <table style="direction: rtl;">
                            <form  action="" method="POST" >
                           
                        
                        <tr>
                        <td>اسم المنتج</td>
                        <td> <input type="text" name="product" ></td>
                        </tr>
                       <tr>
                       <td>السعر</td>
                       <td> <input type="text" name="price" ></td>
                       </tr>
                       <tr>
                       <td>سعر التكلفة</td>
                                               <td> 
                                               <input type="text" name="price2"   id="price2" >
                                               <input type="hidden" name="cost" id="costname" >
                                               </td>
                       </tr>
                       <tr>
                       <td>الكمية</td>
                       <td>  <input type="text" name="qty"></td>
                       </tr>
                       <tr>
                      <td>ااسم المورد</td>
                      <td>
                      <select name="supplier" id=""><option value="">اسم المورد</option><?php getsupplier() ?></select>
                      </td>
                      </tr>
                      <tr>
                      <td>date</td>
                      <td><input type="date" name="date" id=""></td>
                      </tr>
                       <tr>
                       <td>
                       <input type="radio" name="paymentMethod" id="" value="0">
                       </td><td>اجل</td>
                      <td>
                      <input type="radio" name="paymentMethod" id="" value="1">
                       </td><td>كاش</td>
                  
                      </tr>
                     
                       <tr>
                       <td colspan="2">
                       <input type="submit" value="اضافة منتج جديد" class="form-control">
                       </td>
                       </tr>
                     
                     
                        </form>
                        </table>
                        <br><br>

                        <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
                        </center>
                        <?php
                        if($_SERVER['REQUEST_METHOD']=="POST"){
                          $supplier=$_POST['supplier'];
                            $product=$_POST['product'];
                            $price=$_POST['price'];
                            $price2=$_POST['price2'];
                            $qty=$_POST['qty'];
                            $date=$_POST['date'];
                            $payment=$_POST['paymentMethod'];
                            echo $payment;
                            $total=$price2*$qty;
                           if($payment=='1'){
                            $st=$con->prepare("select * from tregery order by id desc limit 1");
                            $st->execute();
                            $rez =$st->fetchAll();
                            foreach($rez as $rzz)
                            $balancing =$rzz['balance'];
                            $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('0','$total','$balancing'+income-expenses,'$date')");
                            $st1->execute();

                           }else{


                        
                             $total=$price2*$qty;
                             $s=$con->prepare("select balance from supplieraccount where supplier_id=$supplier order by id desc limit 1 ");
                             $s->execute();
                             $res=$s->fetchColumn();
                           
                                $st=$con->prepare("INSERT INTO `supplieraccount`(`supplier_id`, `dept`, `credit`, `balance`, `date`) VALUES ('$supplier','0'و'$total','$res'+dept-credit,'$date')");
                                $st->execute();
                              
                              }
                          
                          //  }
                            insertproduct($product,$price,$qty,$price2);
                        }}
                         /* ---------------------------------- ---------------------------------------
                           UPDATE ALL PRODUCT ON DATABASE 
                        --------------------------------------------------------------------------------*/
                        elseif($do=="updateproduct"){
                            $pagetitle ='اضافة مشتريات يومية  جديد';
                                                    ?>
                                          <title><?php echo pagetitle(); ?></title>
                                                    <center>
                                                    <br><br><br>
                                                    <table style="direction: rtl;">
                                                    <form  action="" method="POST">
                                                   
                                                    </tr>
                                               <td>التاريخ</td>
                                               <td>  <input type="date" name="date"  class="form-control" ></td>
                                               </tr>
                                                <tr>
                                                <td>اسم المنتج</td>
                                                <td><select name="select" id="select" class="form-control" ><option value=""></option><?php selectproduct('name'); ?></select></td>
                                            </td>
                                                </tr>
                                               <tr>
                                               <td>سعر البيع</td>
                                               <td> <input type="text" name="price"  class="form-control" id="price" ></td>
                                               </tr>
                                               <td>الكمية</td>
                                               <td>  <input type="text" name="qty"  class="form-control" value="0"></td>
                                               </tr>
                                               <td>سعر التكلفة</td>
                                               <td> 
                                               <input type="text" name="price2"  class="form-control" id="price2" >
                                               <input type="hidden" name="cost"  class="form-control" id="costname" >
                                               </td>
                                               </tr>
                                               <tr>
                      <td>ااسم المورد</td>
                      <td>
                      <select name="supplier" id=""><option value="">اسم المورد</option><?php getsupplier() ?></select>
                      </td>
                      </tr>
                                               <tr>
                       <td>
                       <input type="radio" name="paymentMethod" id="" value="0">
                       </td><td>اجل</td>
                      <td>
                      <input type="radio" name="paymentMethod" id="" value="1">
                       </td><td>كاش</td>
                  
                      </tr>
                                               <tr>
                                               <td colspan="2">
                                               <input type="submit" value="اضافة منتج جديد" class="form-control">
                                               </td>
                                               </tr>
                                               
                                             
                                                </form>
                                                </table>
                                                <br><br>
                                                <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
                                                </center>
                                                <?php
                                                if($_SERVER['REQUEST_METHOD']=="POST"){
                                                  $supplier=$_POST['supplier'];

                                                    $product=$_POST['select'];
                                                    $price=$_POST['price'];
                                                    $price2=$_POST['price2'];
                                                    $qty=$_POST['qty'];
                                                    $pro =$_POST['cost'];
                                                    $date =$_POST['date'];
                                                    $payment=$_POST['paymentMethod'];
                                                    echo $payment;
                                                    $total=$price2*$qty;
                                                   if($payment=='0'){
                                                  
                                                    $total=$price2*$qty;
                                                    $s=$con->prepare("select balance from supplieraccount where supplier_id=$supplier order by id desc limit 1 ");
                                                    $s->execute();
                                                    $res=$s->fetchColumn();
                                                  
                                                       $st=$con->prepare("INSERT INTO `supplieraccount`(`supplier_id`, `dept`, `credit`, `balance`, `date`) VALUES ('$supplier','0','$total','$res'+dept-credit,'$date')");
                                                       $st->execute();
                        
                                                   }elseif($payment=='1'){
                                                    $st1=$con->prepare("select * from tregery order by id desc limit 1");
                                                    $st1->execute();
                                                    $rez =$st1->fetchAll();
                                                    foreach($rez as $rzz)
                                                    $balancing =$rzz['balance'];
                                                    $newcost=$price2*$qty;
                                                    $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('0','$newcost','$balancing'+income-expenses,'$date')");
                                                                                    $st1->execute();
                                                   }
                                                    updateproduct($product,$price,$qty,$price2,$date);
                                                    insertproductcost($pro,$price,$qty,$price2);
                                                }}
 /* ---------------------------------- ---------------------------------------
                            SHOW ALL PRODUCT FROM DATABASE
  --------------------------------------------------------------------------------*/

elseif($do=='showproduct'){
    $pagetitle="عرض كل المنتجات";
    ?>
<center>
<title><?php echo pagetitle(); ?></title>
 <?php getproduct(); ?>
</center>

<?php

}
 /* ---------------------------------- ---------------------------------------
                            ADD NEW INNVOICE 
  --------------------------------------------------------------------------------*/
elseif($do=='fatora'){
    
    $pagetitle= "فاتورة ";
    include "header.php";
    // include "fatora.php";
                            ?>
                            <center>
                            <title><?php echo pagetitle(); ?></title>
                            <br>
                            <h4> فاتورة </h4>
                            <div class="container" style="direction: rtl;">
                                <table class="table">

                             <form action="#price" method="POST">
                            <tr>
                            <td>اسم العميل</td>
                            <td><select name="client" id="client" class="form-control" ><option value="">اسم العميل</option><?php getdata('client'); ?></select></td>
                            <td>التاريخ</td>
                            <td ><input type="text" id="date" value="<?php echo date('y-m-d') ?>"></td>
                           <td>رقم الفاتورة</td> 
                            <td><input type="text" class="form-control" name="serial" id="serial" value="<?php  echo getserial();  ?>"></td>
                            </tr> 
                            </table>
                            <table class="selecttable text-center">
                            <tr>
                            <td colspan="2">المنتج</td>
                            <td>الكمية</td>
                            <td>الكميةالمتاحة </td>
                            <td>السعر</td>
                            <td>الاجمالى</td>
                            <!-- <td>رقم الفاتورة</td> -->
                            </tr>
                         

                          
                            <td colspan="2"><select name="select" id="select" class="form-control" ><option value=""> المنتج </option><?php selectproduct('name'); ?></select></td>
                            <td><input type="text" class="form-control" id="qty" name="qty"></td>
                            <td><input type="text" class="form-control" id="sqty" name="sqty"></td>
                            <td><input type="text" class="form-control" id="price" name="price" ></td>
                             <!-- value="<?php //$id = $_POST['select'];price($id); ?>" -->
                            <td><input type="text" class="form-control" id="total" name="total"></td>
                            <td><input type="hidden" class="form-control" name="cost" id="price2"></td>
                            <td><input type="submit" id="submit" value="اضافة للفاتورة "class="btn btn-success"></td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print" value="طباعة الفاتورة" > </td>
                            </form>
                            </tr>
                            
                            <?php //getsales(); ?>
                            </table>
                            <div class="container">
                            
                            
                          
                            <table class="table" style="direction: rtl;" >
                            <tr>
                            <td>المنتج</td>
                            <td >الكمية</td>
                            <td>السعر</td>
                            <td>الاجمالى</td>
                            </tr>
                            </table>
                           
                            <table class="table text-end" id="form" style="direction: rtl;">
                            </table>
                           
                          <table class="table" id="tot" >
                         
                        
                          
                          </table>
                            </div>
                            <p id="auto"></p>
                            <br><br>
                            </div>
                            <a class="btn btn-secondary" href="index.php" >العودة للقائمة الرئيسية </a>
                            <br>
                            <a class="addnew btn btn-success" href="manage.php?do=fatora">     اضافة فاتورة  جديدة  </a>

                        
                            
                            </center>
                            <?php
                            //    if($_SERVER['REQUEST_METHOD']=="POST"){
                            //     $product=$_POST['select'];
                            //     $serial=$_POST['serial'];
                       
                            //     $price=$_POST['price'];
                            //     $qty=$_POST['qty'];
                            //     $total=$_POST['total'];
                            //     sales($serial,$product,$price,$qty,$total);
                            // }
                    
   }
   elseif($do=='invoice'){
   
    include "header.php";
    $pagetitle= "عرض الحسابات ";
?>
 <title><?php echo pagetitle(); ?></title>
    <h4 class="text-center"> اختر طريقة عرض الحساب</h4>

    <div class="container text-center" style="direction: rtl;">
                                <table class="table">

                             <form action="#price" method="POST">
                             <!-- client accounts -->
                            <tr>
                             <td><select name="client" id="client" class="form-control" ><option value="">-اختر اسم العميل-</option><?php getdata('client'); ?></select></td>
                             <td><input type="text" class="btn btn-primary" type="submit" id="print5" value=" عرض كل فواتير العميل  " > </td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print6" value=" حركة حساب العميل  " > </td>
                            </tr>
                            <!-- about supplier accounts  -->
                            <tr>
                             <td><select name="client" id="supplier" class="form-control" ><option value="">-اختر اسم المورد-</option><?php getsupplier(); ?></select></td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print7" value=" حركة حساب المورد  " > </td>
                            </tr>
                            <tr>
                            <td ><input type="date" id="date2" value="<?php echo date('y-m-d') ?>"></td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print4" value=" عرض كل فواتير  اليوم" > </td>
                            </tr>
                            <tr>
                           <!-- <td>رقم الفاتورة</td>  -->
                            <td><input type="text"  name="serial" id="serial" placeholder="ادخل رقم الفاتورة "></td>
                            <td><input type="text" class="btn btn-primary" type="submit" id="print2" value="عرض الفاتورة" > </td>

                            <!-- </tr>
                            <tr> -->
                            <td><input type="text" class="btn btn-primary" type="submit" id="print3" value="عرض كل فواتير " > </td>
                           
                         
                            </tr> 
                            </table>
                            <table class="table">
                            <tr>
                            <td>رقم الفاتورة</td> 
                            <td>اسم العميل</td>
                            <td>اجمالي الفاتورة</td>
                            <td>تاريخ الفاتورة</td>
                            </tr>
                            </table>
                            </table>
                            <table class="table" id="form2">
                           
                           </table>
                           <div id="form3"></div>
                           <br><br>

                           <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
                           <a href="manage.php?do=invoice" class="btn btn-secondary " id="n-account">عرض حساب اخر    </a>

    <?php

   }
   // start supplier account show
   elseif($do=='supplieracc'){
$pagetitle='حسابات موردين';
?>
 <title><?php echo pagetitle(); ?></title>
 <div class="container text-center" style="direction: rtl;">
                                <table class="table">

                             <form action="query/supplieracc.php">
                            <tr>
                             <td><select name="supplier" id="supplier_name" class="form-control" ><option value="">-اختر اسم المورد-</option><?php getsupplier('client'); ?></select></td>
                            <td><input type="submit" class="btn btn-primary" type="submit" id="print8" value=" حركة حساب المورد  " > </td>
                            </tr>
                         
                   
                           </form>
                           <h4></h4>
                       
                           <table class="table" >
                           <tbody id="form4"></tbody>
                           </table>
                         
                             
                           </table>
                           <div id="form3"></div>
                         
<?php
   }
   
   elseif($do=='report'){
    $pagetitle="عرض كل الارباح";
    ?>
     
<center>


<title><?php echo pagetitle(); ?></title>
<form action="" method="POST">
<table class="table" style="direction: rtl;" >

                            <tr>
                            <td ><label for="">من تاريخ</label></td><td><input class="form-control" type="date" name="date2" value="<?php echo date('y-m-d') ?>"></td>
                         
                           
                            <td ><label for="">الي تاريخ</label></td><td><input class="form-control" type="date" name="date3" value="<?php echo date('y-m-d') ?>"></td>
                            <td><input type="submit" value="ابحث" class="form-control"></td>
                            </table>
                            </form>
 
 <?php revenue(); ?>
 <table class="table" style="direction: rtl;">
 
 <?php fromtodate(); ?>
 </table>

</center>

<?php
   }

   elseif($do=='payment'){
    $pagetitle =' اضافة دفعات';
    ?>
<title><?php echo pagetitle(); ?></title>
    <center>
    <br><br><br>
    <table style="direction: rtl;">
    <form  action="" method="POST">
   

<tr>
<td>اسم العميل</td>
<td><select name="client" id="client" class="form-control" ><option value="">-اختر اسم العميل-</option><?php getdata('client'); ?></select></td>
<td><input type="date" name="date" class="form-control"></td>
</tr>

<tr>
<td>الدفعه</td>
<td> <input type="text" name="payment" ></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="اضافة دفعه" class="form-control">
</td>
</tr>


</form>
</table>
<br><br>

<a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
</center>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $client=$_POST['client'];
    $credit=$_POST['payment'];
    $date=$_POST['date'];
    payment($client,$credit,$date);
}}
elseif($do =='teller'){
  include "header.php";
  $pagetitle ='الخزنة';
  ?>
<title><?php echo pagetitle(); ?></title>
<center>


  <h1>الخزنة</h1>
<div class="container">
  <table style="direction: rtl;">
    <form  action="" method="POST">
   

<tr>
<td>ايرادات </td>
<td><input type="text" name="income" class="form-control"></td>
<td><input type="date" name="date" class="form-control"></td>
</tr>

<tr>
<td>مصروفات</td>
<td> <input type="text" name="expenses" class="form-control" ></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="اضافة للخزنة" class="form-control">
</td>
</tr>
</table>
</div>



  </center>
  <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
  <?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $income=$_POST['income'];
    $expenses=$_POST['expenses'];
    $date=$_POST['date'];
    insert_tregery($income,$expenses,$date);
}}
elseif($do=='show_tregery'){
  include "header.php";
  $pagetitle ='حركة الخزنة';

?>
  <title><?php echo pagetitle(); ?></title>
<center>
</form>

<table>
<tr>
<td>التاريخ</td>
<td><input type="date" name="date2" class="form-control" id="date2"></td>
<td >
<input type="text" value="حركة خزنة اليوم " class="btn btn-danger form-control" id="tregery">
</td>
</tr>
</table>

<div class="container">

<table id="form4" class="table" style="direction: rtl;">

</table>

</div>
<?php

}elseif($do=='updateitem'){

  include "header.php";
  $pagetitle ='تعديل الفاتورة';
  ?>
  <title><?php echo pagetitle(); ?></title>
  <table class="table">
  <tr>
  <!-- <td ><input type="date" id="date2" value="<?php echo date('y-m-d') ?>"></td>
  <td><input type="text" class="btn btn-primary" type="submit" id="print4" value=" عرض كل فواتير  اليوم" > </td> -->

  <td><input type="text"  name="serial" id="serial" placeholder="ادخل رقم الفاتورة " id="serial"></td>
  <td><input type="text" class="btn btn-primary" type="submit" id="print2" value="عرض الفاتورة" > </td>
  <td><input type="text" class="btn btn-primary" type="submit" id="print" value="طباعة الفاتورة" > </td>

  </tr>
  
  </table>
  <h4>fatora</h4>
  <table class="table" id="form2">
                           
                           </table>
                           <table class="table text-end" id="form" style="direction: rtl;">
                            </table>
                           
                          <table class="table" id="tot" >
                         
                        
                          
                          </table>

<?php
include "footer.php";

}
elseif($do=='supplierspayment'){
  $pagetitle =' سداد موردين';
  ?>
<title><?php echo pagetitle(); ?></title>
  <center>
  <br><br><br>
  <table style="direction: rtl;">
  <form  action="" method="POST">
 

<tr>
<td>اسم المورد</td>
<td> <select name="supplier" id=""><option value="">اسم المورد</option><?php getsupplier() ?></select></td>
</tr>
<tr>
<td>التاريخ</td>

<td><input type="date" name="date" class="form-control"></td>
</tr>

<tr>
<td>الدفعه</td>
<td> <input type="text" name="payment" ></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" value="اضافة دفعه" class="form-control">
</td>
</tr>


</form>
</table>
<br><br>

<a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>
</center>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
  $supplier=$_POST['supplier'];
  $payment=$_POST['payment'];
  $date=$_POST['date'];
  supplierpayment($supplier,$payment,$date);
}}

;

  

   include "footer.php";