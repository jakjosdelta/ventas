

<!DOCTYPE HTML>

<html>
<head>

<!-- HTML TABLE EXPORT -->


<!-- 
Forma 2 -->

<!--  jquery Plugin -->

<script type="text/javascript" src="table_export/tableExport.js" > </script>
<script type="text/javascript" src="table_export/jquery.base64.js"> </script>

<!--   PNG EXPORT -->

<script type="text/javascript" src="table_export/html2canvas.js">  </script>


  <!--  PDF Export -->

<script type="text/javascript" src="table_export/jspdf/libs/sprintf.js"> </script>
<script type="text/javascript" src="table_export/jspdf/jspdf.js"> </script>
<script type="text/javascript" src="table_export/jspdf/libs/base64.js"> </script>







<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="DataTables-1.10.7/media/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="DataTables-1.10.7/media/js/jquery.dataTables.js"></script>




   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>

 <!-- bootstrap 3.0.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="bootstrap/css/AdminLTE.css" rel="stylesheet" type="text/css" />


       


<!-- Data Tables link -->

<!--  DataTables CSS  -->
<link rel="stylesheet" type="text/css" href="/DataTables-1.10.7/media/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/DataTables-1.10.7/media/js/jquery.dataTables.js"></script>


<title> PRUEBAS</title>
</head>
<body>

<table id="customers" class="table table-striped" >
  <thead>     
    <tr class='warning'>
      <th>Country</th>
      <th>Population</th>
      <th>Date</th>
      <th>%ge</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Chinna</td>
      <td>1,363,480,000</td>
      <td>March 24, 2014</td>
      <td>19.1</td>
    </tr>
    <tr>
      <td>India</td>
      <td>1,241,900,000</td>
      <td>March 24, 2014</td>
      <td>17.4</td>
    </tr>
    <tr>
      <td>United States</td>
      <td>317,746,000</td>
      <td>March 24, 2014</td>
      <td>4.44</td>
    </tr>
    <tr>
      <td>Indonesia</td>
      <td>249,866,000</td>
      <td>July 1, 2013</td>
      <td>3.49</td>
    </tr>
    <tr>
      <td>Brazil</td>
      <td>201,032,714</td>
      <td>July 1, 2013</td>
      <td>2.81</td>
    </tr>
  </tbody>
</table> 



<div class="btn-group">
              <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Exportar la Tabla</button>
              <ul class="dropdown-menu " role="menu">
                <!-- <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'false'});"> <img src="table_export/icons/json.png" width="24px"> JSON</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src="table_export/icons/json.png" width="24px"> JSON (ignoreColumn)</a></li>
                <li><a href="#" onclick="$('#contenido').tableExport({type:'json',escape:'true'});"> <img src="table_export/icons/json.png" width="24px"> JSON (with Escape)</a></li>
                <li class="divider"></li> -->
                <li><a href="#" onclick="$('#customers').tableExport({type:'xml',escape:'false'});"> <img src="table_export/icons/xml.png" width="24px"> XML</a></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'sql'});"> <img src="table_export/icons/sql.png" width="24px"> SQL</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'csv',escape:'false'});"> <img src="table_export/icons/csv.png" width="24px"> CSV</a></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'txt',escape:'false'});"> <img src="table_export/icons/txt.png" width="24px"> TXT</a></li>
                <li class="divider"></li>       
                
                <li><a href="#" onclick="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src="table_export/icons/xls.png" width="24px"> XLS</a></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'doc',escape:'false'});"> <img src="table_export/icons/word.png" width="24px"> Word</a></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'powerpoint',escape:'false'});"> <img src="table_export/icons/ppt.png" width="24px"> PowerPoint</a></li>
                <li class="divider"></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'png',escape:'false'});"> <img src="table_export/icons/png.png" width="24px"> PNG</a></li>
                <li><a href="#" onclick="$('#customers').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="table_export/icons/pdf.png" width="24px"> PDF</a></li>
                
                
              </ul>
  </div>  

  <script type="text/javaScript"> 
    $(document).ready(function(){   
    });
  </script>
</body>

</html>
