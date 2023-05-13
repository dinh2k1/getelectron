<!--phần thanh toán đặt hàng-->

<?php require_once('cart_c/cart_c.php');?>

<?php 

    $cart_class = new cart_controller();

    $cart = $cart_class->update_cart();
    
    $rs = $cart_class->checkout_cart();

    $post = $cart_class->post;
    
    if(isset($rs['error'])){
        $error = $rs['error'];
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Get Electron | Shop điện tử</title>

    <!-- HEAD -->
    <?php include('module/head.php')?>
    <!-- END HEAD -->
</head>

<body>

    <div class="web-warper">
        
        <!-- HEAD -->
        <?php include('module/header.php')?>
        <!-- END HEAD -->

        <div class="container"> <!--chỉnh phần thanh toán-->
            <div class="list-warper">
                <h2 class="list-title">GIỎ HÀNG CỦA BẠN</h2>
                <div class="row cart p-2">
                    
                    <div class="offset-md-2 col-md-8">

                        <form action="" method="post">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php if (!empty($cart)): ?>
                                            
                                        <?php foreach ($cart as $v): ?>
									<!--phần hình ảnh sản phẩm và kích thước thanh số lượng sp-->
                                            <tr class="product_item_<?=$v['Product_ID']?>">
                                                <td style="width:30%">
                                                    <img src="upload/<?=$v['Product_Thumbnail']?>" class="img-fluid" width="200" alt="">
                                                </td>
                                                <td style="width:45%"><strong><?=$v['Product_Name']?></strong></td>
                                                <td>
                                                    <p class="p-price product_price_<?=$v['Product_ID']?>">
                                                        <?=number_format($v['Product_Price']*$v['quanlity'],'0','','.')?>VNĐ
                                      
                                                    <div class="input-group mt-3">
														
                                                        <div class="input-group-prepend" id="button-addon3">
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="minus_number(<?=$v['Product_ID']?>)"><i class="fas fa-minus"></i></button>
                                                        </div> <!--phần nút giảm số lượng sp-->
                                                        
                                                        <input type="hidden" name="product_id[<?=$v['Product_ID']?>]" class="form-control" value="<?=$v['Product_ID']?>">
                                                        <input type="hidden" name="price[<?=$v['Product_ID']?>]" class="form-control price" value="<?=$v['Product_Price']?>">
                                                        
														<!--phần hiển thị số lượng sp của thanh giỏ hàng-->
														
                                                        <input type="number" name="quanlity[<?=$v['Product_ID']?>]" class="form-control form-control-smquanlity"  data-price="<?=$v['Product_Price']?>" quanlity-id="<?=$v['Product_ID']?>" value="<?=$v['quanlity']?>">
														
														
                                       
                                                        
                                                        <input type="hidden" class="current_price" value="<?=$v['Product_Price']*$v['quanlity']?>"> <!--hiển thị số tiền dưới tổng tiền-->

                                                        <div class="input-group-append" id="button-addon3">
															 
                                                            
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="plus_number(<?=$v['Product_ID']?>)"><i class="fas fa-plus"></i></button> <!--nút tăng số lượng sp-->
                                                        </div>
                                                    </div>
													<!--phần nút xóa sp--> 
                                                    <button class="btn btn-sm btn-danger" type="button" onclick="delete_item(<?=$v['Product_ID']?>)"><i class="fas fa-trash"></i> Xóa</button>
                                                </td>
                                            </tr>

                                        <?php endforeach ?>
                                        <tr>
                                            <td><strong>Tổng tiền:</strong></td>
                                            <td colspan="2" class="text-right"><p class="p-price total_price"></p></td>
                                        </tr> <!--vị trí số tiền-->
                                       
                                    <?php endif ?>
									
                                </table>
                            </div>
                            
                            <h3>Thông tin khách hàng</h3>
                            <small class="d-block text-red"><?php if(isset($error['main'])) echo $error['main']?></small>
                            <div class="form-group">
                                <label for="Orders_Name">Họ Tên</label>
                                <small class="d-block text-red"><?php if(isset($error['Orders_Name'])) echo $error['Orders_Name']?></small>
                                <input type="text" class="form-control" name="Orders_Name" placeholder="Họ và tên" id="Orders_Name" value="<?=$post['Orders_Name']?>">
                            </div>

                             <div class="form-group">
                                <label for="Orders_Address">Điạ chỉ</label>
                                <small class="d-block text-red"><?php if(isset($error['Orders_Address'])) echo $error['Orders_Address']?></small>
                                <input type="text" class="form-control" name="Orders_Address" placeholder="Số nhà, tên đường" id="Orders_Address" value="<?=$post['Orders_Address']?>">
                            </div>
                            <div class="form-group">
                                <label for="Orders_Phone">Điện thoại</label>
                                <small class="d-block text-red"><?php if(isset($error['Orders_Phone'])) echo $error['Orders_Phone']?></small>
                                <input type="text" class="form-control" name="Orders_Phone" placeholder="Số điện thoại" id="Orders_Phone" value="<?=$post['Orders_Phone']?>">
                            </div>

                            <div class="form-group">
                                <label for="Orders_Email">Email</label>
                                <small class="d-block text-red"><?php if(isset($error['Orders_Email'])) echo $error['Orders_Email']?></small>
                                <input type="text" class="form-control" name="Orders_Email" placeholder=" Email" id="Orders_Email" value="<?=$post['Orders_Email']?>">
                            </div>

                             <div class="form-group">
                                <label for="Orders_Payway">Hình thức thanh toán</label>
                               <select name="Orders_Payway" id="Orders_Payway" class="form-control">
														
															<option value="1" <?php if($post['Orders_Payway']==1){echo 'selected';}?>>Tiền mặt</option>
															<option value="2" <?php if($post['Orders_Payway']==2){echo 'selected';}?>>Thanh toán onl</option>
								   
														</select>
							</div>
						
						<!--	<div class="form-group">
                                <label>Địa điểm giao hàng </label>
                               <select name="Orders_HCM"  id="Orders_HCM" class="form-control">
								    
														<option value="">----------TP.HCM-----------</option>
														<option value="1" <?php if($post['Orders_HCM']==1){echo 'selected';}?>>Quận 1</option>
								   
															<option value="2" <?php if($post['Orders_HCM']==2){echo 'selected';}?>>Quận 2</option>
								   
								                             <option value="3" <?php if($post['Orders_HCM']==3){echo 'selected';}?>>Quận 3</option>
								   
								                             <option value="4" <?php if($post['Orders_HCM']==4){echo 'selected';}?>>Quận 4</option>
								   
								                              <option value="5" <?php if($post['Orders_HCM']==5){echo 'selected';}?>>Quận 5</option>
								   
								                              <option value="6" <?php if($post['Orders_HCM']==6){echo 'selected';}?>>Quận 6</option>
								   
								                               <option value="7" <?php if($post['Orders_HCM']==7){echo 'selected';}?>>Quận 7</option>
								   
								                                <option value="8" <?php if($post['Orders_HCM']==8){echo 'selected';}?>>Quận 8</option>
								   
								                                <option value="9" <?php if($post['Orders_HCM']==9){echo 'selected';}?>>Quận 9</option>
								   
								                                <option value="10" <?php if($post['Orders_HCM']==10){echo 'selected';}?>>Quận 10</option>
								   
								                                 <option value="11" <?php if($post['Orders_HCM']==11){echo 'selected';}?>>Quận 11</option>
								   
								                                  <option value="12" <?php if($post['Orders_HCM']==12){echo 'selected';}?>>Quận 12 </option>
								   
								                                   <option value="17" <?php if($post['Orders_HCM']==17){echo 'selected';}?>> Thủ Đức </option>
								   
								   <option value="18" <?php if($post['Orders_HCM']==18){echo 'selected';}?>> Tân Phú </option>
								   
								                                 
								                                    
								                               <option value="19" <?php if($post['Orders_HCM']==19){echo 'selected';}?>>Tân Bình </option>
								    
								                                 <option value="20" <?php if($post['Orders_HCM']==20){echo 'selected';}?>>Phú Nhuận </option>
								   
								                                <option value="21" <?php if($post['Orders_HCM']==21){echo 'selected';}?>>Gò Vấp </option>
								   
								                                 <option value="22" <?php if($post['Orders_HCM']==22){echo 'selected';}?>>Bình Thạnh </option>
								   
								                                 <option value="23" <?php if($post['Orders_HCM']==23){echo 'selected';}?>>Bình Tân </option>
								   
								
								                             
								                               
								                                <option value="13" <?php if($post['Orders_HCM']==13){echo 'selected';}?>>Huyện Củ Chi </option>
								                               
								                                  <option value="14" <?php if($post['Orders_HCM']==14){echo 'selected';}?>>Huyện Hóc Môn </option>
								   
								                                    <option value="15" <?php if($post['Orders_HCM']==15){echo 'selected';}?>>Huyện Bình Chánh </option>
								   
								                                     <option value="16" <?php if($post['Orders_HCM']==16){echo 'selected';}?>>Huyện Nhà Bè </option>
								   
								   	   
								   </select></div>
							
							
								 <div class="form-group">  
							
                                <select name="Orders_HN"  id="Orders_HN" class="form-control">
                              
								             <option value="">-----------HÀ NỘI-----------</option>
								                            <option value="1" <?php if($post['Orders_HN']==1){echo 'selected';}?>>Quận Ba Đình</option>
								   
															<option value="2" <?php if($post['Orders_HN']==2){echo 'selected';}?>>Quận Hoàn Kiếm</option>
								   
								                             <option value="3" <?php if($post['Orders_HN']==3){echo 'selected';}?>>Quận Tây Hồ</option>
								   
								                             <option value="4" <?php if($post['Orders_HN']==4){echo 'selected';}?>>Quận Long Biên</option>
								   
								                              <option value="5" <?php if($post['Orders_HN']==5){echo 'selected';}?>>Quận Cầu Giấy</option>
								   
								                              <option value="6" <?php if($post['Orders_HN']==6){echo 'selected';}?>>Quận Đống Đa</option>
								   
								                               <option value="7" <?php if($post['Orders_HN']==7){echo 'selected';}?>>Quận Hai Bà Trưng</option>
								   
								                                <option value="8" <?php if($post['Orders_HN']==8){echo 'selected';}?>>Quận Hoàng Mai</option>
								   
								                                <option value="9" <?php if($post['Orders_HN']==9){echo 'selected';}?>>Quận Thanh Xuân</option>
								   
								                                <option value="10" <?php if($post['Orders_HN']==10){echo 'selected';}?>>Quận Nam Từ Liêm</option>
								   
								                                 <option value="11" <?php if($post['Orders_HN']==11){echo 'selected';}?>>Quận Bắc Từ Liêm</option>
								   
								                                  <option value="12" <?php if($post['Orders_HN']==12){echo 'selected';}?>>Quận Hà Đông</option>
								                              
									   
								   </select></div>
							</br> -->
						<div class="cmt-body" id="Div2" data-load="0">
                            <div id="cmt_postnew_div">
                                <div class="frm-comment-rating" style="margin-bottom: 10px;">
                                   
                                        <tr style="padding-bottom: 20px;">
                                            <td class="c2" style="width: 40%">
                                                <input type="text" id="hid-Star" hidden />
                                                <label style="margin-top: 7px !important; margin-right: 20px; text-align: left; float: left; font-size: 14px; font-weight: normal; color: #898989;">Chọn cách thức nhận hàng (*bắt buộc)</label>
                                                <fieldset class="rating rating-action" style="text-align: left; border: 0 !important; padding-top: 0;">
                                                    <input type="radio" id="orders" name="Orders_Rec" value="1" /><label >Giao tận nơi</label>
                                                    <input type="radio" id="orders" name="Orders_Rec" value="2" /><label>Nhận tại siêu thị</label>
                                                   
                                           
                                        </tr>
                                       
                                   
                                </div>
								</div></br></br>
						
						<div class="form-group">
                         <label for="Orders_Mess">Lời nhắn</label>
								 <small class="d-block text-red"><?php if(isset($error['Orders_Mess'])) echo $error['Orders_Mess']?></small>
                                <textarea name="Orders_Mess" class="form-control" placeholder="Lời nhắn của Quý Khách" id="Orders_Mess" rows="5" value=" <?=$post['Orders_Mess']?>"></textarea>
                            </div></br>
					
					
						

                         
                            <div class="offset-md-2 col-md-8 text-center">
                                <button type="submit" class="finaltotal" name="submit">Đặt Hàng</button>
					</div></br></br>
					
                        </form>
			</div></br>
 
					
                </div>
            </div>

        </div>
		
		  
        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
    <?php include('module/js.php') ?>

    <script>
        <?php if(isset($rs['success'])):?>
            alert('<?=$rs['success']['main']?>');
        <?php endif ?>
        
        total_price();
                              
        function formatNumber (num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
        }//hiện rõ số tiền của tổng tiền//    //ngăn cách số tiền của phần tổng tiền (bắt đầu từ replace về sau)//

        function minus_number(id){

            var quanlity = parseInt($("input[quanlity-id="+id+"]").val());
            var price = parseInt($("input[quanlity-id="+id+"]").attr('data-price'));

            if(quanlity>1){
               quanlity= quanlity-1;
                $("input[quanlity-id="+id+"]").val(quanlity);    
            }
            
            $("input.current_price").val(quanlity*price);
            
            $('.product_price_'+id).html(formatNumber(quanlity*price)+'VNĐ');
            

            total_price();
        }
        
		
        function plus_number(id){

            var quanlity = parseInt($("input[quanlity-id="+id+"]").val());
            var price = parseInt($("input[quanlity-id="+id+"]").attr('data-price'));

            quanlity = quanlity+1;
            $("input[quanlity-id="+id+"]").val(quanlity);

            
            $("input.current_price").val(quanlity*price);
            $('.product_price_'+id).html(formatNumber(quanlity*price)+'VNĐ');   /*số tiền thay đổi theo số lượng sp*/

            total_price();            
        }        

        function delete_item(id){
            $.ajax({
                type: "POST",
                url: 'cart.php',
                data: {delete:id},
                dataType: 'json',
                success: function(data){
                    if(data==1){
                        $('.product_item_'+id).remove(); /*xóa sp trong giỏ hàng*/
                        total_price();    
                    }
                }
            });    
        }

        function total_price(){
            var total_price = 0;
            
            $('.current_price').each(function( i, obj ) {
                total_price += parseInt(obj.value);
            });

            $('.total_price').html(formatNumber(total_price)+'VNĐ'); /*hiển thị tổng số tiền*/
			
			
        }

        
    </script>
 
</body>

</html>