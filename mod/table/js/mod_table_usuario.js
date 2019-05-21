$(document).ready(function () {
            
	var source =
	{
		root: 'Rows',
		id: 'rowno',
		datatype: "json",
		url: 'module/table/conf/cldb_user.php',
		cache: false,
		async: false,
		datafields: [
			{ name: 'rowno'},
			{ name: 'nombre'},
			{ name: 'email'},
			{ name: 'tel'},
			{ name: 'userid'},
			{ name: 'tipo'}
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
	/*******************************************
	CREACIÓN DE TABLA
	********************************************/
	$("#table").jqxDataTable(
	{
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
			{ text: 'rowno', 			dataField: 'rowno',		cellsAlign: 'center', align: 'center', width:  50 },
			{ text: 'Nombre Usuario', 	dataField: 'nombre',	cellsAlign: 'center', align: 'center', width: 300 },
			{ text: 'Correo', 			dataField: 'email',		cellsAlign: 'center', align: 'center', width: 350 },
			{ text: 'Telefono', 		dataField: 'tel',		cellsAlign: 'center', align: 'center', width: 150 },
			{ text: 'ID Usuario', 		dataField: 'userid', 	cellsAlign: 'center', align: 'center', width: 150 },
			{ text: 'Tipo', 			dataField: 'tipo', 		cellsAlign: 'center', align: 'center', width: 150 }
		]
	});
	
	$("#table").on('rowSelect', function (event) {
		var args = event.args;
		var index = args.index;
		var rowData = args.row;
		var rowKey = args.key;
		//alert(rowKey);
		
		$('#eventWindow').jqxWindow('open');
	});
	
	$("#print").click(function () {
		var gridContent = $("#table").jqxDataTable('exportData', 'html');
		var newWindow = window.open('', '', 'width=800, height=500'),
		document = newWindow.document.open(),
		pageContent =
			'<!DOCTYPE html>' +
			'<html>' +
			'<head>' +
			'<meta charset="utf-8" />' +
			'<title>jQWidgets DataTable</title>' +
			'</head>' +
			'<body>' + gridContent + '</body></html>';
		document.write(pageContent);
		document.close();
		newWindow.print();
	});
	
	/**********************************************************
	MODALES - VENTANAS EMERGENTES
	***********************************************************/
	addEventListeners();
	createElements();
	
	function addEventListeners() {
		//Closed event => $('#eventWindow').on('close', function (event) { });
		//Dragstarted event => $('#eventWindow').on('moved', function (event) { });
		//Open event = >$('#eventWindow').on('open', function (event) { });
		//$('#showWindowButton').mousedown(function () { $('#eventWindow').jqxWindow('open'); });
	}
	function createElements() {
		$('#eventWindow').jqxWindow({
			maxHeight: 150, maxWidth: 280, minHeight: 30, minWidth: 250, height: 145, width: 270,
			resizable: false, isModal: true, modalOpacity: 0.3, autoOpen: false,
			okButton: $('#ok'), cancelButton: $('#cancel'),
			initContent: function () {
				$('#ok').jqxButton({ width: '65px' });
				$('#cancel').jqxButton({ width: '65px' });
				$('#ok').focus();
			}
		});				
	}
	
	$('#ok').click(function () {
		alert("Listo final");
	});
	
});