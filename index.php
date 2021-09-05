<!DOCTYPE html>
<html lang="en">
<?php include('./head.php') ?>
<head >
    <div class="line">

    </div>

</head>


<body>
 
    
    <div class="row1">
    <div class="col-2">
                <button class="btn btn-block" id="toggleFormMembership">Add new membership</button>
                <form id="formMembership">
                    <input placeholder="Client" type="text" id="client">
                    <input placeholder="Email" type="text" id="email">
                    <input placeholder="Telephone" type="text" id="telephone">
                    <input placeholder="MembershipType" type="text" id="membershipType">
                    <input placeholder="Date" type="date" id="date">
                    
                    <select class="trainer" id="trainerId">
                        <option value="0">Choose trainer</option>
                    </select>
                    <br>
                  
                    <input type="submit" value="Submit" class="button">
                </form>
</div>
<div class="col-2">

                <button class="btn btn-block" id="toggleFormTrainer">Add new trainer</button>
                <form id="formTrainer">
                    <input placeholder="Trainer" type="text" id="trainerData">
                    <input placeholder="Specialization" type="text" id="specialization">
                    <input type="submit" value="Submit" class="button">
                </form>
</div>
<div class="col-2">
                <button class="btn btn-block" id="toggleFormFindMembership">Find membership</button>
                <form id="formFindMembership2">
                   
                    <input placeholder="Clients email" type="text" id="membershipSpecific">
                    <select id="order_by_specific">
                        <option value="0">Sort by</option>
                        <option value="date">Date</option>
                        <option value="trainerId">Trainer</option>
                    </select>
                    <input type="submit" value="Submit" class="button">
                </form>
</div>
<div class="col-2">
                <button class="btn btn-block " id="toggleFormSoonExpired">Soon expired</button>
                <form id="formSoonExpired">
                   <select id="order_by_expired">
                        <option value="0">Sort by</option>
                        <option value="date">Date</option>
                        <option value="nameSurname">Client</option>
                    </select>
                    <input type="submit" value="Submit" class="button">
                </form>
</div>
<div class="col-2">
                <button class="btn btn-block" id="showMemberships">Show all memberships</button>
                <form id="showMembershipsForm">
                    <select id="order_by_all">
                        <option value="0">Sort by</option>
                        <option value="trainerId">Trainer</option>
                        <option value="membershipType">Membership type</option>
                    </select>
                    <input type="submit" value="Submit" class="button">
                </form>
</div>


</div>


    <div class="container">
        <div class="row">
            <div class="col">
                <div>
                &nbsp; 
                &nbsp;
                &nbsp;
                </div>
                <table class="table" id="membershipTable">
                   

</div>
                </table>
            </div>
           
        </div>
    </div>


    <?php include('./skripte.php') ?>
</body>


</html>