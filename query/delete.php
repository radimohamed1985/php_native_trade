<?php
include "../conect.php";
include "../function.php";
include "../conect.php";


$id = $_GET['idd'];
$serial = $_GET['serial'];
$date = $_GET['date'];
$client_id = $_GET['client_id'];

echo $id;
echo $serial;
echo $date;

$st1 = $con->prepare("select sum(s_total) from sales where serialnumber=$serial and date='$date'");
$st1->execute();
$rr=$st1->fetchColumn();
$st1 = $con->prepare("select s_qty from sales where serialnumber=$serial and date='$date'");
$st1->execute();
$rqty=$st1->fetchColumn();
$count=$st1->rowCount();
$st =$con->prepare("delete from sales where product='$id' and serialnumber='$serial' and date='$date'");
$st->execute();
$st1 = $con->prepare("select sum(s_total) from sales where serialnumber=$serial and date='$date'");
$st1->execute();
$res = $st1->fetchColumn();
$st = $con->prepare("UPDATE fatora SET total='$res' where  `serial`='$serial' and fatora_date='$date'");
$st->execute();
$st1 = $con->prepare("select total from fatora where serial=$serial and fatora_date='$date'");
$st1->execute();
$ress = $st1->fetchColumn();
$st1=$con->prepare("select * from account where client_id=$client_id order by id desc limit 1");
$st1->execute();
$rez =$st1->fetchAll();
// // echo $res;
if($count=='1'){
    $final_qty=$rqty;
}
if($ress=='0'){

    $st =$con->prepare("delete from fatora where total='0' ");
$st->execute();
$st4= $con->prepare("select qty from product where id=$id ");
$st4->execute();
$oldqty=$st4->fetchColumn();
foreach($rez as $rz)
$balance =$rz['balance'];
$st2 =$con->prepare("UPDATE account SET dept='0',credit='0',balance=$balance where dept ='$rr' and  date='$date' and client_id='$client_id'");
$st2->execute();
$stt=$con->prepare("delete from account where dept='0' and credit='0'");
$stt->execute();

$st3= $con->prepare("UPDATE product set qty=$oldqty+$final_qty where id=$id");
$st3->execute();
}
else{


foreach($rez as $rz)

$balance =$rz['balance'];
if($client_id=='1'){

    $st2 =$con->prepare("UPDATE account SET dept=$res,credit=$res,balance=$balance+$res-credit where dept ='$rr' and  date='$date' and client_id='$client_id'");
    $st2->execute();

}else{

$st2 =$con->prepare("UPDATE account SET dept=$res,balance=$balance-$rr+$res-credit where dept ='$rr' and  date='$date' and client_id='$client_id'");
$st2->execute();
// $st3= $con->prepare("UPDATE product set qty=qty+$rqty where id=$id ");
// $st3->execute();
}
$st4= $con->prepare("select qty from product where id=$id ");
$st4->execute();
$oldqty=$st4->fetchColumn();
$st1 = $con->prepare("select s_qty from sales where serialnumber=$serial and date='$date'");
$st1->execute();
$rqty=$st1->fetchColumn();
$st3= $con->prepare("UPDATE product set qty=$oldqty+$rqty where id=$id");
$st3->execute();

}
