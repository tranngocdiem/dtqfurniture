@extends('Admin._layoutadmin')
@section('link')
@parent
<link href="{{ url('/') }}/css/admin/quanlysanpham.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
@stop
@section('content')
<div class="row">
        <br>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <div class="row">
                        <div style="font-weight: bold; font-size: 20px;" class="col-lg-8">
                            Danh sách sản phẩm
                        </div>   
                        <div class="col-lg-4" style="text-align: right">
                            <button type="button" class="btnaddproduct btn btn-outline btn-success" data-toggle="collapse"  href="#collapseOne">Thêm loại sản phẩm</button>
                            <button type="button" class=" btnaddproduct btn btn-outline btn-success" data-toggle="collapse"  href="#collapseTwo">Xóa sản phẩm</button>
                        </div>
                    </div>
                </div>

                
                <div style="margin-top: 20px" id="collapseOne" class="panel-collapse collapse">
                   
                    <h4 style="color: #4b9249; padding-left: 20px;">Thêm sản phẩm</h4>
                    
                    <!-- <form method="POST" > -->
                        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                        <div class="panel-body">
                            <!--  thêm loại sản phẩm-->
                            <div id="ttsp" class="form-group col-lg-4">
                                <input id="txttenloai" class="form-control" placeholder="Tên loại sản phẩm" name="name"
                                >
                            </div>
                            <!-- thêm giá -->
                            <div  class="form-group col-lg-5" style="display: table">
                                <input id="txtgia" style="width: 80%; float: left;" class="form-control" placeholder="Giá : VNĐ" name="price"
                                >
                            </div>
                            <!-- thêm category -->
                            <div style="margin-left: 20px"> Chọn sản phẩm có sẵn hoặc thêm mới</div>
                            <br>
                            <div  class="form-group col-lg-9">
                                 <select id="listsanpham" style="float: left; width:60%; " class="form-control" name="category" >
                                     <option value="0">Chọn mẫu sản phẩm</option>

                                     <?php if (isset($sanpham)){
                                        foreach ($sanpham as $value) 
                                     {
                                     ?>
                                     <option value="<?php echo $value->masp ?>"><?php echo $value->tensp ?></option>
                                         
                                     <?php }} ?>

                                 </select>
                                 <div>
                                  <button class=" btn btn-outline btn-success myBtn" id="" 
                                style="width:30%;margin-left: 10px;">Thêm sản phẩm</button>
                                <div id="" class="modal">
                                    <div class="modal-content">
                                         <span class="close">&times;</span>
                                         <br>
                                         <br>
                                        <!-- <form method="post" id="themspform">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                             <div>
                                             
                                             <input style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Nhập tên sản phẩm" name="tensp" id="tensanpham">
                                             </div>
                                             <p> Thuộc loại:</p>
                                             <div>
                                             <select id="mausanpham" class="form-control" style="width: 100%; margin-bottom: 20px" >
                                                <?php $mausp = DB::table('mausanpham')->where('isDeleted','0')->get();
                                                 foreach ($mausp as $key) { ?>
                                                    <option value="<?php echo $key->mamau?>"> <?php echo $key->tenmau?></option>
                                                    <?php } ?>

                                                                                                    }
                                             </select>
                                             </div>
                                             <button style="width: 100%;" type="button" class="btn btn-primary btn-block btn-large" id="btnthemsanpham">Thêm</button>
                                             <!-- </form> -->
                                    </div>
                                </div> 
                            </div>
                            </div>
                            

                            <!-- thêm khuyến mãi -->
                            <div style="margin-left: 20px"> Chọn khuyến mãi có sẵn hoặc thêm mới</div>
                            <br>
                            <div  class="form-group col-lg-9">
                                 <select id="listkhuyenmai" style="float: left; width:60%; " class="form-control" name="category" >
                                    <option value="0">Chọn khuyến mãi</option>
                                     <?php if (isset($khuyenmai)){
                                        foreach ($khuyenmai as $value) 
                                     {
                                     ?>
                                     <option value="<?php echo $value->makm ?>"><?php echo $value->tenkm ?></option>
                                         
                                     <?php }} ?>
                                 </select>
                                 <div>
                                  <button id="" class=" btn btn-outline btn-success myBtn"
                                style="width:30%;margin-left: 10px;" name="btn_submit">Thêm khuyến mãi</button> 
                                <div id="" class="modal">
                                    <div class="modal-content">
                                         <span class="close">&times;</span>
                                         <br>
                                         <br>
                                        <!-- <form method="post" id="themkmform"> -->
                                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                             <div>
                                             <input style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Nhập tên khuyến mãi" name="tensp" id="tenkhuyenmai">
                                             <input style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Giảm giá: %" name="tensp" id="discount">
                                             <input type="date" style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Ngày bắt đầu" name="tensp" id="ngaybatdau">
                                             <input type="date" style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Ngày kết thúc" name="tensp" id="ngayketthuc">
                                             </div>
                                             <button  style="width: 100%;" type="button" class="btn btn-primary btn-block btn-large" id="btnthemkm">Thêm</button>
                                            <!--  </form> -->
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- thêm chủ đề -->
                            <div style="margin-left: 20px"> Chọn chủ đề có sẵn hoặc thêm mới</div>
                            <br>
                            <div  class="form-group col-lg-9">
                                 <select id="listchude" style="float: left; width:60%; " class="form-control" name="category" >
                                    <option value="0">Chọn chủ đề</option>
                                     <?php if (isset($chude)){
                                        foreach ($chude as $value) 
                                     {
                                     ?>
                                     <option value="<?php echo $value->macd ?>"><?php echo $value->tencd ?></option>
                                         
                                     <?php }} ?>
                                 </select>
                                 <div>
                                  <button id="" class=" btn btn-outline btn-success myBtn"
                                style="width:30%;margin-left: 10px;" >Thêm chủ đề</button>
                                <div  class="modal">
                                    <div class="modal-content">
                                         <span class="close">&times;</span>
                                         <br>
                                         <br>
                                        <!-- <form method="post" id="themcdform">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                             <div>
                                             <input style="width: 100%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Nhập tên chủ đề" name="tencd" id="tenchude">
                                             </div>
                                             <button style="width: 100%;" type="button" class="btn btn-primary btn-block btn-large" id="btnthemcd">Thêm</button>
                                             <!-- </form> -->
                                    </div>
            
                                </div>
                            </div>
                        </div>
                        <div  class="form-group col-lg-9">
                        <input style="width: 60%; height: 50px; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Mô tả" name="mota" id="txtmota">
                        <input style="width: 60%; margin-left: 0px; margin-bottom: 20px" class="form-control" placeholder="Link ảnh" name="urlanh" id="urlanh">

                        </div>

                            <!-- xác nhận -->

                            <div class="form-group col-lg-4">

                                <button  class=" btn btn-outline btn-success"
                                style="width: 100%" id="btn_submit" >Xác nhận</button>

                            </div>
                        </div>

                     
                    <!-- </form> -->

                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <h4 style="color: #4b9249; padding-left: 30px;">Xóa sản phẩm</h4>
                    <!-- <form action="Changeproduct.php" method="POST" > -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel-body">
                            <div class="form-group col-lg-4">
                                <input id ="masp_del" class="form-control" placeholder="Mã sản phẩm">
                            </div>

                            <div class="form-group col-lg-4">

                                <input type="submit" class=" btn btn-outline btn-success"
                                style="width: 100%" id="btn_submitDel" value="Xác nhận"  >

                            </div>

                        </div>
                    <!-- </form> -->
                </div>
            
                <!-- /.panel-heading -->

                <input type="text" id="myInput"  placeholder="Tìm kiếm..." title="Type in a name" style="float: right; margin-top: 20px; margin-bottom: 10px; width: 400px; ">
                <div style="margin-top: 20px" class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>Mã loại sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Thuộc loại</th>
                                <th>Thuộc chủ đề</th>
                               
                            </tr>
                        </thead>
                        <tbody class="content">
                            <?php
                            foreach ($loaisanpham as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->maloai ?></td>
                                    <td><?php echo $row->tenloai?></td>
                                    <td><?php echo $row->gia-$row->gia*($row->discount/100)?></td>
                                    <td><img style="width: 30px; height:30px" src="{{ url('/') }}/image/sanpham/<?php echo $row->url?>" ></td>
                                    <td><?php echo $row->tensp ?></td>
                                    <td><?php echo $row->tencd ?></td>
                                    

                                </tr>
                                <?php
                            }
                            ?>
                            


                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                {{$loaisanpham->links()}}
                    
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@stop
@section('js')
@parent
<script type="text/javascript">
                $(document).ready(function(){
                    

                // When the user clicks the button, open the modal 
                $(".myBtn").click( function() {
                    
                    $(this).parent().find('.modal').addClass("active");

                });

                // When the user clicks on <span> (x), close the modal
                
                $(".close").click( function() {
                    $(this).parent().parent().removeClass("active");
                }); 
                
                $(document).click(function (e) {
                    if ($(e.target).is('.modal')) {
                    $(".modal").removeClass("active");
                }
                });

             });
                
</script>
 <script type="text/javascript" src="{!! url('/js/Admin/quanlysanpham.js') !!}"></script>
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".content tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</script>
@stop