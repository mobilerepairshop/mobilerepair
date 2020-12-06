<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Essential Studio for JavaScript : Filtering Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
  <link href="17.1.0.38/external/bootstrap.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/17.1.0.38/js/web/flat-azure/ej.web.all.min.css" rel="stylesheet" />
    <link href="17.1.0.38/themes/web/content/default.css" rel="stylesheet" />
    <link href="17.1.0.38/themes/web/content/default-responsive.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/17.1.0.38/js/web/responsive-css/ej.responsive.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="//cdn.syncfusion.com/js/assets/external/jquery-1.10.2.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="//cdn.syncfusion.com/js/assets/external/jquery-2.1.4.min.js"></script>
    <!--<![endif]-->
    <script src="//cdn.syncfusion.com/js/assets/external/jquery.easing.1.3.min.js"></script>
    <script src="17.1.0.38/scripts/web/jsondata.min.js"></script>
    <script src="//cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
    <script type="text/javascript" src="//cdn.syncfusion.com/17.1.0.38/js/web/ej.web.all.min.js"></script>
    <script src="17.1.0.38/scripts/web/properties.js" type="text/javascript"></script>
  
</head>
<body>
  
  <button id="btn" onclick="Filter()">
    Click here to filter
  </button>
  
   <button id="btn1" onclick="Clear()">
    Click here to Clear Filter
  </button>
  
                <div id="Grid"></div>
    <script type="text/javascript">
        $(function () {
           var Data = [
         { OrderID: 10248, CustomerID: 'VINET', EmployeeID: 1, Employee:{Address:'507 - 20th Ave. E.Apt. 2A'},Freight: 33.38,ShipName:'Alfreds Futterkiste',ShipCountry:'HTN'},
	     { OrderID: 10249, CustomerID: 'TOMSP', EmployeeID: 2, Employee:{Address:'722 Moss Bay Blvd.'},Freight: 11.61,ShipName:'Ana Trujillo Emparedados y helados',ShipCountry:'Hypertension'},
	     { OrderID: 10250, CustomerID: 'HANAR', EmployeeID: 3, Employee:{Address:'908 W. Capital Way'},Freight: 65.83,ShipName:'Antonio Moreno Taquería',ShipCountry:'HTN'},
	     { OrderID: 10255, CustomerID: 'ANTON', EmployeeID: 3, Employee:{Address:'7 Houndstooth Rd.'},Freight: 18.33,ShipName:'Hanari Carnes',ShipCountry:'Hypertension'},
	     { OrderID: 10252, CustomerID: 'SUPRD', EmployeeID: 6, Employee:{Address:'4110 Old Redmond Rd.'},Freight: 58.17,ShipName:'Berglunds snabbköp',ShipCountry:'Austria'},
	     { OrderID: 10253, CustomerID: 'WELLI', EmployeeID: 9, Employee:{Address:'Coventry HouseMiner Rd.'},Freight: 58.17,ShipName:'Vins et alcools Chevalier',ShipCountry:'Mexico'},
	     { OrderID: 10254, CustomerID: 'HILLA', EmployeeID: 4, Employee:{Address:'722 Moss Bay Blvd.'},Freight: 148.33,ShipName:'Toms Spezialitäten',ShipCountry:'Belgium'},
	     { OrderID: 10255, CustomerID: 'ANTON', EmployeeID: 3, Employee:{Address:'908 W. Capital Way'},Freight: 18.33,ShipName:'Hanari Carnes',ShipCountry:'Britain'},
	     { OrderID: 10256, CustomerID: 'AROUT', EmployeeID: 2, Employee:{Address:'4726 - 11th Ave. N.E.'},Freight: 13.33,ShipName:'Hanari Carnes',ShipCountry:'HTN'},
	     { OrderID: 10257, CustomerID: 'CENTC', EmployeeID: 1, Employee:{Address:'7 Houndstooth Rd.'},Freight: 14.33,ShipName:'Chop-suey Chinese',ShipCountry:'Denmark'},
		 { OrderID: 10258, CustomerID: 'ANTON', EmployeeID: 3, Employee:{Address:'507 - 20th Ave. E.Apt. 2A'},Freight: 18.33,ShipName:'Hanari Carnes',ShipCountry:'Hypertension'},
		 { OrderID: 10259, CustomerID: 'ANDREW', EmployeeID: 7, Employee: { Address: '14 Garrett Hill' }, Freight: 10.33, ShipName: 'Hanari Carnes', ShipCountry: 'Britain' },
         { OrderID: 10260, CustomerID: "OTTIK", EmployeeID: 4,Employee: { Address: 'Coventry HouseMiner Rd.' }, ShipName: "Ottilies Käseladen", ShipCountry: "Hypertension", Freight: 55.0900 },
         { OrderID: 10261, CustomerID: "QUEDE", EmployeeID: 4,Employee: { Address: '4110 Old Redmond Rd.' }, ShipName: "Que Delícia", ShipCountry: "France", Freight: 3.0500 }
		 
       ];
            $("#Grid").ejGrid({
                // the datasource "window.gridData" is referred from jsondata.min.js
                dataSource: Data,
                allowPaging: true,
                allowFiltering: true,
                enableHeaderHover: true,
                filterSettings: { filterType: "excel" },
                columns: [
                         { field: "OrderID", isPrimaryKey: true, headerText: "Order ID", textAlign: ej.TextAlign.Right, width: 75 },
                         { field: "CustomerID", headerText: "Customer ID", width: 120 },
                         { field: "EmployeeID", headerText: "Employee ID", textAlign: ej.TextAlign.Right, width: 130 },
                         { field: "Freight", headerText: "Freight", textAlign: ej.TextAlign.Right, format: "{0:C2}", width: 80 },
                         { field: "ShipName", headerText: "Ship City", width: 150 },
                         { field: "ShipCountry", headerText: "Verified", width: 90 }
                ]
            });
          });        
      
      function Filter(){
                var gridObj = $("#Grid").ejGrid("instance");
                    gridObj.filterColumn([
                        { field: "CustomerID", operator: "contains", value: 'o', predicate: "and", matchcase: false },
                        { field: "CustomerID", operator: "contains", value: 'u', predicate: "and", matchcase: false },
                    ])
      }
      function Clear(){
                var gridObj = $("#Grid").ejGrid("instance");
                    gridObj.clearFiltering();
      }
    </script>
</body>
</html>
