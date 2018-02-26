@extends('client::layouts.email')

@section('content')
	<table rules="all" cellpadding="10" style="border: none; text-align: left;">
		<tr style="background: #efefef; border: 1px solid #bbb;">
			<td style=""><strong>Name:</strong> </td>
			<td>{{ $input['name'] }}</td>
		</tr>
		<tr style="border: 1px solid #bbb;">
			<td style="text-align: left;"><strong>Email:</strong> </td>
			<td style="text-align: left;">{{ strip_tags($input['email']) }}</td>
		</tr>
		<tr style="background: #efefef; border: 1px solid #bbb;">
			<td style="text-align: left;"><strong>Question:</strong> </td>
			<td style="text-align: left;">{{ (!empty($input['question'])) ? $input['question'] : '' }}</td>
		</tr>
	</table>
@stop
