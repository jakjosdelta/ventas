<!DOCTYPE html>
<?php

      if(isset($_POST['excel']) && $_POST['excel'])
      {
          # Download  Excel (.xls) File...

          header('Content-Type: application/force-download');

          header('Content-disposition: attachment; filename=ExportHtmlToExcel.xls');

          header("Pragma: ");

          header("Cache-Control: ");

          echo $_POST['excel'];

          exit();
      }
  ?>

  <html>
      <head>
          <script>
              function getHtmlData()
              {
                  $("#excel").val('<table border="1">'+$("#info").clone().html()+'</table>');
                  return true;
              }
          </script>
      </head>

      <title>Export HTML to Excel in PHP</title>

      <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'></script>

      </head>
  
      <body>
        
          <form method="post" onSubmit="javascript:return getHtmlData()">

              <table border="1" id="info">

                  <tr>

                      <th>First Name : </th>

                      <th>Last Name : </th>

                  </tr>

                  <tr>

                      <td>Test First Name</td>

                      <td>Test Last Name</td>

                  </tr>

              </table>

              <input type="hidden" id="excel" name="excel" value="">  

              <br><br>

              <input type="submit" value="Export HTML to Excel"> 

          </form>

      </body>

  </html>