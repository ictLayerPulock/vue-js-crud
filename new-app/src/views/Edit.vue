<template>
  <div class="container">
    <h3>Edit Contact</h3>
    <br />

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-body">
            <form @submit.prevent="updateStudent()">
              Name
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="students.name"
                  placeholder="Enter Name"
                />
              </div>
              <br />
              Email
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="students.email"
                  placeholder="Enter Email"
                />
              </div>
              <br />
              Phone
              <div class="input-group mb-3">
                <input
                  type="text"
                  class="form-control"
                  v-model="students.phone"
                  placeholder="Enter Phone"
                />
              </div>
              <br />

              <br />

              <button type="submit" class="btn btn-success">Update Info</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

  <script setup>
    import { ref, onMounted } from 'vue';
    import { useRoute } from 'vue-router';

    // Define reactive variables
  
    const students = ref({ name: '', email: '', phone: '' });
    // console.log(JSON.stringify(studentUpdateData.value))
    // Get the current route
    const route = useRoute();

    // Fetch student data from API
    onMounted(async () => {
      try {
        const response = await fetch(`http://localhost:8000/api/user/${route.params.id}/edit`);
        const jsonData = await response.json();
        students.value = jsonData.data;
        // Update form fields with fetched data
        // studentData.value = { ...jsonData.data };
      } catch (error) {
        console.error('Error fetching student data:', error);
      }
    });

    // Function to update student data
    async function updateStudent() {
      console.log(students.value)
      try {
        const response = await fetch(`http://localhost:8000/api/update/${route.params.id}`, {
          method: 'POST', // or 'PATCH' depending on your API
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(students.value)
        });
       
        if (response.ok) {
          // Clear form fields after successful update
          // studentData.value = { name: '', email: '', phone: '' };
          // Optionally fetch updated data or perform any other actions
          console.log('Student data updated successfully');
        } else {
          console.error('Failed to update student data');
        }
      } catch (error) {
        console.error('Error updating student data:', error);
      }
    }
  </script>
