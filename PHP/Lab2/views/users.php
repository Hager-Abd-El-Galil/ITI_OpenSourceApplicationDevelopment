<?php

$users = convert_file_to_array();
echo "<div style='font-family:monospace;
                  text-align:center;
                  border:solid thin black;
                  width:50%;
                  margin-left:25%;
                  margin-top: 5%;
                  padding:2%;'>";
echo "<h2> All Users </h2>";
echo str_repeat("_", 20);

foreach($users as $user){
    $user_details = explode(",",$user); //convert string to array  
    $visit_date = $user_details[0];
    $ip_address = $user_details[1];
    $email = $user_details[2];
    $name = $user_details[3];
    
    echo "<ul style='margin-top:1%;list-style: none;'>
            <li> <b> Visit Date : </b> $visit_date </li>
            <li> <b> IP Address : </b> $ip_address </li>
            <li> <b> Email : </b> $email </li>
            <li> <b> Name : </b> $name </li> 
          </ul>";
    echo str_repeat("_", 40);
}
echo "</div>";