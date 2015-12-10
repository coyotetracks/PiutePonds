<html>
  <head>
    <title>Login</title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left}
      a { color: #000000 }
    </style>
  </head>
  <body>
    <form method="post" action="register_new.php">
      <table bgcolor="#cccccc">
        <tr>
          <td>Email address<br />(max 50 chars):</td>
          <td><input type="text" name="email" size="50" maxlength="50"/></td>
        </tr>
        <tr>
          <td>First Name <br />(max 50 chars):</td>
          <td valign="top"><input type="text" name="first_name" size="50" maxlength="50"/></td>
        </tr>
        <tr>
          <td>Last Name<br />(max 50 chars):</td>
          <td valign="top"><input type="text" name="last_name" size="50" maxlength="50"/></td>
        </tr>
        <tr>
          <td>Password<br />(between 6 and 16 chars):</td>
          <td valign="top"><input type="password" name="password" size="16" maxlength="16"/></td>
        </tr>
        <tr>
          <td>Confirm password:</td>
          <td><input type="password" name="password2" size="16" maxlength="16"/></td>
        </tr>
        <tr>
          <td colspan=2 align="center"><input type="submit" value="Register"></td>
        </tr>
      </table>
    </form>
  </body>
</html>