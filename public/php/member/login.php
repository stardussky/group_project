<?php
  try{
    require_once('../pdo.php');
    $sql = 'select * from `member` where mem_id = :mem_id && mem_psw = :mem_psw';
    $res = $pdo->prepare($sql);
    $res->bindParam(':mem_id', $_POST['mem_id']);
    $res->bindParam(':mem_psw', $_POST['mem_psw']);
    $res->execute();
    if($res->rowCount() > 0){
      $member = $res->fetchObject();
      echo json_encode(['status'=>'success', 'content'=>'登入成功', 'data'=>$member]);
      session_start();
      foreach($member as $key=>$info){
        $_SESSION[$key] = $info;
      }
    }else {
      echo json_encode(['status'=>'error', 'content'=>'帳號或密碼錯誤']);
    }
  }catch(PDOException $e){
    echo $e->getLine();
    echo $e->getMessage();
  }