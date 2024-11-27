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
      height:50%;
      width:100%;
      align-items: center;
    }
    td{
      text-align: center;
    }
    .slno{
      width:10%;
    }
    .item{
      width:20%;
    }
    .spec{
      width:20%;
    }
    .totalqty{
      width:5%;
    }
    .stock{
      width:5%;
    }
    .new_add{
      width:10%;
    }
    .just{
      width:10%;
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
      height:80px;
      width:400px;
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
      REQUISITION FORM
    </div>
    <div class="title">
      <div class="left">
        <img src="logo.png" alt="logo" class="logo">
      </div>
      <div class="right">
        FORM NO -1</br>
        (FOR LAB REQUISITION)
      </div>
    </div>
    <div class="main_div">
      <table border="0" align="left">
        <tr>
          <td style="text-align:left">DEPARTMENT:</td>
          <td>BCA/MCA</td>
        </tr>
        <tr>
          <td>
          PAPER CODE(IF APPLICABLE):</td>
          <td>BCAC102</td>
        </tr>
      </table>
      <table border="0" align="right">
        <tr>
          <td colspan="0">Date:</td>
          <td>17.09.2022</td>
        </tr>
        <tr>
          <td colspan="2"><center>OFFICE USE ONLY</center></td>
        </tr>
        <tr>
          <td>REFERENCE NO:TI/</td>
          <td>30701017004</td>
        </tr>
      </table>
      <table border="1" width="100%" style="padding:10px;">
        <tr>
          <td colspan="7"><center>DEPARTMENT USE ONLY</center></td>
        </tr>
        <tr>
          <td class="slno">SL.NO.</td>
          <td class="item">ITEM</td>
          <td class="spec">SPECIFICATION/DESCRIPTION</td>
          <td class="totalqty">TOTAL QUANTITY REQUIRED(A)</td>
          <td class="stock">QUANTITY IN STOCK(B)</td>
          <td class="new_add">NEW/ADDITIONAL QUANTITY REQUIRED C=(A-B)</td>
          <td class="just">JUSTIFUCATION FOR NEW/ADDITIONAL QUANTITY</td>
        </tr>
        <tr>
          <td style="height:150px;">1</td>
          <td>Keyboard</td>
          <td></textarea></td>
          <td>10</td>
          <td>2</td>
          <td>8</td>
          <td>Required 10 keyboard fro lab3 because left keuboard are not in working mode.</td>
        </tr>
      </table>
    </div>
    <!--<div class="sign">
          <div class="leftSec">
            </br>
           <hr></hr>
            FULL SIGNATURE OF LAB/WORKSHOP IN-CHARGE</br></br>
            DATE:_____________________________</br>
            MOBILE NO:_____________________________
          </div>
          <div class="rightSec">
              <table border="1" style="height:100%;width:40%;border-top:3px black solid;border-bottom:3px black solid;border-left:3px black solid;border-right:1px black solid;" align="left">
                <tr >
                  <td>_____________________________</td>
                </tr>
                <tr>
                  <td>
                    APPROVED BY H.O.D / IN-CHARGE
                  </td>
                </tr>
              </table>
              <table border="1" style="height:100%; width:100%;" align="none">
                <tr border="0">
                  <td>REMARKS</br>
                  <hr></hr>
                  </td>
                </tr>
                <tr>
                  <td>
                  _____________________________
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="blank_div">
          </div>
          <div class="footer">
            <div class="leftSec">
              </br>
              </br>
              </br>
              <hr></hr>
              <center>FORWARD BY CPC</center>
          </div>
          <div class="rightSec">
              <table border="0" style="height:100%;width:40%;border-top:3px black solid;border-bottom:3px black solid;border-left:3px black solid;border-right:1px black solid;" align="left">
                <tr >
                  <td>_____________________________</td>
                </tr>
                <tr>
                  <td>
                    APPROVED BY PRINCIPAL
                  </td>
                </tr>
              </table>
              <table border="0" style="height:100%; width:40%; border-top:3px black solid;border-bottom:3px black solid;border-right:3px black solid;" align="none">
                <tr border="0">
                  <td>REMARKS</br>
                  <hr></hr>
                  </td>
                </tr>
                <tr>
                  <td>
                  _____________________________
                  </td>
                </tr>
              </table>
          </div>
    </div>-->
    <div class="sign">
      <table border="1" style="width:100%;">
        <tr>
          <td>_______________________</td>
          <td>_______________________</td>
          <td>REMARKS</td>
        </tr>
        <tr>
          <td>
            FULL SIGNATURE OF LAB./WORKSHOP IN-CHARGE 
          </td>
          <td>
            APPROVE BY H.O.D/IN-CHARGE
          </td>
          <td>
              __________________________________
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
