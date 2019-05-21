var urlcontroller = "mod/controller/con_user.php";
var urlDataTable  = "mod/table/conf/db_users.php";

$(document).ready(function(){
	var method = "";
	validForm();
	loadPage();
	loadTable();
	
	$("#boSubmit").click( function (){ method = "insert"; sendInfo(method); });
	$("#boUpdate").click( function (){ method = "update"; sendInfo(method); });
	$("#boClean").click( function (){ cleanForm(); validForm(); });
	$("#boPlus").click( function (){  $("#boPlus").hide(0); $("#boMinus").show(0); $("#form").slideDown(1000); });
	$("#boMinus").click( function (){ $("#boPlus").show(0); $("#boMinus").hide(0); $("#form").slideUp(1000); });
	
	$("#table").on('rowSelect', function (event) {
		var args = event.args;
		var index = args.index;
		var rowData = args.row;
		var rowKey = args.key;
		selectRow(rowKey);
	});
	
});

function validForm(){
	var rowno = $("#inRowno").val().split(" ");
	$("#boSubmit, #boUpdate").hide(0);
	
	if( rowno == "" ){
		$("#boSubmit").show(0);
	} else {
		$("#boUpdate").show(0);
	}
}

function loadPage(){
	$("#iconLoad, #boMinus").hide(0);
	$(".inputTxt, #inRowno").val("");
	$(".form-group").removeClass("has-error");
	$("#msgData, #msgTable, #form").slideUp(0);
	$(".inputSelect").val($(".inputSelect option:first").val());
}

function cleanForm(){
	$("#iconLoad").hide(0);
	$(".inputTxt, #inRowno").val("");
	$(".form-group").removeClass("has-error");
	$("#msgData, #msgTable").slideUp(0);
	$(".inputSelect").val($(".inputSelect option:first").val());
}

function sendInfo(method){
	var rowno		= "";
	var inName		= $("#inName").val();
	var inLastname	= $("#inLastname").val();
	var inUserid	= $("#inUserid").val();
	var inPassword	= $("#inPassword").val();
	var inAdress	= $("#inAdress").val();
	var inPhone		= $("#inPhone").val();
	var inEmail		= $("#inEmail").val();
	var inStatus	= $("#inStatus option:selected").val();
	
	var errorNo		= "0"; 
	var message		= "";
	
	$(".form-group").removeClass("has-error");
	$("#iconLoad").fadeIn(300);
	
	switch(method){
		case "update":
			rowno	= $("#inRowno").val();
		break;
		case "insert":
			rowno	= "";
		break;
		default:
			$("#msgData").slideDown(1000).addClass("callout-danger").html("Error(err001): there is not a method.").delay(5000).slideUp(1000);
		break;
	}
	
	setTimeout( function(){
		if( inName == "" )		{ errorNo = "1"; $(".inName").addClass("has-error"); }
		if( inLastname == "" )	{ errorNo = "1"; $(".inLastname").addClass("has-error"); }
		if( inPhone == "" )		{ errorNo = "1"; $(".inPhone").addClass("has-error"); }
		if( inUserid == "" )	{ errorNo = "1"; $(".inUserid").addClass("has-error"); }
		if( inPassword == "" )	{ errorNo = "1"; $(".inPassword").addClass("has-error"); }
		
		switch(errorNo){
			case "0":
				$.ajax({
					url: 	urlcontroller,
					type: 	"POST",
					data: 	"method="+method+
							"&rowno="+rowno+
							"&inName="+inName+
							"&inLastname="+inLastname+
							"&inUserid="+inUserid+
							"&inPassword="+inPassword+
							"&inAdress="+inAdress+
							"&inPhone="+inPhone+
							"&inEmail="+inEmail+
							"&inStatus="+inStatus,
					success:function(request) {
						//alert(request);
						if ( request == "OK" )
						{
							$("#iconLoad").fadeOut(300);
							$("#msgData").slideDown(1000).addClass("callout-info").html("Saved successfully").delay(5000).slideUp(1000);
							loadTable();
						} 
						else 
						{ 
							$("#iconLoad").fadeOut(300);
							$("#msgData").slideDown(1000).addClass("callout-danger").html("Error(error002): the information was not saved.").delay(5000).slideUp(1000);
						}
					},
					error:function() { 
						$("#iconLoad").fadeOut(300);
						$("#msgData").slideDown(1000).addClass("callout-danger").html("Error(error003): incorrect information.").delay(5000).slideUp(1000);
					}	
				});
			break;
			case "1":
				$("#iconLoad").fadeOut(300);
				$("#msgData").slideDown(1000).addClass("callout-danger").html("Missing: required fields.").delay(5000).slideUp(1000);
			break;
			default:
				$("#iconLoad").fadeOut(300);
				$("#msgData").slideDown(1000).addClass("callout-danger").html("Error(err004): there is not a process.").delay(5000).slideUp(1000);
			break;
		}
		
	}, 1000 );
}

