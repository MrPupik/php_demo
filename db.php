<?php

$conn = null;

function connect()
{
    global $conn;
    $conn = mysqli_connect('127.0.0.1', 'root', 'Pinpazil1', 'ChefExpress');
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
    $sql = "select c.EmployeeNum from Cashier c";
    return mysqli_query($conn, $sql);
}


function GetShifts()
{
    global $conn;
    if (!isset($conn)) {
        print("not connected");
        return null;
    }
    $sql = "select s.ShiftNum, s.ShiftDate from ShiftInDate s";
    return mysqli_query($conn, $sql);
}
