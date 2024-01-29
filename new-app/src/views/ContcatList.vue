<!-- <script setup>
import { ref } from 'vue';
const users = ref(null);
fetch('http://localhost:8000/api/user')
    .then(response => response.json())
    .then(data => users.value = data.data);
</script> -->



<template>
  <div class="container">
    <div class="d-flex justify-content-between">
      <h3>Contact List Page</h3>
      <router-link class="btn btn-success" to="add-contact"
        >Add Contact</router-link
      >
    </div>
    <br />
    <div class="row pt-5">
      <div class="col-md-6 mx-auto">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th scope="col">SI_NO</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody v-if="!students">
                Loading...
              </tbody>
              <tbody v-else-if="students">
                <tr v-for="student in students" :key="student.id">
                  <td>{{ student.id }}</td>
                  <td>{{ student.name }}</td>
                  <td>{{ student.email }}</td>
                  <td>{{ student.phone }}</td>
                  <td>
                    <router-link
                      :to="{ name: 'edit', params: { id: student.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      @click="deleteStudent(student.id)"
                      class="btn btn-danger"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>

              <tbody v-else>
                Loading...
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
 
<script setup>
import { ref } from "vue";

// Data
const students = ref([]);

// Fetch students from API
async function fetchStudents() {
  try {
    const response = await fetch("http://localhost:8000/api/user");
    const jsonData = await response.json();
    students.value = jsonData.data;
  } catch (error) {
    console.error("Error fetching students:", error);
  }
}

async function deleteStudent(studentId) {
  try {
    const response = await fetch(
      `http://localhost:8000/api/user/${studentId}`,
      {
        method: "DELETE",
      }
    );

    if (response.ok) {
      // Remove the deleted student from the local students array
      students.value = students.value.filter(
        (student) => student.id !== studentId
      );
    } else {
      console.error("Failed to delete student");
    }
  } catch (error) {
    console.error("Error deleting student:", error);
  }
}

// Fetch students when component is mounted
fetchStudents();
</script>
  