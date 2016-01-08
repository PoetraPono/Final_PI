<div id="result"></div>
<script type="text/javascript">
	var allow = true;
	$(document).ready(function(){
		$("#q").keyup(function(e){
			if(e.which == '13'){
				e.preventDefault();
					
				loadData();
			}else if($(this).val().length >= 0){
					
				loadData();
			}
		});
	});
	function loadData(){
	var query=document.getElementById('q').value;
		if(allow){
			allow = false;
			$("#result").html('loading...');
			$.ajax({
				url:'cari.php?q='+query,
				success:
					function (data){
					$("#tampil").html(data);
					allow = true;
				}
			});
		}
	}
</script>

<style>
.highlight
{
background: #CEDAEB;
}

.highlight_important
{
background: #9afa95;
}
</style>

<?php 
//Fungsi Mark Teks
function hightlight($str, $keywords = '')
{
$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

$style = 'highlight';
$style_i = 'highlight_important';

/* Apply Style */

$var = '';

foreach(explode(' ', $keywords) as $keyword)
{
$replacement = "<span class='".$style."'>".$keyword."</span>";
$var .= $replacement." ";

$str = str_ireplace($keyword, $replacement, $str);
}
$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
return $str;
}

//END Fungsi Mark Teks
if(isset($_GET['q']) && $_GET['q']){ 
 $conn = mysql_connect("localhost", "root", ""); 
 mysql_select_db("wartawan"); 
 $q = $_GET['q'];
 
//Menghitung Jumlah Yang Tampil 

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 6;
$mulai_dari = $limit * ($page - 1);
$sqlCount = "select count(id_wartawan) from wartawan where nama_wartawan like '%$q%' or alamat like '%$q%' ";
$rsCount = mysql_fetch_array(mysql_query($sqlCount));
$banyakData = $rsCount[0];
$sql = "select * from wartawan where nama_wartawan like '%$q%' or alamat like '%$q%'  order by id_wartawan DESC limit $mulai_dari, $limit"; 
