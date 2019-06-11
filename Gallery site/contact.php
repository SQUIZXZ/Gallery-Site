<?php 
/*PHP function used to repeat the same code. It calls the code in header.php (which is the signup/login button*/
include_once 'header.php';
?> 
<style>
	/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */  
    border: 1px solid #ccc; /* Gray border */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */ 
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer; 

}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
    background-color: #45a049;
}

/* Add a background color and some padding around the form */
.container1 {
    border-radius: 5px;
    padding: 100px 100px 100px 100px;
}
</style> 
<!-- Inputs for form selection --> 
<div class="container1">
  <form action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option> 
      <option value="usa">UK</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
<?php
// Footer file being excecuted on the page
include_once 'footer.php';
?>