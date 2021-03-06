@extends('_layout')
@section('title') 
Sản phẩm
@stop
@section('link')
@parent
<link rel="stylesheet" href="{{ url('/') }}./css/Sanpham/sanpham.css">
@stop
@section('content')
	<br>
	<br>
	<br>

	<div id="menu-phu" class="navbar-collapse collapse show">
		<nav id="nav" class="navbar-nav nav-dropdown">
			<ul id="nav-chude">
        
				<?php
					 $chude =  DB::SELECT("SELECT * FROM chude WHERE isDeleted = 0");
						//chạy từng chủ đề để in sản phẩm
					foreach ($chude as $value) {
				?>
					<li class="menuphu"><a class="nav-link pkhach" href="#"><?php echo $value->tencd ?></a>
			 		<?php
       
       					 $sqlQuery="SELECT DISTINCT mausanpham.* FROM chude_loaisanpham join loaisanpham on chude_loaisanpham.maloai = loaisanpham.maloai join sanpham on sanpham.masp= loaisanpham.masp join mausanpham on mausanpham.mamau = sanpham.mamau WHERE chude_loaisanpham.macd =$value->macd AND mausanpham.isDeleted = 0";
        				$mausanpham = DB::SELECT($sqlQuery);
        				if ($mausanpham) {
                  ?>
                  <nav id="menu-phu-cap1" class="nav-phong">
                    <?php
        				//output results from database
         				 foreach($mausanpham as $row)
         				 {
            				?> 
            			
							<li class="menuc1"><a class="nav-link" href="#"><?php echo $row->tenmau ?></a>
							<nav id="menu-phu-cap2" class="nav">
							<?php
						 
        					$sqlQuery='SELECT DISTINCT sanpham.* FROM mausanpham join sanpham on mausanpham.mamau = sanpham.mamau join loaisanpham on loaisanpham.masp = sanpham.masp join chude_loaisanpham on chude_loaisanpham.maloai = loaisanpham.maloai
							WHERE mausanpham.mamau='.$row->mamau.' AND chude_loaisanpham.macd = '.$value->macd.' and sanpham.isDeleted = 0';
        					$sanpham = DB::SELECT($sqlQuery);
        					if ($sanpham) {
        						foreach($sanpham as $row1)
                    {
        							?>
                      <li><a id = "getsanpham" class="nav-link" data-masp = "<?php echo $row1->masp ?>" data-macd="<?php echo $value->macd ?>" href = "{{ url('/') }}/sanpham/getloaisp/<?php echo $value->macd ?>/<?php echo $row1->masp ?>"> <?php echo $row1->tensp ?> </a>
                      </li>

                        <?php
                    }
        						
          					}
          					?>
          				</nav>
          			</li>
                
          		
              <?php
        }
        ?>
       </nav> 
    </li>
    <?php
	}
}
?>
        
			</ul>
		</nav>
	</div>
	
@section('sub_content')
@show
@stop
@section('js')
@parent
@stop
	