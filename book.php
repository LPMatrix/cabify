<?php
include('config.php');

if (isset($_POST['submit'])) {
    
    $route=$_POST['route'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $qty=$_POST['qty'];
    $confirmation = uniqid();
    $name=$_POST['name'];
    $contact=$_POST['contact'];

    // print_r($_POST);die();

    if (empty($day)) {
        header('location:index.php?error=1');
        exit();
    }
    elseif ($month=='empty') {
        header('location:index.php?error=2');
        exit();
    }
    elseif (empty($year)) {
        header('location:index.php?error=3');
        exit();
    }
    elseif (empty($contact)) {
        header('location:index.php?error=4');
        exit();
    }
    elseif ($route=='empty') {
        header('location:index.php?error=5');
        exit();
    }
$result = mysqli_query($con,"SELECT * FROM route WHERE id='$route'");
while($row = mysqli_fetch_array($result)){
  $price=$row['price'];
  }
  $payable=$qty*$price;
mysqli_query($con,"INSERT INTO customer (name, contact, bus, transactionum, payable, seat)
VALUES ('$name', '$contact', '$route', '$confirmation','$payable','$qty')");
mysqli_query($con,"INSERT INTO reserve (date, bus, seat_reserve, transactionnum)
VALUES ('$date', '$route', '$qty', '$confirmation')") or die(mysqli_error($con));
header("location: print.php?id=$confirmation&qty=$qty");

    $result = mysqli_query($con,"SELECT * FROM route WHERE id='$route'");
while($row = mysqli_fetch_array($result))
    {
        $numofseats=$row['numseats'];
        $query = mysqli_query($con,"SELECT sum(seat_reserve) FROM reserve where date = '$date'");
                            while($rows = mysqli_fetch_array($query))
                              {
                              $inogbuwin=$rows['sum(seat_reserve)'];
                              }
        $avail=$numofseats-$inogbuwin;
        $setnum=$inogbuwin+1;
    }
}

if (isset($_POST['reschedule'])) {
    $route=$_POST['route'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $qty=$_POST['qty'];
    $id=$_POST['ticket'];
    $date=$day.'-'.$month.'-'.$year;

    if ($day=='empty') {
        header('location:reschedule.php?error=1');
        exit();
    }
    elseif ($month=='empty') {
        header('location:reschedule.php?error=2');
        exit();
    }
    elseif (empty($year)) {
        header('location:reschedule.php?error=3');
        exit();
    }
    elseif (empty($id)) {
        header('location:reschedule.php?error=4');
        exit();
    }
    elseif ($route=='empty') {
        header('location:reschedule.php?error=5');
        exit();
    }
    elseif ($qty=='empty') {
        header('location:reschedule.php?error=7');
        exit();
    }
    $result = mysqli_query($con,"SELECT * FROM route WHERE id='$route'");
    $fetch = mysqli_fetch_array($result);
    $price = $fetch['price'] * $qty;

    $sql=mysqli_query($con, "UPDATE customer SET bus = '$route', seat = '$qty', payable = '$price' WHERE transactionum = '$id' ")or die(mysqli_error($con));
    $update=mysqli_query($con, "UPDATE reserve SET bus = '$route', seat_reserve = '$qty', `date` = '$date' WHERE transactionnum = '$id' ")or die(mysqli_error($con));


    if ($sql >0 && $update>0) {
        header("location:reprint.php?id=$id&qty=$qty");
    }else{
        header('location:reschedule.php?error=6'); 
    }


}
if (isset($_POST['edit'])) {
    //var_dump($_POST);exit();
    $id = $_POST['id'];
    $date=$_POST['date'];
    $phone=$_POST['phone'];

    $result =mysqli_query($con, "UPDATE reserve SET `date`='$date' WHERE id='$id'") or die(mysqli_error($con));
    if ($result) {
       header("location:list.php?ed=1&con=$phone");
    }
    else{
        header("location:list.php?ed=2&con=$phone");
    }
    
}
?>
