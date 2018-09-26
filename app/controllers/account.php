<?php
class Account extends Controller {
  public function index() {
    $this->view( 'home/account', []);
  }
}