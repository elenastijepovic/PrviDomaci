$(document).ready(function () {
  getTrainers();
  //TOGGLE FORMS
  $("#toggleFormMembership").click(function (e) {
    e.preventDefault();
    $("form:not(#formMembership)").hide("slower");
    $("#formMembership").toggle("slower");
    hideMemberships();
    $("#stickMan").style.display=block;
  });

  $("#toggleFormTrainer").click(function (e) {
    e.preventDefault();
    $("form:not(#formTrainer)").hide("slower");
    $("#formTrainer").toggle("slower");
    hideMemberships();
    $("#stickMan").style.display=block;
  });

  $("#toggleFormFindMembership").click(function (e) {
    e.preventDefault();
    $("form:not(#formFindMembership2)").hide("slower");
    $("#formFindMembership2").toggle("slower");
    $("#stickMan").hide("slower");
  });
  $("#toggleFormSoonExpired").click(function (e) {
    e.preventDefault();
    $("form:not(#formSoonExpired)").hide("slower");
    $("#formSoonExpired").toggle("slower");
    $("#stickMan").hide("slower");
  });
  $("#showMemberships").click(function (e) {
    e.preventDefault();
    $("form:not(#showMembershipsForm)").hide("slower");
    $("#showMembershipsForm").toggle("slower");
    $("#stickMan").hide("slower");
  });

  //FORM-UPDATE MEMBERSHIP

  $("body").on("click", ".update", function (e) {
    let newDate = $("#newDate"+e.target.id).val();
    console.log("PROCITAN DATUM: "+newDate);
    console.log("Procitan klijent id: "+e.target.id);
    updateMembership(e.target.id,newDate);
  });
  //FORM-DELETE MEMBERSHIP
  $("body").on("click", ".remove", function (e) {
    deleteMembership(e.target.id);
  });

  //FORM - ADD MEMBERSHIP
  $("#formMembership").submit(function (e) {
    e.preventDefault();

    let client = $("#client").val();
    let email = $("#email").val();
    let telephone = $("#telephone").val();
    let membershipType = $("#membershipType").val();
    let date = $("#date").val();
    let trainer = $("#trainerId").val();
    console.log(client + " " + email + " " + telephone + " " + membershipType + " " + date + " " + trainerId);

    addMembership(client, email, telephone, membershipType, date, trainer);

  });


  $("#formTrainer").submit(function (e) {
    e.preventDefault();
    let trainerData = $("#trainerData").val();
    let specialization = $("#specialization").val();
    console.log("DODAT: " + trainerData + " " + specialization);
    addTrainer(trainerData, specialization);
  });



  $("#formSoonExpired").submit(function (e) {
    e.preventDefault();
    let order_by = $("#order_by_expired").val();
    getMembershipsSoonExpired(order_by);
  });


  $("#formFindMembership2").submit(function (e) {
    e.preventDefault();
    let email = $("#membershipSpecific").val();
    let order_by = $("#order_by_specific").val();
    getMembershipsByClient(email, order_by);
  });


  //SHOW MEMBERSHIPS
  $("#showMembershipsForm").submit(function (e) {
    e.preventDefault();
    let order_by = $("#order_by_all").val();
    getAllMemberships(order_by);
  });

  function hide(){
    var x = document.getElementById("stickMan");
    //x.style.display === "none"
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  }

  //MEMBERSHIPS FUNCTION ADD
  function addMembership(
    client,
    email,
    telephone,
    membershipType,
    date,
    trainerId
  ) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8111/endpoints/createMembership.php",
      data: {
        nameSurname: client,
        email: email,
        telephone: telephone,
        membershipType: membershipType,
        date: date,
        trainerId: trainerId,
      },
      dataType: "json",
      success: function (response) {
        console.log("SUCCESS: " + client + " " + email + " " + telephone + " " + membershipType + " " + date + " " + trainerId);
      },
    });
  }

  //TRAINER ADD FUNCTION

  function addTrainer(trainerData, specialization) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8111/endpoints/createTrainer.php",
      data: {
        nameSurname: trainerData,
        specialization: specialization
      },
      dataType: "json",
      success: function (response) {
        getTrainers();
      },
    });
  }

  //GET ALL MEMBERSHIPS FUNCTION
  function getAllMemberships(order_by) {
    $.ajax({
      type: "GET",
      url: "http://localhost:8111/endpoints/getMemberships.php",
      data: {
        order_by: order_by,
      },
      dataType: "json",
      success: function (memberships) {
        memberships = JSON.parse(JSON.stringify(memberships));
        showAllMemberships(memberships);
      },
    });
  }

  function getMembershipsSoonExpired(order_by) {
    $.ajax({
      type: "GET",
      url:
        "http://localhost:8111/endpoints/getSoonExpired.php",
      data: {
        order_by: order_by,
      },
      dataType: "json",
      success: function (memberships) {
        memberships = JSON.parse(JSON.stringify(memberships));
        showAllMemberships(memberships);
      },
    });
  }

  function getMembershipsByClient(
    email,
    order_by
  ) {
    $.ajax({
      type: "GET",
      url:
        "http://localhost:8111/endpoints/getMembershipsByClient.php",
      data: {
        email: email,
        order_by: order_by,
      },
      dataType: "json",
      success: function (memberships) {
        memberships = JSON.parse(JSON.stringify(memberships));
        showAllMemberships(memberships);
      },
    });
  }

  //GET ALL TRAINERS FUNCTION
  function getTrainers() {
    $.ajax({
      type: "GET",
      url: "http://localhost:8111/endpoints/getTrainers.php",
      success: function (trainers) {
        console.log(trainers);
        trainers = JSON.parse(trainers);
        console.log(trainers);
        for (let index = 0; index < trainers.length; index++) {
          $(".trainer").append(
           new Option(trainers[index].nameSurname, trainers[index].id)
          );
        }
      },
    });
  }

  function deleteMembership(id) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8111/endpoints/deleteMembership.php",
      data: {
        id: id,
      },
      dataType: "json",
      success: function (response) { },
    });
  }

  function updateMembership(id,newDate) {
    $.ajax({
      type: "POST",
      url: "http://localhost:8111/endpoints/updateMembership.php",
      data: {
        id: id,
        date: newDate
      },
      dataType: "json",
      success: function (response) {
        alert(response);
      },
    });
  }



 


  //TABLE-MEMBERSHIPS

  function hideMemberships(){
    $("#membershipTable").html("");
  }

  function showAllMemberships(memberships) {
    $("#membershipTable").html("");
    $("#membershipTable").html(`

            <thead style="color:white;border:solid rgb(54, 51, 51,0.918);; border-bottom:none; background-color:rgb(54, 51, 51,0.918);">
          
                <tr>
                    <th scope="col">Client</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Membership</th>
                    <th scope="col">Expire date</th>
                    <th scope="col">Trainer</th>
                    <th scope="col></th>
                    <th scope="col">New expire date</th>
                    <th scope="col">      </th>
                </tr>
            </thead>
          
            
            `);
    if (memberships != null) {
      for (const _var of memberships) {

        $("#membershipTable").append(`
                         <tbody style="border:solid rgb(255, 251, 251); background-color:white;" >
                          <tr>
                              <td>${_var.nameSurname} </td>
                              <td>${_var.email}</td>
                              <td>${_var.telephone}</td>
                              <td>${_var.membershipType}</td>
                              <td contenteditable="true">${_var.date}</td>
                              <td>${_var.trainerId}</td>
                              <td>
                              <input placeholder="Trainer" type="date" id="newDate${_var.id}">
                              </td>
                              <td style="background-color:rgb(54, 51, 51,0.918);; border:none;">
                              
                              
                              <button class ="btn btn-danger update" id = ${_var.id}>Update</button>
                              <button class ="btn btn-danger remove"  id = ${_var.id}>Remove</button>
                              </td>
                             
                              
                          </tr>
                      </tbody>
                         `);
      }


    }





    console.log(memberships);
  }


});





