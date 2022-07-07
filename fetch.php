<?php

//fetch.php

$api_url = "http://localhost/crud-app-using-api/api/test_api.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);
//print_r($result);die;
$output = '';


	if($result!='')
	{
		foreach($result as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->name.'</td>
				<td>'.$row->email.'</td>
				<td>'.$row->mobile.'</td>
				<td><button type="button" name="edit" class="btn btn-primary btn-xs edit" id="'.$row->id.'">Edit</button></td>
				<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
			</tr>
			';
		}
	}
	else
	{
		$output .= '
		<tr>
			<td colspan="5" align="center">No Record Found!</td>
		</tr>
		';
	}	



echo $output;

?>