function loadTable(){
	var source = {
		root: 'Rows',
		id: 'rowno',
		datatype: "json",
		url: urlDataTable,
		cache: false,
		async: false,
		datafields: [
			{ name: 'rowno'},
			{ name: 'name'},
			{ name: 'lastname'},
			{ name: 'email'},
			{ name: 'phone'},
			{ name: 'adress'},
			{ name: 'userid'},
			{ name: 'password'},
			{ name: 'effective'},
			{ name: 'status'}
		],
	};
	var dataAdapter = new $.jqx.dataAdapter(source, {
		autoBind: true,
		beforeLoadComplete: function (records) {
			// add "EmployeeName" data field.
			for (var i = 0; i < records.length; i++) {
				records[i]["EmployeeName"] = records[i].CompanyName + " " + records[i].ContactTitle;
			}
			return records;
		},
		loadComplete: function () {
			// data is loaded.
		}
	});
	$("#table").jqxDataTable({
		width: '100%',
		source: dataAdapter,
		altRows: true,
		sortable: true,
		pageable: true,
		pagerButtonsCount: 5,
		pagerPosition: 'bottom',
		pagerMode: 'advanced',                
		filterable: true,                
		filtermode: 'simple', 				
		exportSettings: { fileName: null },
		ready: function () {},
		toolbarHeight: 35,
		renderToolbar: function(toolBar){},	
		columns: [
			/********************************************************************************************************
			[PARAMETROS]
				columngroup: 'ProductDetails' 	=> Creación de grupos dentro de los registros
				pinned: true 					=> Para hacer un paginado en la hoja
			********************************************************************************************************/
			{ text: 'rowno', 		dataField: 'rowno',			cellsAlign: 'center', align: 'center', width:  50 },
			{ text: 'Name', 		dataField: 'name',			cellsAlign: 'center', align: 'center', width: 250 },
			{ text: 'Lastname', 	dataField: 'lastname', 		cellsAlign: 'center', align: 'center', width: 250 },
			{ text: 'Email', 		dataField: 'email',			cellsAlign: 'center', align: 'center', width: 350 },
			{ text: 'Phone',		dataField: 'phone',			cellsAlign: 'center', align: 'center', width: 200 },
			{ text: 'Adress',		dataField: 'adress',		cellsAlign: 'center', align: 'center', width: 450 },
			{ text: 'Userid', 		dataField: 'userid',		cellsAlign: 'center', align: 'center', width: 150 },
			{ text: 'Password', 	dataField: 'password',		cellsAlign: 'center', align: 'center', width: 150 },
			{ text: 'Date', 		dataField: 'effective',		cellsAlign: 'center', align: 'center', width: 150 },
			{ text: 'Status', 		dataField: 'status',		cellsAlign: 'center', align: 'center', width: 150 }
		]
	});
}

function selectRow(rowKey){
	var rowKey  = rowKey;
	var method 	= "consult";
	
	$("#iconLoad").fadeIn(300);
	
	setTimeout(function(){
		if( rowKey != "" )
		{
			$.ajax({
				url: 	urlcontroller,
				type: 	"POST",
				data: 	"method="+method+
						"&rowno="+rowKey,
				success:function(request) {	
					//alert(request);
					var arrayResp = request.split('|');	
					if ( arrayResp[0] == "OK" )
					{
						$("#inRowno").val(arrayResp[1]);
						$("#inName").val(arrayResp[2]);
						$("#inLastname").val(arrayResp[3]);
						$("#inEmail").val(arrayResp[4]);
						$("#inPhone").val(arrayResp[5]);
						$("#inAdress").val(arrayResp[6]);
						$("#inUserid").val(arrayResp[7]);
						$("#inPassword").val(arrayResp[8]);
						$("#inStatus").val(arrayResp[9]);
						
						$("#iconLoad").fadeOut(300);
						
						showForm();
						validForm();
					} 
					else 
					{ 
						$("#iconLoad").fadeOut(300);
						$("#table").slideDown(1000).addClass("callout-danger").html("Error(ta002): consult the reg("+rowKey+").").delay(5000).slideUp(1000);
					}
				},
				error:function() { 
					$("#iconLoad").fadeOut(300);
					$("#table").slideDown(1000).addClass("callout-danger").html("Error(ta003): consult the database.").delay(5000).slideUp(1000);
				}	
			});
		}
		else
		{
			$("#iconLoad").fadeOut(300);
			$("#table").slideDown(1000).addClass("callout-danger").html("Error(ta004): reg_empty, consult the database.").delay(5000).slideUp(1000);
		}
	}, 1000);
}

function showForm(){
	$("#boPlus").hide(0); $("#boMinus").show(0); $("#form").slideDown(1000);
}

/******************************************************************
0=Without_error
1=Required_fields 
*******************************************************************/