<?php

                 /* ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ 
                                       fuction version 1.0
                 ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
// GET TITLE FUNCTION 

                            function pagetitle(){
                                global $pagetitle;
                                if(isset($pagetitle)){
                                    echo $pagetitle;
                                }
                                else{
                                    echo 'default page';
                                }
                            }

         /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
              ALL GET DATA FUNCTIONS (client info , price,qty on store,product name to use on innvoice,
              get all product from store )
          ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
//   function to GET DATA and check  database 
// get all data from client table 
                        function getdata($table){
                            include "conect.php";
                            $st = $con->prepare("select * from $table");
                            $st->execute();
                            $res =$st->fetchAll();
                        foreach($res as $re ){
                            echo '<option value="'.$re['id'].'">'. $re['client_name'].'</option>';
                        }}
                        function addsupplier($param){
                            include 'conect.php';
                            $st = $con->prepare("insert into suppliers (supplier_name) values ('$param')");
                            $st->execute();
                            
                        }
                        function getsupplier(){
                            include "conect.php";
                            $st = $con->prepare("select * from suppliers");
                            $st->execute();
                            $res =$st->fetchAll();
                        foreach($res as $re ){
                            echo '<option value="'.$re['id'].'">'. $re['supplier_name'].'</option>';
                        }}

                        function supplieracc($id){
                            include 'conect.php';
                            $st =$con->prepare("select * from supplieraccount inner join suppliers on supplier_id=$id and supplier_id=suppliers.id");
                            $st->execute();
                            $res=$st->fetchAll();
                            ?>
    <table class="table">
                           <table class="table" id="balance" style="direction: rtl;">
                            <tr>
                            <td>supplier name</td>
                            <td>debt</td>
                            <td>credit</td>
                            <td>balance</td>
                            <td>date</td>
                            </tr>
                           </table>
                            <?php
                            foreach($res as $r){
                                echo '<tr><td>'. $r['supplier_name'].'</td><td>'.$r['dept'].'</td><td>'.$r['credit'].'</td><td>'.$r['balance'].'</td><td>'.$r['date'].'</td></tr>';
                            }
                        }
// get all data from product table or store table 
                        function selectproduct($param){
                            include "conect.php";
                            $st = $con->prepare("select * from product");
                            $st->execute();
                            $res =$st->fetchAll();
                        foreach($res as $re ){
                            echo '<option value="'.$re['id'].'">'. $re[$param].'</option>';  
                        }}
// get the product price from product table 
                        function price($param){
                            include "conect.php";
                            $st = $con->prepare("select * from product where id=$param");
                            $st->execute();
                            $res =$st->fetch();
                        echo  $res['price'];}
// get cost price

                        function costprice($param){
                            include "conect.php";
                            $st = $con->prepare("select * from product where id=$param");
                            $st->execute();
                            $res =$st->fetch();
                        echo  $res['cost'];}
//get all qty on store
                        function store($param){
                            include "conect.php";
                            $st = $con->prepare("select * from product where id=$param");
                            $st->execute();
                            $res =$st->fetch();
                                 echo  $res['qty'];}
//get product name to use on innvoice to show the name of product instade of its id 
                        function productname($param){
                            include "conect.php";
                            $st = $con->prepare("select * from product where id=$param");
                            $st->execute();
                            $res =$st->fetch();
                            echo  $res['name'];
                        }
//  GET ALL PRODUCT FROM DATA BASE 
                                function getproduct(){
                                    include "conect.php";
                                    $st = $con->prepare("select * from product");
                                    $st->execute();
                                    $res =$st->fetchAll();
                                    ?>
                                    <br>
                                    <h1> قائمة كل المنتجات</h1>
                                    <br><br><br>
                                    <table class="table" style="direction: rtl;"> 
                                        <tr>
                                        <td>اسم المنتج</td>
                                        <td>سعر المنتج</td>
                                        <td>الكمية </td>
                                        <td>الاجمالي </td>
                                        </tr>
                                        <?php
                                    foreach($res as $re){
                                    
                                    echo '<tr>';
                                    echo '<td>'.$re['name'].'</td>';
                                    echo '<td>'.$re['price'].'</td>';
                                    echo '<td>'.$re['qty'].'</td>';
                                    echo '<td>'.$re['total'].'</td>';
                                    echo '</tr>';}
                                    ?>
                                    </table>
                                    <a href="index.php">العودة للقائمة الرئيسية </a>
                                    <?php
                                }
//  to get all revenue and the total of revenue fom database by date from to date 

                            function revenue(){
                                include "conect.php";
                                if($_SERVER['REQUEST_METHOD']=="POST"){
                            $date=$_POST['date2'];
                            $dateto=$_POST['date3'];
                                include "conect.php";
                                $st = $con->prepare("SELECT sum(s_qty*s_price)-sum(s_qty*s_cost) as revenue from sales JOIN product ON sales.date BETWEEN '$date' and '$dateto' and sales.product=product.id ");
                                $st->execute();
                                $res =$st->fetchAll();
                                foreach($res as $r){
                                }
                                $st = $con->prepare("select * from sales,product where sales.product=product.id and sales.date BETWEEN '$date' and '$dateto' ");
                                $st->execute();
                                $res =$st->fetchAll();
                                ?>
                                <br>
                                <h1> قائمة كل المنتجات</h1>
                                <br><br><br>
                                <table class="table" style="direction: rtl;"> 
                                    <tr>
                                    <td>اسم المنتج</td>
                                    <td>الكمية </td>
                                    <td>مكسب المنتج</td>

                                    </tr>
                                    <?php
                                foreach($res as $re){
                                echo '<tr>';
                                echo '<td>' .$re['name'].'</td>';
                                echo '<td>'.$re['s_qty'].'</td>';
                                echo '<td>'.($re['s_price']-$re['s_cost'])*$re['s_qty'].'</td>';
                                echo '</tr>';
                                } 
                                echo' <tr>';
                                echo '<td>اجمالى ارباح المدة </td>';
                                echo '<td>'.$r['revenue'].'</td>';
                                echo '</tr>';
                            }
                                ?>
                                </table>
                                <a href="index.php">العودة للقائمة الرئيسية </a>
                                <?php
                            }
//  stopd here to show the total of days that you choose after the table 
                    function fromtodate(){

                        include "conect.php";
                        
                        if($_SERVER['REQUEST_METHOD']=="POST"){

                    $date=$_POST['date2'];
                    $dateto=$_POST['date3'];
                        include "conect.php";
                        $st = $con->prepare("SELECT sum(s_qty*s_price)-sum(s_qty*s_cost) as revenue from sales JOIN product ON sales.date BETWEEN '$date' and '$dateto' and sales.product=product.id
                        ");
                        $st->execute();
                        $res =$st->fetchAll();
                        foreach($res as $r)
                        echo '<tr>';
                        echo '<td>اجمالى ارباح المدة  </td>';
                        echo '<td>'.$r['revenue'].'</td>';
                        echo '</tr>';

                        }
                    }
                          /*=============================================
                                       FUNCTION FOR INNVOICE 
                          ==================================================*/
                        //   to show all sales transiaction 
                     function getsales($param){
                        include "conect.php";
                        $st = $con->prepare("select * from sales left join product on product.id=sales.product where serialnumber = $param  ");
                        $st->execute();
                        $res =$st->fetchAll();
                       foreach($res as $re ){
                     ?>
                   
                    <tr>
                     <td ><?php echo $re['name']; ?></td>
                     <td ><?php echo $re['s_qty'] ?></td>
                     <td><?php echo $re['s_price'] ?></td>
                     <td><?php echo $re['s_total'] ?></td>
                     <td>
                     <form action="query/delete.php" method="post">
                     <input type="hidden" name="serialnumber" class="serialnumber" value="<?php echo $re['serialnumber'] ?>">
                     </td>
                     <td>
                     <input type="hidden" name="idd" class="idd" value="<?php echo $re['product'] ?>"></td>
                     <td>
                  
                     <input type="hidden" name="date" class="date" value="<?php echo $re['date'] ?>">   </td>
                     <td>
                    
                     <input type="hidden" name="client_id" class="client_id" value="<?php echo $re['client_id'] ?>"> </td>
                     </td>
                     <!-- <td><a href="query/delete.php?idd=<?php //echo $re['product'] ?>&&serial=<?php //echo $re['serialnumber'] ?>&&date=<?php // echo $re['date'] ?>&&client_id=<?php // echo $re['client_id'] ?>"class="del_btn">delete item</a></td> -->
                     <td><button  onclick="deleting(<?php echo $re['product'] ?>)" class="del_btn">delete ajax</button></td>
                  
                     </tr>
                     </form>
                     <?php }  }
