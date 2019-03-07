<?php

$people = array(
   array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
   array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
   array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
   array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
   array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
	"http://www.w3.org/TR/html4/strict.dtd">

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Test</title>
 
  
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
 

</head>

<body>
	<div id="table"></div>
 
</body>
<script type="text/javascript">
	
	// convert pph array to javascript array
	var users = <?php echo json_encode($people); ?>;

	// bind the button click function
	$("#table").on("click",".show",function(){

		
		var tr = $(this).closest('tr');
		var name = tr.children().eq(1).html() + " " + tr.children().eq(2).html();
		var email = tr.children().eq(3).html();

		alert(name +" "+ email);
	});
	

	function makeTable(container, data) {

    var table = $("<table/>");

    var header_title = ["id","Fist name","Last name","Email"];

    var header = $("<tr/>");

    for (var i = 0; i < header_title.length;i++){

    	header.append($("<th>"+header_title[i]+"</th>"));
    }
    table.append(header);

    $.each(data, function(rowIndex, r) {
        var row = $("<tr/>");
        $.each(r, function(colIndex, c) { 
            row.append($("<td/>").text(c));
        });

        var button  = $("<button>Show</button>");
        button.addClass('show');
        row.append($("<td>").append(button));
        table.append(row);
    });
    return $('#'+container).append(table);
	}

	
    var usersTable = makeTable('table', users);


</script>
</html>