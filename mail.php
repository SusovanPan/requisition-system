<?php

$to="susovan.pan1995@gmail.com";
$subject="Test mail";
$message="Hello Buddy!...";
$from="susovan.pan1995@gmail.com";
$header=[   "MIME-Version: 1.0",
            "Content-type: text/plain; charset=utf-8",
            "From: $from",
];

if(mail($to,$subject,$message,$header))
{
    echo "Done";
}
else{
    echo "Not Done";
}
?>
