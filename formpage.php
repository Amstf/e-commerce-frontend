<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="form.css" />
    <link rel="stylesheet" href="HeaderStyle.css" />
    <link rel="icon" href="./Images/b.jpeg" />
    <!-- fontawsone -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <a name="top"></a>
  </head>
  <body>
    <div id="root">
  <?php include 'header.php';?>

      <div class="container">
        <div id="form-main">
          <div id="form-div">
            <form class="montform" id="reused_form">
              <p class="name">
                <input
                  name="name"
                  type="text"
                  class="feedback-input"
                  required
                  placeholder="Name"
                  id="name"
                />
              </p>
              <p class="email">
                <input
                  name="email"
                  type="email"
                  required
                  class="feedback-input"
                  id="email"
                  placeholder="Email"
                />
              </p>
              <p class="text">
                <textarea
                  name="message"
                  class="feedback-input"
                  id="comment"
                  placeholder="Message"
                ></textarea>
              </p>
              <div class="submit">
                <button type="submit" class="button-blue">SUBMIT</button>
                <div class="ease"></div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php include 'footer.html';?>

    </div>
  </body>
</html>
