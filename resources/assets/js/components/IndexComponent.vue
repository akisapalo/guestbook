<template>
  <div>
      <h1>Guests</h1>


      <div v-if="success" :class="['alert alert-success']">Guest {{ success }}!</div>

        <div class="row">

          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'create' }" class="btn btn-primary">Add a Guest</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th colspan = 2>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="guest in guests" :key="guest.id">
                    <td>{{ guest.id }}</td>
                    <td>{{ guest.last_name }}, {{ guest.first_name }}</td>
                    <td>{{ guest.gender }}</td>
                    <td>{{ guest.email }}</td>
                    <td>{{ guest.phone_number }}</td>
                    <td>{{ guest.address }}</td>
                    <td><router-link :to="{name: 'edit', params: { id: guest.id }}" class="btn btn-primary">Edit</router-link></td>
                    <td><button class="btn btn-danger" @click.prevent="deleteGuest(guest.id)">Delete</button></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>

<script>
  export default {
      props: ['success'],
      data() {
        return {
          guests: []
        }
      },
      created() {
      let uri = 'http://localhost/api/guests';
      this.axios.get(uri).then(response => {
        this.guests = response.data.data;
      });
    },
    methods: {
      deleteGuest(id) {
        let uri = `http://localhost/api/guest/delete/${id}`;
          this.axios.delete(uri).then(response => {
          this.success = ' has been deleted!';
        }).then(response => {
              this.guests.splice(this.guests.indexOf(id), 1);
            }).catch(function (error) {
              console.log(error);
            });
    }

    }
  }
</script>