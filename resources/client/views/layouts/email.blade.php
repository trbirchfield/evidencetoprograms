<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title></title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
		<meta name="author" content="White Lion Internet Agency" />
		<link rel="author" href="http://wlion.com" />
	</head>
	<body style="background-color:#ffffff;font-family:Arial, Helvetica, sans-serif;color:#4c4c4c;">
		<div>
			<center>
				<table width="580" cellpadding="10" cellspacing="0" style="margin:0 auto;">
					<tr>
						<td>
							<div style="display: block; border-bottom:5px solid #BDBDBD; padding: 15px 0;">
								<a href="#" title="" style="line-height:0;"><img style="border:0;" src="{{ url('public/img', $parameters = ['logo_small.png']) }}" width="" height="" alt="" /></a>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div style="display: block;">
								@yield('content')
							</div>
						</td>
					</tr>
				</table>
			</center>
		</div>
	</body>
</html>