// get the total of each fatora 
                        function getsalestotal($param){
                            include "conect.php";
                            $st1 = $con->prepare("select sum(s_total) from sales where serialnumber=$param");
                            $st1->execute();
                            $res = $st1->fetchColumn();
                            ?>
                            <tr>
                            <td >الاجمالي النهائي</td>
                            <td></td>
                            <td></td>
                            <td ><?php echo $res?></td>
                            <?php }
  // get the serial of the invoice to generate new serial number for the next invoice 
                            function getserial(){
                                include "conect.php";
                                $st1 = $con->prepare("select * from sales order by id desc limit 1");
                                $st1->execute();
                                $res=$st1->fetchAll();
                                 foreach($res as $r){
                                  echo $r['serialnumber']+1;  } }

        /*####################################################################################*/
                              /*          now all inserting function into data base */
        /*#####################################################################################*/


// insert NEW CLIENT 

                    function insertclient($name){
                        include "conect.php";
                        $st = $con->prepare("insert into client (client_name)values ('$name') ");
                                $st->execute();
                    }


// INSERT NEW PRODUCT INTO DATA BASE 

                    function insertproduct($product,$price,$qty,$cost){
                        $total = $price * $qty;
                        include "conect.php";
                        $st = $con->prepare("insert into product  (name,price,qty,cost,total) VALUES ('$product','$price','$qty','$cost','$total')");
                        $st->execute();
                    }
