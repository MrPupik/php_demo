<?php

$conn = null;
$password = '';

function connect()
{
    global $conn, $password;
    $conn = mysqli_connect('127.0.0.1', 'root', $password, 'ChefExpress');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


function disconnect()
{
    global $conn;
    if (isset($conn)) {
        mysqli_close($conn);
        $conn = null;
    }
}

function SelectAllOrders()
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select * from Orders";
    return mysqli_query($conn, $sql);
}

function GetCashierNums()
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select c.EmployeeNum from Cashier c order by c.EmployeeNum";
    return mysqli_query($conn, $sql);
}


function GetShifts()
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select s.ShiftNum, s.ShiftDate from ShiftInDate s order by s.ShiftDate";
    return mysqli_query($conn, $sql);
}


function isInShift($cashier, $shiftNum, $shiftDate)
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select count(*) from CashiersInShifts cis where 
    cis.CashierNum=" . $cashier . " and cis.ShiftNum=" . $shiftNum . " and cis.ShiftDate='" . $shiftDate . "';";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_fetch_array($res)["count(*)"];
    return $count > 0;
}


function getCashierName($cashNum)
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select e.Name from Employee e where e.EmployeeNum=" . $cashNum . ";";
    $res = mysqli_query($conn, $sql);
    $Name = mysqli_fetch_array($res)["Name"];
    return $Name;
}


function assginCashierToShift($cashier, $shiftNum, $shiftDate)
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "insert into CashiersInShifts (ShiftNum, ShiftDate, CashierNum) values (" . $shiftNum . ", '" . $shiftDate . "'," . $cashier . ")";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function shiftAnalysis()
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }

    $sql = "SELECT sd.ShiftNum, sd.ShiftDate, COUNT(cs.ShiftNum) as Actual, s.NumOfCashiers as shouldBe," .
        "(COUNT(cs.ShiftNum) - s.NumOfCashiers) AS Difference " .
        "FROM ShiftInDate sd LEFT OUTER JOIN CashiersInShifts cs " .
        "ON sd.ShiftNum = cs.ShiftNum and sd.ShiftDate = cs.ShiftDate " .
        "INNER JOIN Shift s " .
        "ON sd.ShiftNum = s.ShiftNum " .
        "Where sd.ShiftDate between '2015-01-01' and '2015-01-05' " .
        "GROUP BY sd.ShiftNum, sd.ShiftDate, s.NumOfCashiers";

    return mysqli_query($conn, $sql);
}


function getOrder($on)
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select o.ShiftNum, o.ShiftDate, o.CashierNum, e.Name, o.Payment, " .
        "group_concat(c.Name) as dishes, sum(c.Price) as total " .
        "from Orders o join CoursesInOrder ci on ci.OrderNum = o.OrderNum " .
        "join Course c on c.CourseNum=ci.CourseNum join " .
        "Customer cust on cust.CustomerNum=o.CustomerNum " .
        "join Employee e on e.EmployeeNum = o.CashierNum " .
        "where o.OrderNum = " . $on . " " .
        "group by o.OrderNum, o.ShiftNum, o.ShiftDate, cust.CustomerNum, cust.Name, o.CashierNum, e.Name, o.Payment";

    $res = mysqli_query($conn, $sql);
    $details = mysqli_fetch_array($res);
    return $details;
}

connect();
