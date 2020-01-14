

<!-- CONTENT -->
<div id="content_holder" class="fixed">
  <div class="inner">
    <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="account.html">Account</a> » Shopping Cart</div>
    <h2 class="heading-title"><span>Shopping Cart (4.90 kg)</span></h2>
    <div id="content">
      <div class="cart-info">
        <table>
          <thead>
            <tr>
              <td class="remove">Remove</td>
              <td class="image">Image</td>
              <td class="name">Product Name</td>
              <td class="quantity">Quantity</td>
              <td class="price">Unit Price</td>
              <td class="total">Total</td>
            </tr>
          </thead>


          <tbody>
          <?php 
            foreach ($contents as $v_contents) {

 
           ?>
              <tr>
                <td class="remove"><a href="">X</a></ABBR></td>
                <td class="image"><a href="product.html"><img src="<?php echo base_url().$v_contents['options']['image'] ?>" alt="Spicylicious store" /></a></td>
                  <td class="name">
                    <div><?php echo $v_contents['name'] ?></div>
                  </td>
                  <td class="quantity">
                    <form action="post">
                    <input type="text" size="3" value="<?php echo $v_contents['qty'] ?>" name="quantity[41]"/></td>
                    <td class="price"><?php echo $v_contents['price'] ?></td>
                    <td class="total"><?php echo $v_contents['subtotal'] ?></td>
                    </form>
                  </tr>

                <?php } ?>
           
              </tbody>
            </table>
          </div>

          <div class="cart-total">
            <table>
              <tbody>
                <tr>
                  <td colspan="5"></td>
                  <td class="right"><b>Sub-Total:</b></td>
                  <td class="right numbers"></td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="right"><b>VAT 17.5%:</b></td>
                  <td class="right numbers"></td>
                </tr>
                <tr>
                  <td colspan="5"></td>
                  <td class="right numbers_total"><b>Total:</b></td>
                  <td class="right numbers_total"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="buttons">
            <div class="left"><a class="button" onclick="#"><span>Update</span></a></div>
            <div class="right"><a class="button" href="#"><span>Checkout</span></a></div>
            <div class="center"><a class="button" href="#"><span>Continue Shopping</span></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- END OF CONTENT --> 


  </div>
  <!-- END OF MAIN WRAPPER --> 
  <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script> 
  <script type="text/javascript" src="http://twitter.com/statuses/user_timeline/d_koev.json?callback=twitterCallback2&amp;count=3"></script> 
  <script type="text/javascript"><!--
    $(document).ready(function() {
      $('#twitter_update_list').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		next:   '#tweet_next', 
   prev:   '#tweet_prev'
 }); 
    });
    //--></script> 
    <script type="text/javascript"><!--
      $('.cart-module .cart-heading').bind('click', function() {
       if ($(this).hasClass('active')) {
        $(this).removeClass('active');
      } else {
        $(this).addClass('active');
      }

      $(this).parent().find('.cart-content').slideToggle('slow');
    });
    //--></script>
  </body>
  </html>
