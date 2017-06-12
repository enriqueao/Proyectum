<?php
if (Session::exist()){
  $this->render('Index','top-bar-con',true);
} else {
  $this->render('Index','top-bar-sin',true);
}
?>
