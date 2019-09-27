@extends('layouts.layout')

@section('content')
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>LM ECsite</title>
    <link rel="stylesheet" href="css/cart.css">
  </head>
  
  <body>
      <div class="main-contents"> 
            <h2>買い物かご</h2>
      </div>
    <table class="koumoku">
          <tbody>
            <tr>            <!-- tr=横１列枠 tableRowの略-->
              <th colspan="7">商品情報</th>  <!-- th=題 tableHeaderの略 colspanはtabel属性のセルを横方向に並ばせる-->
              <th colspan="3">数量</th>
              <th colspan="5">価格</th>
              <th colspan="3">  </th>
            </tr>
                        
            <tr>
              <td class="basket-num">1</td>
              <td class="basket-img"><img src="image/1.png" alt="item_1"></td>
              <td class="basket-name">Coffee & British</td>
              <td>
                <div class="quantity-wrap">   <!-- quantityとamount=量 -->
                  <div class="basket-quantity">
                    <input name="amount" value="1" size="2" maxlength="9">
                  </div>
                  <div class="basket-amend">  <!-- amend=修正する -->
                    <a href="JavaScript:send(0, 'upd)" class="btn-s btn-small">修正</a>
                  </div>
                </div>
              </td>
              <td class="basket-price">3,000円</td>
              <td class="basket-btn">
                <a href="JavaScript;send(0, 'del')" class="btn-s btn-small">削除</a>
              </td>
            </tr>
          </tbody>
    </table>
    
    <div class="btn-wrap">    <!-- wrap=包み -->
      <div class="btn-wrap-back">
        <a href="#" class="btn">買い物に戻る</a>
        <a href="#" class="btn">かごの中身を空にする</a>
      </div>
      <div class="btn-wrap-order">
        <a href="#" class="btn">購入手続きへ進む</a>
      </div>
    </div>
  </body>
@endsection