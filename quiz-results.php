<?php require_once 'templates/header.php';?>
<link rel="stylesheet" href="css/jquery-ui-custom.css"/>
<link rel="stylesheet" href="css/ui.jqgrid.css"/>
<style>
.ui-widget{font-family:Arial; color:#fff;}
.ui-jqgrid .ui-jqgrid-hdiv {height:25px;}
.ui-jqgrid .ui-jqgrid-pager {height:40px;}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
  background: #fff !important;font-weight: bold;color:#000;font-size:13px;;}
.ui-widget-content{border: 1px solid #ddd !important;}
.ui-jqgrid tr.jqgrow td{height: 33px !important;}
.ui-jqgrid .ui-jqgrid-htable th div, .ui-jqgrid .ui-jqgrid-htable th,.ui-jqgrid-hdiv{height: 33px !important;}
.ui-jqgrid .ui-jqgrid-resize-ltr{margin: 0px !important;}
#pager2{height: 36px !important;}
input.ui-pg-input {
    font-size: 0.8em;
    height: 33.5px !important;
    margin: 0;
    min-width:50px;
    width:80px !important;
}
.ui-th-column{padding-top:10px !important; }
</style>
<div class="content">
	<div class="container">
		<?php require_once 'templates/ads.php';?>
    	<div class="row">
    		<h1 class="text_underline">Quiz Results: </h1>
			<br/>
    		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
	     		<table id="list2"></table> 
				<div id="pager2" ></div>
			</div>
			<?php //require_once 'templates/sidebar.php';?>	
     	</div>
    </div>
</div>
<script src="js/jquery-ui-custom.min.js"></script>
<script src='js/grid.locale-en.js'></script>
<script src='js/jquery.jqGrid.min.js'></script>
<script>
	   jQuery("#list2").jqGrid({ 
	   url:'server.php', 
	   datatype: "json",
	   colNames:['Quiz No','Category Name', 'Right Answer', 'Wrong Answer','Unanswered'], 
	   colModel:[ {name:'id',index:'id', align:"center"}, 
	   {name:'category_name',index:'category_name', align:"center"}, 
	   {name:'right_answer',index:'right_answer', align:"center"},
	   {name:'wrong_answer',index:'wrong_answer', align:"center"},
       {name:'unanswered',index:'unanswered', align:"center"}	   
	   ],
	   rowNum:10, 
	   rowList:[10,20,30], 
	   pager: '#pager2', 
	   sortname: 'id', 
	   recordpos: 'left', 
	   viewrecords: true, 
	   sortorder: "asc", 
	   height: '100%'
	   });
	   
	   
	</script>
	
<?php require_once 'templates/footer.php';?>	