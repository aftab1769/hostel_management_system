showRooms();

const addModalElement = document.querySelector("#addModal");
const addAlertElement = document.querySelector("#add-alert")

addModalElement.addEventListener('submit', async (event) => {
    event.preventDefault();


    const roomNoElement = document.querySelector("#add-room-no");
    const roomSeaterElement = document.querySelector("#add-room-seater");
    const roomStatusElement = document.querySelector("#add-room-status");
    const rentElement = document.querySelector("#add-rent");

    let roomNoValue = roomNoElement.value;
    let roomSeaterValue = roomSeaterElement.value;
    let roomStatusValue = roomStatusElement.value;
    let rentValue = rentElement.value;

    addAlertElement.innerHTML = '';

    roomNoElement.classList.remove("is-invalid");
    roomSeaterElement.classList.remove("is-invalid");
    roomStatusElement.classList.remove("is-invalid");
    rentElement.classList.remove("is-invalid");


    if (roomNoValue == '' || roomNoValue === undefined) {
        addAlertElement.innerHTML = alert("Room number is required!");
        roomNoElement.classList.add("is-invalid");
    } else if (roomSeaterValue == '' || roomSeaterValue === undefined) {
        addAlertElement.innerHTML = alert("Please select the seats!");
        roomSeaterElement.classList.add("is-invalid");
    } else if (roomStatusValue == '' || roomStatusValue === undefined) {
        addAlertElement.innerHTML = alert("Room status is required!");
        roomStatusElement.classList.add("is-invalid");
    } else if (rentValue == '' || rentValue === undefined) {
        addAlertElement.innerHTML = alert("Enter the rent of room");
        rentElement.classList.add("is-invalid");
    } else {

        const data = {
            id: ID,
            room_no: roomNoValue,
            room_seater: roomSeaterValue,
            room_status: roomStatusValue,
            rent: rentValue,
        }

        const response = await fetch(addRoute, {
            method: "POST",
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
            }
        });

        const result = await response.json();

        if (result.errors) {
            addAlertElement.innerHTML = alert("This room is already exists!");
        } else if (result.success) {
            addAlertElement.innerHTML = alert(result.success, 'success');
            roomNoElement.value = '';
            roomSeaterElement.value = '';
            roomStatusElement.value = '';
            rentElement.value = '';
            showRooms();
        } else if (result.failure) {
            addAlertElement.innerHTML = alert(result.failure);
        }
        else {
            addAlertElement.innerHTML = alert();
        }
    }
});

async function showRooms() {
    const responseElement = document.querySelector("#response");

    const response = await fetch(showAllRoute);
    const result = await response.json();

    // console.log(result.rooms);

    if (result.rooms.length !== 0) {
        let rows = '';
        result.rooms.forEach(function (room, index) {
            rows += `<tr>
                        <td>${index + 1}</td>
                        <td>${room.room_no}</td>
                        <td>${room.room_seater}</td>
                        <td>${room.room_status}</td>
                        <td>${room.rent}</td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="editRoom(${room.id})" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i class="mdi mdi-pencil"></i></button>
                            <button type="button" class="btn btn-danger" onclick="deleteRoom(${room.id})" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"><i class="mdi mdi-delete"></i></button>
                        </td>
                    </tr>`;

            responseElement.innerHTML = `<table class="table">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Room No</th>
                                <th>Room Seater</th>
                                <th>Room Status</th>
                                <th>Rent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${rows}
                        </tbody>
                    </table>`;
        });
    } else {
        responseElement.innerHTML = `<div class="alert alert-success">No Record Found!</div>`;
    }

}

const editRoomNoElement = document.querySelector("#edit-room-no");
const editRoomSeaterElement = document.querySelector("#edit-room-seater");
const editRoomStatusElement = document.querySelector("#edit-room-status");
const editRentElement = document.querySelector("#edit-rent");

let mainId = null;

async function editRoom(id) {
    mainId = id;
    const APIURL = showSingleRoute.replace(':id', id);
    const response = await fetch(APIURL);
    const result = await response.json();
    
    editRoomNoElement.value = result.room.room_no;
    editRoomSeaterElement.value = result.room.room_seater;
    editRoomStatusElement.value = result.room.room_status;
    editRentElement.value = result.room.rent;
    clearEditModal();
}

const editModalElement = document.querySelector("#editModal");
const editAlertElement = document.querySelector("#edit-alert");

