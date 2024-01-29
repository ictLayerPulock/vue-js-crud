<template>
  <div class="container">
    <h3>Add Contact</h3>
    <br />

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <form @submit.prevent="addStudent">
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="newStudent.name"
                  placeholder="Enter Name"
                />
              </div>
              <br />

              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="newStudent.email"
                  placeholder="Enter Email"
                />
              </div>
              <br />
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="newStudent.phone"
                  placeholder="Enter Phone"
                />
              </div>
              
              
              <br />
              <br />

              <button type="submit" class="btn btn-success">Save Info</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "vue";

// Data
const newStudent = ref({ name: "", email: "", phone: ""});


// Methods
async function addStudent() {
  try {
    const response = await fetch('http://localhost:8000/api/user', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(newStudent.value)
    });

    if (response.ok) {
      // Fetch updated list of students
      // fetchStudents();
      // Clear the form fields
      // newStudent.value = { name: '', email: '', phone: '' };
    } else {
      console.error('Failed to add student');
    }
  } catch (error) {
    console.error('Error adding student:', error);
  }
}

</script>
