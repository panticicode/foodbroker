@component('mail::message')
Poštovani , {{-- use double space for line break --}}
Za Vas je stigla porudžbenica broj 8.
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
thead th, thead td{
	color: #fff;
    background-color: #1a1b14;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h2>Porudžbenica</h2>
<table>
	<thead>
	  	<tr>
	    	<th>#</th>
	    	<td>287</td>
	  	</tr>
	</thead>
	<tbody>  	
	  	<tr>
	    	<th>Ime i Prezime</th>
	    	<td>{{ $data['name'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Kompanija</th>
	    	<td>{{ $data['content']['company'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Region</th>
	    	<td>{{ $data['content']['country_id'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Adresa</th>
	    	<td>{{ $data['content']['address'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Stan</th>
	    	<td>{{ $data['content']['apartment'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Datum isporuke</th>
	    	<td>{{ $data['content']['delivery_date'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Termin isporuke</th>
	    	<td>{{ $data['content']['delivery_time'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Grad</th>
	    	<td>{{ $data['content']['city'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Postanski broj</th>
	    	<td>{{ $data['content']['postal_code'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Telefon</th>
	    	<td>{{ $data['content']['phone'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Email</th>
	    	<td>{{ $data['content']['email'] }}</td>
	  	</tr>
	  	<tr>
	    	<th>Dodatna pitanja</th>
	    	<td>{{ $data['content']['content'] }}</td>
	  	</tr>
	</tbody> 
</table>
</body>
</html>
S'Postovanjem
FoodBroker Team
@endcomponent

