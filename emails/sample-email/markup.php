<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Email</title>
		<?= csscrush_inline(__DIR__.'/style.css') ?>
	</head>
	<body>
		<table class="center" align="center"><tr align="center"><td align="center">
			<!--[if (mso) | (IE)]><table width="767" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td><![endif]-->
			<table class="spacer-48" cellpadding="24"><tr><td>&nbsp;</td></tr></table>
			<table class="wrapper-container" align="center"><tr align="center"><td align="center">
				<table class="wrapper" cellpadding="32" width="600" align="center"><tr align="center"><td align="center" width="600">
					<table class="email-column" align="left">

						<tr align="left"><td align="left" class="top">
							<table class="logo-container">
								<tr>
									<td align="left" valign="center">
										<img src="<?= $_GET['uri'] ?>/images/logo.png" alt="Logo">
									</td>
									<td align="right" valign="center">
										<div><a href="http://acmelogos.com/" class="blend">acmelogos.com</a></div>
									</td>
								</tr>
							</table>
						</tr></td>

						<tr align="left"><td align="left" class="intro">
							<table class="spacer-32" cellpadding="16"><tr><td>&nbsp;</td></tr></table>
							<h1>Hi there, <span class="brand-color">Ryan</span></h1>
							<table class="spacer-24" cellpadding="12"><tr><td>&nbsp;</td></tr></table>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<table class="spacer-24" cellpadding="12"><tr><td>&nbsp;</td></tr></table>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							<table class="spacer-24" cellpadding="12"><tr><td>&nbsp;</td></tr></table>
							<p>Thank you,</p>
							<table class="spacer-24" cellpadding="12"><tr><td>&nbsp;</td></tr></table>
							<p>ACME Team</p>
						</tr></td>

					</table>
				</td></tr></table>
			</td></tr></table>
			<table class="spacer-48" cellpadding="24"><tr><td>&nbsp;</td></tr></table>
			<!--[if (mso) | (IE)]></td></tr></table><![endif]-->
		</td></tr></table>
	</body>
</html>
