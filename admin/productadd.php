<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    // var_dump($_POST,$_FILES);
    // echo '<pre>';
    // echo print_r($_FILES['product_img_desc']['name']);
    // echo '</pre>';
    $insert_product = $product ->insert_product($_POST,$_FILES);
}
?>
<style>
    /* --------------product--------------------------- */
.admin-content-right-productadd_add h2 {
    margin-bottom: 20px;
}
.admin-content-right-productadd_add input,select {
    width: 200px;
    height: 30px;
    display: block;
    margin: 6px 0 12px;
    padding-left: 12px;
}
.admin-content-right-productadd_add textarea {
    display: block;
    height: 200px;
    width: 500px;
    margin-bottom: 12px;
    padding: 12px;
}
.admin-content-right-productadd_add button {
    display: block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    background-color: brown;
    color: white;
    border: none;
}
.admin-content-right-productadd_add button:hover {
    background-color: transparent;
    color: brown;
    border: 1px solid brown;
}
</style>
<div class="admin-content-right">
<div class="admin-content-right-productadd_add">
                <h2>Thêm sản phẩm</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name = "product_name" require type="text">
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label>
                    <select name="cartegory_id" id="cartegory_id">
                    <option value="#">--Chọn--</option>
                        <?php
                        $show_cartegory = $product -> show_cartegory();
                        if($show_cartegory) {while($result = $show_cartegory ->fetch_assoc()){

                        ?>
                        <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php 
                        }} 
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">

                    <label for="">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_brand = $product -> show_brand();
                        if($show_brand) {while($result = $show_brand ->fetch_assoc()){

                        ?>
                        <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                        <?php 
                        }} 
                        ?>
                    </select>
                    <label for="">Giá sản phẩm <span style="color: red;">*</span></label>                   
                    <input name="product_price" require type="text">
                    <label for="">Giá khuyến mãi <span style="color: red;">*</span></label>
                    <input name="product_price_new" require type="text">
                    <label for="">Mô tả sản phẩm <span style="color: red;">*</span></label>
                    <textarea require name="product_desc" id="editor1" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm <span style="color: red;">*</span></label>
                    <input require name="product_img" type="file">
                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="product_img_desc[]" require multiple type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>


<script>
    
    CKEDITOR.replace( 'editor1', {
	filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
	filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
} );
</script>

<script>
    $(document).ready(function(){
        $("#cartegory_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get("productadd_ajax.php",{cartegory_id:x},function(data){
                $("#brand_id").html(data);
            })          
        })
    })
</script>
</html>