//insert the cost of product 
                    function insertproductcost($product,$price,$qty,$cost){
                        
                        include "conect.php";
                        $s = $con->prepare("select * from product where name='$product'");
                        $s->execute();
                        $count = $s->rowCount();
                        $rez =$s->fetchAll();
                        foreach($rez as $rz){

                       
                        if($count>0){
                            $oldcost=$rz['cost']*$rz['qty'];
                            $newcost=$cost*$qty;
                            
                            $st = $con->prepare("update product set name='$product',price='$price',qty='$qty'+qty,cost =($newcost+$oldcost)/qty,total=price*qty where name='$product' ");
                            $st->execute();
                        }else{
                            $oldcost=$rz['cost']*$rz['qty'];
                            $newcost=$cost*$qty;
                            
                            
                            $st = $con->prepare("insert into product  (name,price,qty,cost) VALUES ('$product','$price','$qty'+qty,($newcost+$oldcost)/qty)");
                            $st->execute();
                        }
                     
                    } }
//using update function to add the daily purchasing 
                    function updateproduct($product,$price,$qty,$cost,$date){
                        include "conect.php";

                        $s = $con->prepare("select * from product where name='$product'");
                        $s->execute();
                        $count = $s->rowCount();
                        $rez =$s->fetchAll();
                        foreach($rez as $rz){
                        $total = $price * $qty;
                        $oldcost=$rz['cost']*$rz['qty'];
                        $newcost=$cost*$qty;
                        $st = $con->prepare("UPDATE product  SET price= '$price',qty=(qty+'$qty'),cost= ($newcost+$oldcost)/qty,total=(price*qty) where id='$product'");
                        $st->execute();
                      
                    }
                    // $st1=$con->prepare("select * from tregery order by id desc limit 1");
                    // $st1->execute();
                    // $rez =$st1->fetchAll();
                    // foreach($rez as $rzz)
                    // $balancing =$rzz['balance'];
                    // $newcost=$cost*$qty;
                    // $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('0','$newcost','$balancing'+income-expenses,'$date')");
                    //                                 $st1->execute();
                }

