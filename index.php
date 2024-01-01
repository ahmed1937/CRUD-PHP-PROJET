<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css">
  <title> TaskPro </title>
</head>

<body>

  <!--  NAV BAR  -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top transparent-navbar ">
    <div class="container">
      <div class="logo">
        <i class="fa-solid fa-list fa-fade" style="color: #e6d733;"></i>
        <a href="#" class="navbar-brand ">TaskPro</a>
      </div>

      <!-- when it collapses  show humberger menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!--    -->
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <h4> <a href="#why" class="nav-link">Why TaskPro</a> </h4>
          </li>
          <li class="nav-item">
            <h4> <a href="#how" class="nav-link">How it works </a> </h4>
          </li>
          <li class="nav-item">
            <h4> <a href="signUp.php" class="nav-link">Sign Up </a> </h4>
          </li>
        </ul>

      </div>

  </nav>

  <!-- SHOWCASE   -->
  <form action="login.php" method="post">
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5  text-center text-sm-start ">
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Become <span class="text-warning">Productive</span></h1>
            <p class="lead my-4">
              Unleash your potential, boost your productivity,
              and experience a newfound sense of accomplishment as you embark on your journey with TaskPro.
              Get ready to transform the way you work, study, and live – it all starts here!
            </p>
            <button type="submit" id="SignIn" class="btn  btn-info btn-lg">Sign In</button>
          </div>
          <img class="img-fluid w-50 d-none d-sm-block " src="./images/showcase.png" alt="taskImg">
        </div>
      </div>

    </section>
  </form>
  <!--Daily newsletter   -->
  <section class="bg-info text-light p-5">
    <div class="container">
      <div class="d-md-flex justify-content-between align-items-center">
        <h3 class="mb-3 mb-md-0">Subscribe To Our Newsletter !! Daily Tips and Hacks For Ultilmate Productivity </h3>

        <div class="input-group news-input">
          <input type="text" class="form-control" placeholder="Enter email : mohssine@gmail.com">
          <button class="btn btn-dark btn-lg" type="button" id="button-addon2">submit</button>
        </div>
      </div>
    </div>
  </section>
  <!--Boxes  bootsrap grid   -->
  <section class="p-5">
    <div class="container">
      <div class="row text-center g-4">
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-exclamation-square-fill"></i>
              </div>
              <h3 class="card-title mb-3">Task Prioritization</h3>
              <p class="card-text">
                It allows you to assign priorities to your tasks,
                helping you to focus on the most important and urgent items first.
                So you ensure that critical tasks are completed in a timely manner
              </p>
              <a href="#" class="btn btn-info">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-secondary text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-hourglass-split"></i>
              </div>
              <h3 class="card-title mb-3">Deadline Tracking</h3>
              <p class="card-text">
                which helps you to stay organized by setting specific target dates
                for completing tasks. you can receive reminders and notifications
                as deadlines approach, reducing the risk of missing important commitments.
              </p>
              <a href="#" class="btn btn-dark">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="card bg-dark text-light">
            <div class="card-body text-center">
              <div class="h1 mb-3">
                <i class="bi bi-wifi-off"></i>
              </div>
              <h3 class="card-title mb-3">Offline Access</h3>
              <p class="card-text">
                you can view, edit, and create tasks without requiring an
                internet connection. Any changes made while offline
                will be synchronized when an internet connection is reestablished.
              </p>
              <a href="#" class="btn  btn-info">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Why task pro  -->
  <section id="why" class="p-5">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md">
          <img src="./images/whyUs.jpg" class="img-fluid" alt="why us img" />
        </div>
        <div class="col-md p-5">
          <h2>Why TaskPro</h2>
          <p class="lead">
            This task management app is a digital tool that simplifies the process of organizing and overseeing your
            tasks.
            You begin by creating tasks and providing essential details like due dates, priorities, and descriptions.
            These tasks can be organized into projects or categories, making it easier to manage related activities.
            The app allows you to prioritize tasks, ensuring that you focus on the most important ones first,
            and it sends timely reminders to keep you on track. Additionally, you can track task progress,
            set dependencies between tasks, and collaborate with others by sharing tasks, attaching files,
            and adding comments.
          </p>
          <p>
            The ability to sync your task list across multiple devices and access
            it offline further enhances your productivity and ensures that you're always up to date with your
            commitments.
            Customization options, reporting features, and analytics help you tailor the app to your specific
            needs and evaluate your performance. Ultimately, task management apps provide a structured and
            efficient way to manage your work and achieve your goals.
          </p>
          <a href="#" class="btn btn-dark mt-3">
            <i class="bi bi-chevron-right"></i> Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <section id="how" class="p-5 bg-dark text-light">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md p-5">
          <h2>How it works</h2>
          <p class="lead">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
            reiciendis eius autem eveniet mollitia, at asperiores suscipit
            quae similique laboriosam iste minus placeat odit velit quos,
            nulla architecto amet voluptates?
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
            reiciendis eius autem eveniet mollitia, at asperiores suscipit
            quae similique laboriosam iste minus placeat odit velit quos,
            nulla architecto amet voluptates?
          </p>
          <a href="#" class="btn btn-light mt-3">
            <i class="bi bi-chevron-right"></i> Read More
          </a>
        </div>
        <div class="col-md">
          <img src="./images/man.jpg" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </section>




  <!-- Contact -->
  <section id="contact" class="p-5">
    <div class="container">
      <div class="row g-4">
        <div class="col-md">
          <h2 class="text-center mb-4">Contact Info</h2>
          <ul class="list-group list-group-flush lead">
            <li class="list-group-item">
              <span class="fw-bold">Main Location:</span> Marrakech 4000 business center Majorel N25
            </li>
            <li class="list-group-item">
              <span class="fw-bold"> Phone:</span> +212 68 98 44 55 66
            </li>
            <li class="list-group-item">
              <span class="fw-bold">fax:</span> 05 54 89 45 24 88
            </li>
            <li class="list-group-item">
              <span class="fw-bold"> Email:</span>
              taskPro@contact.ma
            </li>
          </ul>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="p-5 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2023 TaskPro</p>

      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1"></i>
      </a>
    </div>
  </footer>






  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>


</body>

</html>




</body>

</html>