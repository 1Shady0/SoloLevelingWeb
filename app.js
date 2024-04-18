function swap_form1() {
    var signup = document.getElementById("signup");
    var login = document.getElementById("login");

    signup.style.transform = "translateX(400%)";
    login.style.transform = "translateX(158%)";
}


function swap_form2() {
    var signup = document.getElementById("signup");
    var login = document.getElementById("login");

    signup.style.transform = "translateX(257%)";
    login.style.transform = "translateX(301%)";
}


function status() {
    var status_btn = document.getElementById("status-btn"); 
    var tasks_btn = document.getElementById("tasks-btn"); 
    var inventory_btn = document.getElementById("inventory-btn");
    var status_section = document.getElementById("Status");
    var tasks_section = document.getElementById("Tasks"); 
    var inventory_section = document.getElementById("Inventory");   

    status_btn.className = "navbtn-selected";
    tasks_btn.className = "navbtn";
    inventory_btn.className = "navbtn";

    status_section.style.transform = "translateX(600px)";
    tasks_section.style.transform = "translateX(2600px)";
    inventory_section.style.transform = "translateX(4600px)";
}

function tasks() {
    var status_btn = document.getElementById("status-btn"); 
    var tasks_btn = document.getElementById("tasks-btn"); 
    var inventory_btn = document.getElementById("inventory-btn");
    var status_section = document.getElementById("Status");
    var tasks_section = document.getElementById("Tasks"); 
    var inventory_section = document.getElementById("Inventory");   

    status_btn.className = "navbtn";
    tasks_btn.className = "navbtn-selected";
    inventory_btn.className = "navbtn";

    status_section.style.transform = "translateX(-2600px)";
    tasks_section.style.transform = "translateX(600px)";
    inventory_section.style.transform = "translateX(2600px)";
}

function inventory() {
    var status_btn = document.getElementById("status-btn"); 
    var tasks_btn = document.getElementById("tasks-btn"); 
    var inventory_btn = document.getElementById("inventory-btn");
    var status_section = document.getElementById("Status");
    var tasks_section = document.getElementById("Tasks"); 
    var inventory_section = document.getElementById("Inventory");   

    status_btn.className = "navbtn";
    tasks_btn.className = "navbtn";
    inventory_btn.className = "navbtn-selected";

    status_section.style.transform = "translateX(-4600px)";
    tasks_section.style.transform = "translateX(-2600px)";
    inventory_section.style.transform = "translateX(600px)";
}