// insert into sales table
                        function sales($serial,$product,$price,$qty,$cost,$total,$client,$date){
                        include "conect.php";
                        $st= $con->prepare(" INSERT INTO sales(serialnumber,product,s_price,s_qty,s_cost,s_total,client_id,`date`)
                                            VALUES ('$serial','$product','$price','$qty','$cost','$total','$client','$date')");
                        $st->execute();}


                                /*-------------------------------------------------------

                                UPDATING DATA ON DATABASE (update store qty when sales done )

                                -------------------------------------------------------------*/
///update the qty on the store after selling proccess done on page of invoice

                            function updateqty($param,$sqty){
                                include "conect.php";
                                $st=$con->prepare("UPDATE product set qty = qty-$sqty,total  =price*qty where id =$param");
                                $st->execute();
                            }
                            
 // adding the innvoice to the database to use it as single invoice with serial and total only
                        function insertfatora($serial,$client_id,$date){
                            // $total = $price * $qty;
                            include "conect.php";
                            $st1 = $con->prepare("select sum(s_total) from sales where serialnumber=$serial");
                            $st1->execute();
                            $res = $st1->fetchColumn();
                            // echo $res;
                            $st = $con->prepare("insert into fatora(serial,client_id,total,fatora_date) VALUES ('$serial','$client_id','$res','$date')");
                            $st->execute();
                         
                                $stt=$con->prepare("select client_name from client where id=$client_id");
                                $stt->execute();
                                $rr=$stt->fetchColumn();

                                $st1=$con->prepare("select * from account where client_id=$client_id order by id desc limit 1");
                                $st1->execute();
                                $rez =$st1->fetchAll();

                                // $st1=$con->prepare("select * from $rr order by id desc limit 1");
                                // $st1->execute();
                                // $rez =$st1->fetchAll();
foreach($rez as $rz)
                                $balance =$rz['balance'];
                                $debt = $rz['dept'];
if($client_id=='1'){

    $st2 = $con->prepare("insert into account(client_id,dept,credit,balance,date) VALUES ('$client_id',$res,$res,$balance+dept-credit,'$date')");
    $st2->execute();
    $st1=$con->prepare("select * from tregery order by id desc limit 1");
    $st1->execute();
    $rez =$st1->fetchAll();
    foreach($rez as $rzz)
    $balancing =$rzz['balance'];
    $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('$res','0','$balancing'+income-expenses,'$date')");
    $st1->execute();
}else{

    $st2 = $con->prepare("insert into account(client_id,dept,credit,balance,date) VALUES ('$client_id',$res,0,$balance+dept,'$date')");
    $st2->execute();
}

                                //  $st2 = $con->prepare("insert into $rr(client,dept,cridet,balance,date) VALUES ('$rr',$res,0,$balance+dept,'$date')");
                                //   $st2->execute();

                                                    }
                                                    function payment($client,$payment,$date){
                                                        include "conect.php";
                                                        $stt=$con->prepare("select client_name from client where id=$client");
                                                        $stt->execute();
                                                        $rr=$stt->fetchColumn();

                                                        $st1=$con->prepare("select * from account where client_id=$client order by id desc limit 1");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                      
foreach($rez as $rz)
                                                        $balance =$rz['balance'];
                                                        $debt = $rz['dept'];
                                                        
                                                        $st2 = $con->prepare("insert into account(client_id,dept,credit,balance,date) VALUES ('$client','0',$payment,$balance+dept-$payment,'$date')");
                                                        $st2->execute();
                                                        // $st2 = $con->prepare("insert into $rr(client,dept,cridet,balance,date) VALUES ('$rr','0',$payment,$balance+dept-$payment,'$date')");
                                                        // $st2->execute();

                                                          $st1=$con->prepare("select * from tregery order by id desc limit 1");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                        foreach($rez as $rzz)
                                                        $balancing =$rzz['balance'];
                                                        $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('$payment','0','$balancing'+income-expenses,'$date')");
                                                        $st1->execute();
                                                        
                                                    }
                                                    // supplier payments 
                                                    function supplierpayment($supplier,$payment,$date){
                                                        include "conect.php";
                                                   

                                                        $st1=$con->prepare("select * from supplieraccount where supplier_id=$supplier order by id desc limit 1");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                      
foreach($rez as $rz)
                                                        $balance =$rz['balance'];
                                                        $debt = $rz['dept'];
                                                        
                                                        $st2 = $con->prepare("insert into supplieraccount(supplier_id,dept,credit,balance,date) VALUES ('$supplier',$payment,'0',$balance+dept-$payment,'$date')");
                                                        $st2->execute();
                                                       

                                                          $st1=$con->prepare("select * from tregery order by id desc limit 1");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                        foreach($rez as $rzz)
                                                        $balancing =$rzz['balance'];
                                                        $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('0','$payment','$balancing'+income-expenses,'$date')");
                                                        $st1->execute();
                                                        
                                                    }
                                                    //end of supplier payment 
                                                    function insert_tregery($income,$expenses,$date){
                                                        include "conect.php";
                                                        $st1=$con->prepare("select * from tregery order by id desc limit 1");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                        foreach($rez as $rzz)
                                                        $balancing =$rzz['balance'];
                                                        $st1=$con->prepare("insert into tregery (income,expenses,balance,date) values ('$income','$expenses','$balancing'+income-expenses,'$date')");
                                                        $st1->execute();
                                                    }
                                                    function get_tregery($date){
                                                        include "conect.php";
                                                        $st1=$con->prepare("select * from tregery where date='$date'");
                                                        $st1->execute();
                                                        $rez =$st1->fetchAll();
                                                        ?>
                <table class="table" style="direction: rtl;" >
<tr>
 <td>التاريخ</td>
 <td>ايرادات</td>
 <td>مصروفات</td>
 <td>الرصيد</td>
</tr>
</table>
          <?php
           foreach($rez as $rzz){
     ?>
              <tr>
                 <td><?php echo $rzz['date']?></td>
                 <td><?php echo $rzz['income']?></td>
                 <td><?php echo $rzz['expenses']?></td>
                <td><?php echo $rzz['balance']?></td>
                                              </tr>
               <?php
                                                        }
                                                    ?>
                         <a href="index.php" class="btn btn-secondary">العودة للقائمة الرئيسية </a>

                                                    <?php
                                                    }
 
                            function fatora_total($serial){
                                include "conect.php";
                                $st1 = $con->prepare("select sum(s_total) from sales where serialnumber=$serial");
                                $st1->execute();
                                $res = $st1->fetchColumn();
                                return $res;

                            }
 // functoin to get client name instade of id 

                function clientname($client_id){
                    include "conect.php";
                    $st2 = $con->prepare("select client_name from client where id=$client_id");
                    $st2->execute();
                    $clientname=$st2->fetchColumn();
                    echo $clientname;
                }
                function getname($client_id){
                    
               
                    include "conect.php";
                    $st2 = $con->prepare("select client_name from client where id=$client_id");
                    $st2->execute();
                    $clientname=$st2->fetchColumn();
                    return $clientname;
           
                }
// show the innvoice before printing
                            function getinvoice($serial){
                                include "conect.php";
                                $st2 = $con->prepare("select * from fatora where serial=$serial");
                                $st2->execute();
                            $res=$st2->fetchAll();
                            foreach($res as $re){
                            ?>
                            <tr>
                            <td><?php echo $re['serial']; ?></td>
                            <td id="client_name" ><?php clientname($re['client_id']); ?></td>
                            <td><?php echo $re['total'] ?></td>
                            <td><?php echo $re['fatora_date'] ?></td>
                            </tr>
                            <?php
                            }     
                            }
//functoin to get all invoice with serial and total only to show on total of day(show all invoices)
                        function getallinvoice(){
                            include "conect.php";
                            $st2 = $con->prepare("select * from fatora ");
                            $st2->execute();
                        $res=$st2->fetchAll();
                        foreach($res as $re){
                        ?>
                        <tr>
                        <td><?php echo $re['serial']; ?></td>
                        <td id="client_name" ><?php clientname($re['client_id']); ?></td>
                        <td><?php echo $re['total'] ?></td>
                        <td><?php echo $re['fatora_date'] ?></td>
                        </tr>
                        <?php
                        }     
                        }
//show by today invoices only 
                        function todayinvoice($date){
                            include "conect.php";
                            $st2 = $con->prepare("select * from fatora  where fatora_date='$date'");
                            $st2->execute();
                        $res=$st2->fetchAll();
                        foreach($res as $re){
                        ?>
                        <tr>
                        <td><?php echo $re['serial']; ?></td>
                        <td id="client_name" ><?php clientname($re['client_id']); ?></td>
                        <td><?php echo $re['total'] ?></td>
                        <td><?php echo $re['fatora_date'] ?></td>
                        </tr>
                        <?php
                        }     
                        }
 //show invoices by client name 
                        function clientinvoice($date){
                            include "conect.php";
                            $st2 = $con->prepare("select * from fatora  where client_id='$date'");
                            $st2->execute();
                        $res=$st2->fetchAll();
                        foreach($res as $re){
                        ?>
                        <tr>
                        <td><?php echo $re['serial']; ?></td>
                        <td id="client_name" ><?php clientname($re['client_id']); ?></td>
                        <td><?php echo $re['total'] ?></td>
                        <td><?php echo $re['fatora_date'] ?></td>
                        </tr>
                        <?php
                        }     
                        }

                        //  show client balance statment sheet 

                        function statment($id){
                            include "conect.php";
                            // $st= $con->prepare("select * from $table ");
                            $st= $con->prepare("select * from account,client where account.client_id=$id and client.id=$id");

                            $st->execute();
                            $rez = $st->fetchAll();
                            ?>
                            <table class="table" id="balance" style="direction: rtl;">
                            <tr>
                            <td>client name</td>
                            <td>فاتورة(debt)</td>
                            <td>دفعة (credit)</td>
                            <td>الرصيد</td>
                            <td>التاريخ</td>
                            </tr>
                            <?php
                            foreach($rez as $rz){
?>
<tr>
<td><?php echo $rz['client_name'] ?></td>
<td><?php echo $rz['dept'] ?></td>
<td><?php echo $rz['credit'] ?></td>
<td><?php echo $rz['balance'] ?></td>
<td><?php echo $rz['date'] ?></td>
</tr>
<?php

                            }
                            ?>
                            </table>
                            <?php
                        }
                        // supplier statment 
                        
                        function supplierstatment($id){
                            include "conect.php";
                            // $st= $con->prepare("select * from $table ");
                            $st= $con->prepare("select * from supplieraccount,suppliers where supplieraccount.supplier_id=$id and suppliers.id=$id");

                            $st->execute();
                            $rez = $st->fetchAll();
                            ?>
                            <table class="table" id="balance" style="direction: rtl;">
                            <tr>
                            <td>supplier name</td>
                            <td>debt</td>
                            <td>credit</td>
                            <td>balance</td>
                            <td>date</td>
                            </tr>
                            <?php
                            foreach($rez as $rz){
?>
<tr>
<td><?php echo $rz['supplier_name'] ?></td>
<td><?php echo $rz['dept'] ?></td>
<td><?php echo $rz['credit'] ?></td>
<td><?php echo $rz['balance'] ?></td>
<td><?php echo $rz['date'] ?></td>
</tr>
<?php

                            }
                            ?>
                            </table>
                            <?php
                        }

                        // check user name and password on database

function check($username,$password){
    include "conect.php";
    $st2 = $con->prepare("select * from users where username='$username' and password='$password'");
    $st2->execute();
    $res = $st2->fetchAll();
    $count = $st2->rowCount();
foreach($res as $r){ echo $r['stat'];}
    echo $count;
    

    if($count>0){
        if($r['stat']=='1'){
            $_SESSION['user'] = $username;
      
            header('location:manage.php');
            exit();
        }elseif($r['stat']=='0'){
            // $_SESSION['user'] = $username;
      
            header('location:manage.php?do=user');
            exit();

        }
     
     


   
    else{
        header('location:index.php');
    }

  
}}