<?php

  return [
      /*
      |---------------------------------------------------
      | const
      |---------------------------------------------------
      */
      
      // 0:仮登録 1:本登録 2:メール認証済 9:退会済
      'USER_STATUS' => ['PRE_REGISTER' => '0', 'REGISTER' => '1', 'MAIL_AUTHED' => '2', 'DEACTIVE' => '9'],
      ];
      
      //こうすることで、config('const.XXX')で設定値を参照する事ができる
      //配列の時はconfig('const.array.XXX')のように書く