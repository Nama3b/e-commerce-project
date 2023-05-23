{{-- @extends('layout')
@section('content')

<div class="checkout-body">
    <div class="container">
      <div class="row">
        <div class="col-8 pl-0 pr-0">
            <?php
              $content = Cart::content();
            ?>
            <div class="product-cart">
              <h6><b>Product cart</b></h6>
              <table>
                <tr class="tbl-header">
                  <td></td>
                  <td>Image</td>
                  <td>Product name</td>
                  <td>Price</td>
                  <td>Quantity</td>
                  <td>Total</td>
                </tr>
                @foreach($content as $v_content)
                <tr class="tbl-body">
                  <td><a href="{{URL::to('/del-cart').'/'.$v_content->rowId}}"><i class="fas fa-trash-alt"></i></a></td>
                  <td><img src="{{URL::to('public/uploads/product/'.'/'.$v_content->options->image)}}" alt="" width="70px"></td>
                  <td><b>{{$v_content->name}}</b></td>
                  <td>{{'$'.number_format($v_content->price,0,',','.')}}</td>
                  <td>{{$v_content->qty}}</td>
                  <td>
                    <?php
                      $subtotal = $v_content->price * $v_content->qty;
                      echo '$'.number_format($subtotal,0,',','.');
                    ?>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
        </div>
        <div class="col-4 pl-0 pr-0">
              <div class="client-info">
                <h6><b>Client info</b></h6>
                  <table>
                    <tr class="tbl-header">
                      <td></td>
                      <td>Client name</td>
                      <td>Email</td>
                      <td>Phonenumber</td>
                      <td>Address</td>
                    </tr>
                    @foreach($content as $v_content)
                    <tr class="tbl-body">
                      <td><a href="{{URL::to('/del-cart').'/'.$v_content->rowId}}"><i class="fas fa-trash-alt"></i></a></td>
                      <td><img src="{{URL::to('public/uploads/product/'.'/'.$v_content->options->image)}}" alt="" width="70px"></td>
                      <td><b>{{$v_content->name}}</b></td>
                      <td>{{'$'.number_format($v_content->price,0,',','.')}}</td>
                      <td>{{$v_content->qty}}</td>
                      <td>
                        <?php
                          $subtotal = $v_content->price * $v_content->qty;
                          echo '$'.number_format($subtotal,0,',','.');
                        ?>
                      </td>
                    </tr>
                    @endforeach
                  </table>
              </div>
              <div class="checkout-section">
                <h6><b>Checkout</b></h6>
                <div class="item-price">
                  <table>
                    <tr>
                      <td>Total:</td>
                      <td>{{'$'.Cart::priceTotal(0,',','.')}}</td>
                    </tr>
                    <tr>
                      <td>Ship cost:</td>
                      <td>Freeship</td>
                    </tr>
                    <tr>
                      <td>Tax cost:</td>
                      <td>{{'$'.Cart::tax(0,',','.')}}</td>
                    </tr>
                    <tr>
                      <td>Total price:</td>
                      <td><b>{{'$'.Cart::total(0,',','.')}}</b></td>
                    </tr>
                  </table>
                </div>
                <button type="submit" class="btn btn-dark" name="payment">Payment</button>
              </div>
        </div>
      </div>
    </div>
</div>

@endsection
 --}}

 <div class="send-mail-body">
   <div class="container text-center">
     <h2>Hi, I'm {{$name}}</h2>
     <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque voluptas maiores consequatur, odit ab sapiente neque autem provident accusamus cum distinctio, consequuntur molestiae, esse illo sequi. Quos, possimus, quasi.</p>
   </div>
 </div>
