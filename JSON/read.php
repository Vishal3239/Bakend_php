<?php
  
  $json = file_get_contents("https://jsonplaceholder.typicode.com/posts/1/comments");
  $data = json_decode($json,true);
//   foreach($data as $user){
//     echo $user["postId"]."</br>";
//     echo $user["id"]."</br>";
//     echo $user["email"]."</br>";
//     echo $user["body"]."</br>";
//   }
echo "<pre>";
print_r($data);
echo "</pre>";


?>