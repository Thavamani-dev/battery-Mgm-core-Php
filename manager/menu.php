<style>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: "Lato", sans-serif;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.9);
  z-index: -1;
  opacity: 0;
  transition: 1s all;
}

.navbar {
  display: flex;
  align-items: center;
  width: 100vw;
  background-color: #fff;
  box-shadow: 0px 10px 10px 3px rgba(0, 0, 0, 0.3);
  position: relative;
  padding: 0px 70px;
  background-color: #fff;
}
.navbar-logo {
  color: #ff3f34;
  text-decoration: none;
  font-size: 25px;
  padding: 0px 20px;
}

.navbar-links {
  list-style-type: none;
  display: flex;
}
.navbar-links li a {
  display: block;
  text-decoration: none;
  color: #444;
  padding: 20px 20px;
  font-weight: 700;
  transition: 0.4s all;
}

.navbar-links li.navbar-dropdown {
  position: relative;
}

.navbar-links li.navbar-dropdown:hover .dropdown {
  visibility: visible;
  opacity: 1;
  transform: translateY(0px);
}

.navbar-links li.navbar-dropdown .dropdown {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  padding: 20px 0;
  top: 100%;
  transform: translateY(50px);
  left: 0;
  width: 250px;
  background-color: #fff;
  box-shadow: 0px 10px 10px 3px rgba(0, 0, 0, 0.3);
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
  z-index: 111;
  transition: 0.4s all;
}
.navbar-links li.navbar-dropdown .dropdown a {
  padding-top: 10px;
  padding-bottom: 10px;
  font-weight: 400;
}
.navbar-dropdown .dropdown a:hover {
  padding-left: 30px;
}
.navbar-links li a:hover {
  color: #ff3f34;
}

.header {
  display: flex;
  justify-content: center;
  align-items: TOP;
  width: 100vw;
  height: 90vh;
   background-color: #f00; 
  background-image: url("http://teraimpulse.com/wp-content/uploads/2022/01/Tera-Impulse-Logo.png");
  background-size: cover;
}

.header-inner {
  text-align: center;
  color: #ff3f34;
  text-shadow: 0px 10px 10px rgba(0, 0, 0, .8);
}

.header-inner h1 {
  font-family: "Great Vibes", cursive;
  font-size: 130px;
}

.header-inner form input[type="search"] {
  position: relative;
  width: 500px;
  border: none;
  padding: 15px;
  border-radius: 27px;
  box-shadow: 0px 0px 15px 3px rgba(0, 0, 0, 0.3);
  z-index: 11;
}
.header-inner form input[type="search"]:focus {
  outline: none;
}

.header-inner form input[type="search"]:focus + div {
  z-index: 1;
  opacity: 1;
}

::placeholder {
  color: #666;
  font-weight: 400;
}
</style>
 
<nav class="navbar">
      <a href="create.php" class="navbar-logo"
        ><i class="material-icons">TERA</i> IMPULSE &nbsp;</a>
     
      <ul class="navbar-links">
        <li class="navbar-dropdown">
          <a href="#">ORDERS</a>
          <div class="dropdown">
            
             <a href="retrive.php">ORDER LIST</a>
            <a href="retriveA.php">PENDING</a>
            <a href="retriveB.php">APPORVED</a>
            <a href="retriveD.php">DELIVERY</a>
            <a href="retriveDP.php">DELIVERED</a>
          </div>
        </li>
        <li class="navbar-dropdown"> 
          <a href="#">USER MANAGEMENT</a>
          <div class="dropdown">
           <a href="register_form.php">ADD USER</a>
             <a href="Userlist.php">USER</a>
          </div>   
        </li> 
        <li class="navbar-dropdown"> 
            <a href="logout.php">Logout</a>
            </li> 
            
          
<!--         <li class="navbar-dropdown"> -->
<!--           <a href="#">Breads</a> -->
<!--           <div class="dropdown"> -->
<!--             <a href="#">Lachha Paratha</a> -->
<!--             <a href="#">Rumali Roti</a> -->
<!--             <a href="#">Tandoori Roti</a> -->
<!--             <a href="#">Butter Roti</a> -->
<!--             <a href="#">Plain Naan</a> -->
<!--             <a href="#">Butter Naan</a> -->
<!--           </div> -->
<!--         </li> -->
<!--         <li class="navbar-dropdown"> -->
<!--           <a href="#">Rice</a> -->
<!--           <div class="dropdown"> -->
<!--             <a href="#">Plain Rice</a> -->
<!--             <a href="#">Veg Pulao</a> -->
<!--             <a href="#">Veg Biryani</a> -->
<!--             <a href="#">Paneer Biryani</a> -->
<!--             <a href="#">Lemon Rice</a> -->
<!--             <a href="#">Veg Kashmiri Pulao</a> -->
<!--           </div> -->
<!--         </li> -->
<!--         <li class="navbar-dropdown"> -->
<!--           <a href="#">Chinese</a> -->
<!--           <div class="dropdown"> -->
<!--             <a href="#">Paneer Chill Dry</a> -->
<!--             <a href="#">Paneer Garlic</a> -->
<!--             <a href="#">Veg Garlic</a> -->
<!--             <a href="#">Veg Chilli</a> -->
<!--           </div> -->
<!--         </li> -->
      </ul>
    </nav>
 
  <!--             <header class="header">
      <div class="header-inner">
        <h1>TERA IMPLUSE</h1>
        <form>
          <input type="search" placeholder="Enter Your Location" />  
           <div class="overlay"></div> 
        </form>  
       </div> 
     </header> -->
 