editModalElement.addEventListener("submit", async (event) => {
    event.preventDefault();


    let editRoomNoValue = editRoomNoElement.value;
    let editRoomSeaterValue = editRoomSeaterElement.value;
    let editRoomStatusValue = editRoomStatusElement.value;
    let editRentValue = editRentElement.value;

    editAlertElement.innerHTML = '';

    editRoomNoElement.classList.remove("is-invalid");
    editRoomSeaterElement.classList.remove("is-invalid");
    editRoomStatusElement.classList.remove("is-invalid");
    editRentElement.classList.remove("is-invalid");

    if(editRoomNoValue == '' || editRoomNoValue === undefined) {
        editAlertElement.innerHTML = alert('Room no field is required!');
        editRoomNoElement.classList.add('is-invalid');
    } else if(editRoomSeaterValue == '' || editRoomSeaterValue === undefined) {
        editAlertElement.innerHTML = alert('Room seater field is required!');
        editRoomSeaterElement.classList.add('is-invalid');
    } else if(editRoomStatusValue == '' || editRoomStatusValue === undefined) {
        editAlertElement.innerHTML = alert('Room status field is required!');
        editRoomStatusElement.classList.add('is-invalid');
    } else if(editRentValue == '' || editRentValue === undefined) {
        editAlertElement.innerHTML = alert('Room seater field is required!');
        editRentElement.classList.add('is-invalid');
    } else {
    editAlertElement.innerHTML = alert("Good to go", 'success');

    const data = {
        id: mainId,
        room_no: editRoomNoValue,
        room_seater: editRoomSeaterValue,
        room_status: editRoomStatusValue,
        rent: editRentValue,
    }

    const APIURL = updateRoute.replace(':id', mainId);

    const response = await fetch(APIURL, {
        method: "PATCH",
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const result = await response.json();

    if (result.errors) {
        editAlertElement.innerHTML = alert("Please fill all the fields!");
    } else if (result.success) {
        editAlertElement.innerHTML = alert(result.success, 'success');
        showRooms();
    } else if (result.failure) {
        editAlertElement.innerHTML = alert(result.failure);
    } else {
        editAlertElement.innerHTML = alert();
    }

    }

});

function deleteRoom(id) {
    mainId = id;
}

const deleteModalElement = document.querySelector("#deleteModal");
const alertElement = document.querySelector("#alert");

deleteModalElement.addEventListener("submit", async (event)=> {
    event.preventDefault();

    const data = {
        id: mainId
    }

    const APIURL = destroyRoute.replace(":id", mainId);

    const response = await fetch(APIURL, {
        method: "DELETE",
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const result = await response.json();

    if (result.success) {
        alertElement.innerHTML = alert(result.success, 'success');
        showRooms();
    } else if (result.failure) {
        alertElement.innerHTML = alert(result.failure);
    } else {
        alertElement.innerHTML = alert();
    }
    
    closeDeleteModal();
});


// function closeDeleteModal() {
//     const modalElement = document.querySelector('#deleteModal');
//     const modal = bootstrap.Modal.getInstance(modalElement);

//     if (modal) {
//         modal.hide();
//     }
// }

function closeDeleteModal() {
    const modalElement = document.querySelector('#deleteModal');
    
    if (modalElement) {
        $(modalElement).modal('hide');
    } else {
        console.warn('Modal element not found.');
    }
}


function clearAddModal() {
    addAlertElement.innerHTML = "";
    const roomNoElement = document.querySelector("#add-room-no");
    const roomSeaterElement = document.querySelector("#add-room-seater");
    const roomStatusElement = document.querySelector("#add-room-status");
    const rentElement = document.querySelector("#add-rent");

    roomNoElement.classList.remove("is-invalid");
    roomSeaterElement.classList.remove("is-invalid");
    roomStatusElement.classList.remove("is-invalid");
    rentElement.classList.remove("is-invalid");
}

function clearEditModal() {
    editAlertElement.innerHTML = "";
    const editRoomNoElement = document.querySelector("#edit-room-no");
    const editRoomSeaterElement = document.querySelector("#edit-room-seater");
    const editRoomStatusElement = document.querySelector("#edit-room-status");
    const editRentElement = document.querySelector("#edit-rent");

    editRoomNoElement.classList.remove("is-invalid");
    editRoomSeaterElement.classList.remove("is-invalid");
    editRoomStatusElement.classList.remove("is-invalid");
    editRentElement.classList.remove("is-invalid");

}

function alert(msg = "Something went wrong!", cls = "danger") {
    return `<div class="alert alert-${cls} alert-dismissible fade show" role="alert">
    ${msg}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
}