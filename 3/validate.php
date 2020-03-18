<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Assignment 3</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="pageContainer">
      <h2 class="centerText">Form Validation</h2>

      <form action="validateConfirm.php" class="formLayout" method="POST">
        <div class="formGroup">
          <label>Email:</label>
          <input
            type="text"
            name="email"
            class="textbox"
            autofocus=""
            required=""
            placeholder="Email"
            pattern="[A-Za-z&#39;-]{2,20}"
          />

          <label>First name:</label>
          <input
            type="text"
            name="fname"
            class="textbox"
            autofocus=""
            required=""
            placeholder="First name"
            title="first name"
            maxlength="20"
            pattern="[A-Za-z&#39;-]{2,20}"
          />

          <label>Birthday:</label>
          <input
            type="text"
            name="birthday"
            class="textbox"
            autofocus=""
            required=""
            placeholder="dd/mm/yyyy"
            maxlength="20"
            pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$"
          />

          <label>Age:</label>
          <input
            type="text"
            name="age"
            class="textbox"
            autofocus=""
            required=""
            placeholder="Age"
          />

          <label>State:</label>
          <input
            type="text"
            name="state"
            class="textbox"
            autofocus=""
            required=""
            placeholder="state"
          />

          <label>Zipcode:</label>
          <input
            type="text"
            name="zipcode"
            class="textbox"
            autofocus=""
            required=""
            placeholder="Zipcode"
          />
        </div>
        <div class="formGroup">
          <label></label>
          <button type="submit">Submit Form</button>
        </div>
        <div class="centerText vertGap55">
          <button type="submit" formnovalidate="">
            Submit without validation
          </button>
          <br /><br />
          <a href="?">Reload page</a>
        </div>
      </form>
    </div>
  </body>
</html>
