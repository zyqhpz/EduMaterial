<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="haziq.css">
    <link rel="stylesheet" href="lib/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Haziq's</title>
</head>
<style>
* {
    box-sizing: border-box;
    font-family: 'Courier New', Courier, monospace;
}
.column {
    background-color: #d9d9d9;
    float: left;
    width: 50%;
    padding: 10px;
    height: auto; /* Should be removed. Only for demonstration */
}
  
  /* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  /* max-width: 300px; */
  margin: auto;
  text-align: center;
  font-family: arial;
}
img {
    margin-top:25px;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    overflow: hidden;
    object-fit: cover;
}
.title {
  font-size: 20px;
}
a {
  text-decoration: none;
  font-size: 45px;
  color: black;
}

#boxA,
#boxB {
  float: left;
  padding: 10px;
  margin: 10px;
  -moz-user-select: none;
  color:white;
}
#boxA {
  background-color: #3000be;
  width: 75px;
  height: 75px;
}
#boxB {
  background-color: #ff0055;
  width: 150px;
  height: 150px;
}
</style>
<body>
    
<div class="main">
    
    <div class="row">
        <div class="column" >
            <div class="card">
                <img src="../../src\image\team\zyqq.jpg" alt="Haziq Hapiz">
                <h1>Haziq Hapiz</h1>
                <p class="title">Web Developer</p>
                <p>Universiti Teknikal Malaysia Melaka</p>
                <a href="https://www.github.com/zyqhpz" target="_blank"><i class="fa fa-github"></i></a> 
            </div>
        </div>
        <div class="column">
            <!-- <h2>HAZIQ HAPIZ</h2> -->
            <p>I am an adaptive and independent person.
                Passionate in Web Development.
                Love to code and enthusiast to learn new things.
                Constantly exploring and being amazed by new technologies.
                Always open to learn new knowledge to improve both soft-skills and hard-skills.</p>
            <h2>Technical Skills</h2>
                <ul>
                    <li>
                        Web Development
                        <br>
                        <ul>
                            <li>HTML</li>
                            <li>CSS</li>
                            <li>JavaScript</li>
                            <li>MySQL</li>
                        </ul>
                    </li>
                    <br>
                    <li>
                        Artificial Intelligence, AI
                        <ul>
                            <li>Computer Vision</li>
                            <li>Python</li>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
    
 </div>
</body>
</html>