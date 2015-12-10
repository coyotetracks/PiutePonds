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
    <p><a href="register_form.php">Not a member?</a></p>
    <form method="post" action="member.php">
      <table bgcolor="#cccccc">
        <tr>
          <td colspan="2">Members log in here:</td>
        <tr>
          <td>Email:</td>
          <td><input type="text" name="email" size="50" maxlength="50"/></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password" size="16" maxlength="16"/></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Log in"/>
          </td>
        </tr>
        <tr>
          <td colspan="2"><a href="forgot_form.php">Forgot your password?</a></td>
        </tr>
      </table>
    </form>
  </body>
</html>
