<?php
include '../config/db.php';
session_start();
require_once '../vendor/autoload.php';
use Dompdf\Dompdf;

use Dompdf\Options;

// Set options to enable embedded PHP 
$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 
 
// Instantiate dompdf class 
$dompdf = new Dompdf($options); 

$pimg=file_get_contents('logo.png');
$pimg64=base64_encode($pimg);
//$msg='Keyboard';*/
$requisitionid=$_GET['id'];
//$requisitionid=$_SESSION['requisition_id'];
$sql = "SELECT * FROM requisition_book WHERE id = '{$requisitionid}'"; 
$result =mysqli_query($con,$sql) or die("Query Failed.");
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
      $html='
      <!DOCTYPE html>
      <html lang="en" dir="ltr">
        <head>
          <meta charset="utf-8">
          <title>Requistion Form</title>
          <!--<link href="style/style.css" rel="stylesheet">-->
        </head>
        <body>
        <style>
          html,body{
            height: 100%;
            width:100%;
            margin:0;
          }
          .header_div{
            height:5%;
            width:100%;
            text-align:center;
            font-size:25px;
          }
          .main_div{
            height:45%;
            width:100%;
            align-items: center;
            border: 0px black solid;
          }
          td{
            text-align: center;
          }
          .slno{
            width:3%;
          }
          .book_title{
            width:15%;
          }
          .author{
            width:15%;
          }
          .publisher{
            width:15%;
          }
          .totalcopiesrequired{
            width:5%;
          }
          .availablecopiesrequired{
            width:5%;
          }
          .additionalcopiesrequired{
            width:7%;
          }
          .justificationrequired{
            width:20%;
          }
          .title{
            height:15%;
            width:100%;
            border:0px red solid;
          }
          .left{
            height:100%;
            width:40%;
            float:left;
            background-color:none;
            margin-left:5px;
          }
          .right{
            height:100%;
            width:40%;
            float:right;
            text-align:right;
            background-color:none;
            margin-right:5px;
          }
          .logo{
            height:5px;
            width:350px;
          }
          .sign{
            height:10%;
            width:95%;
            background-color:none;
            padding-left:30px;
          }
          .leftSec{
            height:100%;
            width:40%;
            float:left;
            background-color:none;
            text-align:center;
          }
        .rightSec{
          height:100%;
          width:60%;
          float:right;
          background-color:none;
          
        }
        .footer{
          height:10%;
          width:95%;
          background-color:none;
          padding-left:30px;
        }
        .blank_div{
          height: 2%;
          width:100%;
        }
        hr{
          margin-left:10px;
          border:1px solid black;
        }
      </style>
          <div class="header_div">
            <h4 style="font-weight: bold;font-size:25px;text-decoration: underline;">REQUISITION FORM<h4>
          </div>
          <div class="title">
            <div class="left">
              <img src="data:image;base64,'.$pimg64.' class="logo">
            </div>
            <div class="right">
              <span style="font-weight:bold;font-size:15px;color:black">FORM NO. -3</span></br>
              <span style="font-weight:bold;font-size:13px;color:black">(FOR LIBRARY PURPOSE)</span>
            </div>
          </div>
          <div class="main_div">
            <div class="sub_main_div" style="border:1px white solid;align:center;height:22%;">
              <div class="left_div" style="width:50%;float:left;">
              <table border="0" align="left">
              <tr>
                <td style="text-align:left">DEPARTMENT:</td>
                <td>'.$row['dept'].'</td>
              </tr>
              <tr>
                <td>
                PAPER CODE(IF APPLICABLE):</td>
                <td>'.$row['papercode'].' STUDENTS STRENGTH: '.$row['studentstrength'].'</td>
              </tr>
              </table>
            </div>
            <div class="right_div" style="width:50%;float:right;height:25%;">
              <table border="1" align="right" style="width:60%">
              <tr>
                <td colspan="2" style="text-align:left">Date: '.$row['date'].'</td>
                <!--<td>'.$row['date'].'</td>-->
              </tr>
              <tr>
                <td colspan="2" style="font-weight:bold;font-size:18px;"><center>OFFICE USE ONLY</center></td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:left">REFERENCE NO:TI/  '.$row['reffno'].'</td>
                <!--<td>'.$row['reffno'].'</td>-->
              </tr>
              </table>
              </div>
            </div>
            <table border="1" width="100%" style="padding:10px;">
                <tr>
                    <td colspan="5">DEPARTMENT USE ONLY</td>
                    <td colspan="3">LIBRARY USE ONLY</td>
                </tr>
                <tr>
                    <td class="slno">SL NO.</td>
                    <td class="book_title">TITLE OF THE BOOKS</td>
                    <td class="author">AUTHOR</td>
                    <td class="publisher">PUBLISHER</td>
                    <td class="totalcopiesrequired">TOTAL COPIES REQUIRED(A)</td>
                    <td class="availablecopiesrequired">AVAILABE COPIES IN STOCK(B)</td>
                    <td class="additionalcopiesrequired">NEW/ADDITIONAL COPIES REQUIRED C=(A-B)</td>
                    <td class="justificationrequired">JUSTIFICATION FOR NEW/ADDITIONAL COPIES</td>
                </tr>
                <tr>
                    <td style="height:120px;">1</td>
                    <td>'.$row['title'].'</td>
                    <td>'.$row['author'].'</td>
                    <td>'.$row['publisher'].'</td>
                    <td>'.$row['totalcopiesrequired'].'</td>
                    <td>'.$row['availableinstock'].'</td>
                    <td>'.$row['newrequired'].'</td>
                    <td>'.$row['justification'].'</td>
                </tr>
            </table>
          </div>
          <div class="sign">
          <table border="1" style="width:100%;">
          <tr>
            <td>___________________________________________</br>
              FULL SIGNATURE OF REQUISTOR</br>
              DATE:........................
              </td>
            <td>_______________________</br>
            APPROVE BY H.O.D/IN-CHARGE</td>
            <td>REMARKS</br>
            __________________________________</td>
          </tr>
        </table>
      </div>
      <div class="sign">
      <table border="1" style="width:100%;">
        <tr>
          <td>
          ___________________________________________</br>
          SIGNATURE OF LIBRARIAN</br>
          _____________________________</br>
          FORWARD BY CPC
          </td>
          <td></br>
          ___________________________</br>
          APPROVE BY PRINCIPAL</td>
          <td>REMARKS</br>
          __________________________________</td>
        </tr>
      </table>
        </div>
        </body>
      </html>
      ';
  }
}
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream($requisitionid.'_form3.pdf',array("Attachment"=>1));
?>

