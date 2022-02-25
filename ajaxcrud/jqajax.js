$(document).ready(function () {
    // Ajax Read data
    //console.log("here");
    function showdata() {
      output = "";
      $.ajax({
        url: "retrieve.php",
        method: "GET",
        dataType: "json",
        success: function (data) {
          //console.log(data);
          if (data) {
              x = data;
              
          } else {
            x = "";
          }
          for (i = 0; i < x.length; i++) {
            output +=
              "<tr><td>" +
              x[i].sno +
              "</td><td>" +
              x[i].name +
              "</td><td>" +
              x[i].email +
              "</td><td>" +
              x[i].age +
               "</td><td>"+
              x[i].mobile+                 
              "</td><td> <button class='btn btn-warning btn-sm btn-edit' data-sid=" +
              x[i].sno +
              ">Edit</button> <button class='btn btn-danger btn-sm btn-del' data-sid=" +
              x[i].sno +
              ">Delete</button></td></tr>";
          }
          $("#tbody").html(output);
        },
      });
    }
    showdata();
  
    // Ajax Create Data
    $("#btnadd").click(function (e) {
      e.preventDefault();
      //console.log("Save Button Clicked");
      let sn = $("#contactid").val();
      let nm = $("#name").val();
      let em = $("#email").val();
      let ag = $("#age").val();
      let mb = $("#mobile").val();
      // console.log(nm);
      // console.log(em);
      // console.log(pw);
      mydata = { sno: sn, name: nm, email: em, age:ag , mobile:mb  };
      // console.log(mydata);
      $.ajax({
        url: "insert.php",
        method: "POST",
        data: JSON.stringify(mydata),
        success: function (data) {
          // console.log(data);
          msg =  data ;
          $("#msg").html(msg);
          $("#myForm")[0].reset();
          showdata()
        },
      });
    });
    
    // Ajax Deleting Data
  $("tbody").on("click", ".btn-del", function () {
    //console.log("Delete Button Clicked");
    let id = $(this).attr("data-sid");
    //console.log(id);
    mydata = { sid: id };
    mythis = this;
    $.ajax({
      url: "delete.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        // console.log(data);
        if (data == 1) {
          msg =
          "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Success!</strong> Your contact details has been deleted successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button></div>";
          $(mythis).closest("tr").fadeOut();
        } else if (data == 0) {
          msg =
            "<div class='alert alert-dark mt-3'>Unable to Deleted Student </div>";
        }
        $("#msg").html(msg);
      },
    });
  });

  //Ajax update data
  $("tbody").on("click",".btn-edit",function(){
    //console.log("Edit button Clicked");
    let id = $(this).attr("data-sid");
    //console.log(id)

    mydata = {sid:id};
    $.ajax({
        url: "edit.php",
        method: "POST",
        dataType: "json",
        data: JSON.stringify(mydata),
        success: function (data) {
          // console.log(data);
          $("#contactid").val(data.sno);
          $("#name").val(data.name);
          $("#email").val(data.email);
          $("#age").val(data.age);
          $("#mobile").val(data.mobile);
        },
      });

  });
    
  

  });